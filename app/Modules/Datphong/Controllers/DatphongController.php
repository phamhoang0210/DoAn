<?php

namespace App\Modules\Datphong\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\DatphongModel;
use App\KhachhangModel;
use App\LoaiphongModel;
use App\PhongModel;
use App\CTdatphongModel;
use App\DatdichvuModel;
use App\DichvuModel;
use App\User;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use PhpParser\Comment;



class DatphongController extends Controller{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
     public function ql_datphong(){
      // $datphong=DatphongModel::all();
     	$datphong=DatphongModel::orderBy('id', 'desc')->get(); 
     	return view('Datphong::quan_ly_dat_phong',compact('datphong'));
     }
     public function update_datphong($id){
        $updatphong=DatphongModel::where('id',$id)->get();
        $loaiphong=LoaiphongModel::all();
        
        //tinh tong tien tung dich vu
        $tongtiendat=0;
               //tinh ngay
              $first_date = strtotime($updatphong[0]->dNgayden);
              $second_date = strtotime($updatphong[0]->dNgaydi);
              $datediff = abs($second_date - $first_date);
              $days=floor($datediff / (60*60*24));
                      //loaiphong
              $loaiphong=LoaiphongModel::where('id',$updatphong[0]->FK_IDLoaiphong)->get();
        $tongtiendat+=($loaiphong[0]->iGiaphong) * ($updatphong[0]->iSoluongphong) * $days;
       
        $dichvudadat=DatdichvuModel::where('FK_IDKhachhang',$updatphong[0]->FK_IDKhachhang)
        ->where('iTrangthaidat','1')
        ->OrWhere('iTrangthaidat','2')
        ->get();


        $list_dichvu=DichvuModel::all();

        return view('Datphong::cap_nhat_trang_thai',compact('updatphong','loaiphong','dichvudadat','list_dichvu','tongtiendat'));
     }
     public function postupdate_datphong(Request $request,$id){
     	$updatphong=DatphongModel::find($id);
      $updatphong->FK_IDLoaiphong=$request->FK_IDLoaiphong;
      $updatphong->dNgayden=$request->dNgayden;
      $updatphong->dNgaydi=$request->dNgaydi;
      $updatphong->iSoluongphong=$request->iSoluongphong;
     	$updatphong->iTrangthaidat=$request->iTrangthaidat;
     	$updatphong->save();
      if($request->iTrangthaidat=='3')
      {
            $doitrangthai=CTdatphongModel::where('FK_IDDatphong',$id)->get();
            foreach ($doitrangthai as $value) {
                $phong=PhongModel::find($value->FK_IDPhong);
                $phong->iTrangthai='1';
                $phong->save();
            } 
      }
      if($request->iTrangthaidat=='2')
      {
            $doitrangthai=CTdatphongModel::where('FK_IDDatphong',$id)->get();
            foreach ($doitrangthai as $value) {
                $phong=PhongModel::find($value->FK_IDPhong);
                $phong->iTrangthai='0';
                $phong->save();
            }
      }
        if($request->iTrangthaidat=='1')
      {
            $doitrangthai=CTdatphongModel::where('FK_IDDatphong',$id)->get();
            foreach ($doitrangthai as $value) {
                $phong=PhongModel::find($value->FK_IDPhong);
                $phong->iTrangthai='0';
                $phong->save();
            }
      }

     	$datphong=DatphongModel::orderBy('id', 'desc')->get(); 
      return view('Datphong::quan_ly_dat_phong',compact('datphong'));
     }
     //laydichvu
     public function post_trangthaidichvu(Request $request,$id){
        $updichvu=DatdichvuModel::find($id);
        $updichvu->FK_IDDichvu=$request->FK_IDDichvu;
        $updichvu->iSoluong=$request->iSoluong;
        $updichvu->iTrangthaidat=$request->iTrangthaidat;
        $updichvu->save();
        //tralaitrang
        return back()->withInput();
        
     }




     //chi tiet 
     public function chitietdatphong($sDinhdanh){
        $khachhang=KhachhangModel::where('sDinhdanh',$sDinhdanh)->get();
        $madatphong=DatphongModel::select('id')->where('FK_IDKhachhang',$khachhang[0]->id)->get();
        //return $madatphong;
        $datphong=DatphongModel::where('FK_IDKhachhang',$khachhang[0]->id)->get();

        $phong=DB::table('tblPhong')->join('tblLoaiphong','tblPhong.FK_IDLoaiphong','=','tblLoaiphong.id')->select('tblPhong.id','sTenP','iTrangthai','FK_IDLoaiphong')->get();

        // $ctdphong=[];
        // foreach ($datphong as $value) {
        //      $ctdatphong=CTdatphongModel::where('FK_IDDatphong',$value->id)->get();
        //       foreach ($ctdatphong as $value) {
        //           $ctdphong[]=$value;
        //      }    
        //  }
       $phongdadat=DB::table('tblCTDatphong')->join('tblPhong','tblCTDatphong.FK_IDPhong','=','tblPhong.id')->select('tblPhong.id','tblCTDatphong.id as ID_CTdatphong','sTenP','iTrangthai','FK_IDDatphong')->get();
        // return $phong;
      //dem so luong phong da dat
      $soluong=CTdatphongModel::select(DB::raw('count(FK_IDDatphong) as c'))
      ->where('FK_IDDatphong',$madatphong[0]->id)
      ->get();
       return view('Datphong::chi_tiet_dat_phong',compact('khachhang','datphong','loaiphong','phong','phongdadat','soluong'));
     }
     public function layphong(Request $request,$sDinhdanh){
       
          //la ra so luong phong nhan vien dat
          $soluongphong=CTdatphongModel::select(DB::raw('count(id) as soluong'))->where('FK_IDDatphong',$request->FK_IDDatphong)->get();
          //lay ra isooluong phong khach hang dat
          $soluongphongdat=DatphongModel::select('iSoluongphong')->where('id',$request->FK_IDDatphong)->get();
          if($soluongphong[0]->soluong<$soluongphongdat[0]->iSoluongphong)
          {
          // $updatedatphong=DatphongModel::find($request->FK_IDDatphong);
          // $updatedatphong->iSoluongphong++;
          // $updatedatphong->save();
            $ctphong=new CTdatphongModel;
            $ctphong->FK_IDDatphong=$request->FK_IDDatphong;
            $ctphong->FK_IDPhong=$request->FK_IDPhong;
            $ctphong->save();

             $trangthai=PhongModel::find($request->FK_IDPhong);
             $trangthai->iTrangthai='0';
             $trangthai->save();
          }

          //tra ve trang layphong
        $khachhang=KhachhangModel::where('sDinhdanh',$sDinhdanh)->get();
        $datphong=DatphongModel::where('FK_IDKhachhang',$khachhang[0]->id)->get();

        $phong=DB::table('tblPhong')->join('tblLoaiphong','tblPhong.FK_IDLoaiphong','=','tblLoaiphong.id')->select('tblPhong.id','sTenP','iTrangthai','FK_IDLoaiphong')->get();
        
        $phongdadat=DB::table('tblCTDatphong')->join('tblPhong','tblCTDatphong.FK_IDPhong','=','tblPhong.id')->select('tblPhong.id','tblCTDatphong.id as ID_CTdatphong','sTenP','iTrangthai','FK_IDDatphong')->get();
       //tinh so luong phong da dat
       $soluong=CTdatphongModel::select(DB::raw('count(FK_IDDatphong) as c'))
      ->where('FK_IDDatphong',$request->FK_IDDatphong)
      ->get();
      
       return view('Datphong::chi_tiet_dat_phong',compact('khachhang','datphong','loaiphong','phong','phongdadat','soluong'));
     }
     public function huychonphong(Request $request,$sDinhdanh){
          $trangthai=PhongModel::find($request->FK_IDPhong);
          $trangthai->iTrangthai='1';
          $trangthai->save();

           $delctphong=CTdatphongModel::find($request->id);
           $delctphong->delete();
      
          // $updatedatphong=DatphongModel::find($request->FK_IDDatphong);
          // $updatedatphong->iSoluongphong--;
          // $updatedatphong->save();

          //trave
        $khachhang=KhachhangModel::where('sDinhdanh',$sDinhdanh)->get();
        $datphong=DatphongModel::where('FK_IDKhachhang',$khachhang[0]->id)->get();
        //lay ra danh sach phong
        $phong=DB::table('tblPhong')->join('tblLoaiphong','tblPhong.FK_IDLoaiphong','=','tblLoaiphong.id')->select('tblPhong.id','sTenP','iTrangthai','FK_IDLoaiphong')->get();
        // $ctdphong=[];
        // foreach ($datphong as $value) {
        //      $ctdatphong=CTdatphongModel::where('FK_IDDatphong',$value->id)->get();
        //      foreach ($ctdatphong as $value) {
        //          $ctdphong[]=$value;
        //      }
        // }
      $phongdadat=DB::table('tblCTDatphong')->join('tblPhong','tblCTDatphong.FK_IDPhong','=','tblPhong.id')->select('tblPhong.id','tblCTDatphong.id as ID_CTdatphong','sTenP','iTrangthai','FK_IDDatphong')->get();
      //tinh so luong phong da dat
      $soluong=CTdatphongModel::select(DB::raw('count(FK_IDDatphong) as c'))
      ->where('FK_IDDatphong',$request->FK_IDDatphong)
      ->get();
      return view('Datphong::chi_tiet_dat_phong',compact('khachhang','datphong','loaiphong','phong','phongdadat','soluong'));
     }

     public function lichdatphong(){

        if (empty(Input::get ( 'dNgaybatdau' ))|| empty(Input::get ( 'dNgayketthuc' ))) {
            $end= date("Y-m-d")." 23:59:59";
            if (empty(Input::get ( 'dNgaybatdau' )))
              $start = date('Y-m-d');
            else
              $start = str_replace("/","-",Input::get ( 'dNgaybatdau' ));              
        } else {
            $start = str_replace("/","-",Input::get ( 'dNgaybatdau' )); 
            $end = str_replace("/","-",Input::get ( 'dNgayketthuc' ));
        }

        $articles = array();
        $sumup=array(0,0,0,0,0,0,0,0,0,0,0);
        $runtime = $start;
        $runof=$end;
        $code = 1;
        while ($runtime<=$end) {
            $tomorrow = strtotime("tomorrow", strtotime($runtime));
            $tomorrowdate = date('Y-m-d',$tomorrow);
            $endofday = date('Y-m-d',$tomorrow-1);
            $month = (date("m",strtotime($runtime)));
            $year = (date('Y', strtotime($runtime)));
            //
           
            $phongdadat=DB::table('tblCTDatphong')->join('tblPhong','tblCTDatphong.FK_IDPhong','=','tblPhong.id')->join('tblDatphong','tblCTDatphong.FK_IDDatphong','=','tblDatphong.id')->select('tblPhong.id','sTenP','iTrangthai','dNgayden','dNgaydi','iTrangthaidat')
              ->where('dNgayden','<=',$runtime)
              ->where('dNgaydi','>=',$runtime)
              ->get();
            //lay ra mang các phong da dat
            $cacphongdadat=[];
            foreach($phongdadat as $value)
            {
              $cacphongdadat[]=$value->id;
            }

            $danhsachphong = DB::table('tblPhong')->whereNotIn('id', $cacphongdadat)->get();
            // foreach ($danhsachphong as $key => $value) {
            //    $dsp[]=$value->id; $value->sTenP;
            // }

            $cc = array(
              'ngay'=>date('d/m/Y',strtotime($runtime)), 
              'dsphong'=>$danhsachphong,
              'datphong'=>$phongdadat
            );
            $articles []= $cc;
            //
            $runtime = $tomorrowdate;   
        }

        return view('Datphong::lich_dat_phong',compact('articles','tongsophongdat')); 
     }

     public function datloaiphong($sDinhdanh)
     {
        $loaiphong=LoaiphongModel::all();
        $khachhang=KhachhangModel::where('sDinhdanh',$sDinhdanh)->get();

        $datphong=DatphongModel::select(DB::raw('sum(iSoluongphong) as soluong'))->where('FK_IDLoaiphong',$loaiphong[0]->id)->get();
        $soluongphongdadat=$datphong[0]->soluong;
        $soluongphongcosan=$loaiphong[0]->iTongsophong;
        $sophongconlai=$soluongphongcosan-$soluongphongdadat;
        //return $sophongconlai;
      return view('Datphong::dat_loai_phong_moi',compact('loaiphong','sophongconlai','khachhang'));
     }
         //ajax sophong
     public function sophong($id){
      $loaiphong=LoaiphongModel::where("id",$id)->get();
      $soluongphongcosan=$loaiphong[0]->iTongsophong;
      //
      return $soluongphongcosan;
      }
    public function ajax_loaiphong($id,$ngayden,$ngaydi){
       $loaiphong=LoaiphongModel::where("id",$id)->get();
       $soluongphongcosan=$loaiphong[0]->iTongsophong;
       $phongdadat=DB::table('tblDatphong')->select(DB::raw('sum(iSoluongphong) as soluong'))
        ->where('FK_IDLoaiphong',$id)
        ->where(function($query){
           $query->where('iTrangthaidat','1')->orWhere('iTrangthaidat','2');
         })
        ->where(function ($query) use($ngayden,$ngaydi){
                $query->whereBetween('dNgayden',[$ngayden, $ngaydi])
                    ->orWhereBetween('dNgaydi', [$ngayden, $ngaydi]);
          })
         ->get();
       $soluongphongdadat=$phongdadat[0]->soluong;
       $soluong=$soluongphongcosan-$soluongphongdadat;

      return $soluong;
    }
    public function ajax_ngayden($id,$ngayden,$ngaydi){
      $loaiphong=LoaiphongModel::where("id",$id)->get();
      $soluongphongcosan=$loaiphong[0]->iTongsophong;
      $phongdadat=DB::table('tblDatphong')->select(DB::raw('sum(iSoluongphong) as soluong'))
        ->where('FK_IDLoaiphong',$id)
        ->where(function($query){
           $query->where('iTrangthaidat','1')->orWhere('iTrangthaidat','2');
         })
        ->where(function ($query) use($ngayden,$ngaydi){
                $query->whereBetween('dNgayden',[$ngayden, $ngaydi])
                    ->orWhereBetween('dNgaydi', [$ngayden, $ngaydi]);
          })
         ->get();
      $soluongphongdadat=$phongdadat[0]->soluong;
      $soluong=$soluongphongcosan-$soluongphongdadat;

      return $soluong;
    }
    //datphong
    public function post_datphong(Request $request){
      $datphong=new DatphongModel;
      $datphong->FK_IDKhachhang=$request->FK_IDKhachhang;
      $datphong->FK_IDLoaiphong=$request->FK_IDLoaiphong;
      $datphong->dNgayden=$request->dNgayden;
      $datphong->dNgaydi=$request->dNgaydi;
      $datphong->iSoluongphong=$request->isoluongphong;
      $datphong->iSoluongnguoi=$request->iSoluongnguoi;
      $datphong->iKieuphong=$request->iKieuphong;
      $datphong->iTrangthaidat='1';
      $datphong->save();

      $khachhang=KhachhangModel::where('sDinhdanh',$request->sDinhdanh)->get();
        $datphong=DatphongModel::where('FK_IDKhachhang',$khachhang[0]->id)->get();
        //lay ra danh sach phong
        $phong=DB::table('tblPhong')->join('tblLoaiphong','tblPhong.FK_IDLoaiphong','=','tblLoaiphong.id')->select('tblPhong.id','sTenP','iTrangthai','FK_IDLoaiphong')->get();
        // $ctdphong=[];
        // foreach ($datphong as $value) {
        //      $ctdatphong=CTdatphongModel::where('FK_IDDatphong',$value->id)->get();
        //      foreach ($ctdatphong as $value) {
        //          $ctdphong[]=$value;
        //      }
        // }
      $phongdadat=DB::table('tblCTDatphong')->join('tblPhong','tblCTDatphong.FK_IDPhong','=','tblPhong.id')->select('tblPhong.id','tblCTDatphong.id as ID_CTdatphong','sTenP','iTrangthai','FK_IDDatphong')->get();
      //tinh so luong phong da dat
      $soluong=CTdatphongModel::select(DB::raw('count(FK_IDDatphong) as c'))
      ->where('FK_IDDatphong',$request->FK_IDDatphong)
      ->get();
      return view('Datphong::chi_tiet_dat_phong',compact('khachhang','datphong','loaiphong','phong','phongdadat','soluong'));

    }
    //dat phong moi khi khach hang yeu cau
    public function datphongmoi(){
        $tenloaiphong=LoaiphongModel::all();
         return view('Datphong::dat_phong',compact('tenloaiphong'));
    }
    public function post_datphongmoi(Request $request){
        $this->validate($request,
      [
            'sTenKH'=>'required|min:2',
            'sQuoctich'=>'required|min:2',
            'sSDT'=>'required|numeric',
            'sDiachi'=>'required' 
      ],
      [
            'sTenKH.min'=>'Tên khách hàng ít nhất 2 ký tự!',
            'sQuoctich.min'=>'Quốc tịch có ít nhất 2 ký tự!',
            'sSDT.numeric'=>'Điện thoại chỉ nhập số!',
      ]);
      $khachhang=new KhachhangModel;
      $khachhang->sTenKH=$request->sTenKH;
      $khachhang->dNgaysinh=$request->dNgaysinh;
      $khachhang->sQuoctich=$request->sQuoctich;
      $khachhang->iGioitinh=$request->iGioitinh;
      $khachhang->sDinhdanh=$request->sDinhdanh;
      $khachhang->sSDT=$request->sSDT;
      $khachhang->sDiachi=$request->sDiachi;
      $khachhang->sEmail=$request->email;
        $kiemtrakhachhang=khachhangModel::where('sDinhdanh',$request->sDinhdanh)->get();
        if(empty($kiemtrakhachhang[0]->id))//khach hang moi
        {
        $khachhang->save();
        $datphong=new DatphongModel;
        $datphong->FK_IDKhachhang=$khachhang->id;
        $datphong->FK_IDLoaiphong=$request->FK_IDLoaiphong;
        $datphong->dNgayden=$request->dNgayden;
        $datphong->dNgaydi=$request->dNgaydi;
        $datphong->iSoluongnguoi=$request->iSoluongnguoi;
        $datphong->isoluongphong=$request->isoluongphong;
        $datphong->iKieuphong=$request->iKieuphong;
        $datphong->iTrangthaidat="1";
        $datphong->save();
        }
        else
        {
        $datphong=new DatphongModel;
        $datphong->FK_IDKhachhang=$kiemtrakhachhang[0]->id;
        $datphong->FK_IDLoaiphong=$request->FK_IDLoaiphong;
        $datphong->dNgayden=$request->dNgayden;
        $datphong->dNgaydi=$request->dNgaydi;
        $datphong->iSoluongnguoi=$request->iSoluongnguoi;
        $datphong->isoluongphong=$request->isoluongphong;
        $datphong->iKieuphong=$request->iKieuphong;
        $datphong->iTrangthaidat="1";
        $datphong->save();
        }
        return Redirect('admincp/datphong/quan_ly_dat_phong')->with('thongbao','Đặt phòng thành công');
    }
    public function thongtinhoanthanh($id){
           $datphong=DatphongModel::where('id',$id)->get();
           $ctphong=CTdatphongModel::where('FK_IDDatphong',$id)->get();
           $tongtiendat=0;
               //tinh ngay
                      $first_date = strtotime($datphong[0]->dNgayden);
                      $second_date = strtotime($datphong[0]->dNgaydi);
                      $datediff = abs($second_date - $first_date);
                      $days=floor($datediff / (60*60*24));
                      //loaiphong
                      $loaiphong=LoaiphongModel::where('id',$datphong[0]->FK_IDLoaiphong)->get();
            $tongtiendat+=($loaiphong[0]->iGiaphong) * ($datphong[0]->iSoluongphong) * $days;
           return view('Datphong::thong_tin_hoan_thanh',compact('datphong','ctphong','tongtiendat'));
    }

}