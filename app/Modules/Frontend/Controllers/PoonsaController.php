<?php

namespace App\Modules\Frontend\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\DichvuModel;
use App\LoaiphongModel;
use App\TintucModel;
use App\KhachhangModel;
use App\DatphongModel;
use App\DatdichvuModel;
use App\CTdatphongModel;
use App\PhongModel;
use App\PhanhoiModel;
use App\TaikhoanModel;
use Validator;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use PhpParser\Comment;



class PoonsaController extends Controller{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function trangchu(){
    	$loaiphong=LoaiphongModel::all();
    	$dichvu=DichvuModel::all();
    	$tintuc=TintucModel::all();
    	return view('Frontend::Pages/trangchu',compact('loaiphong','dichvu','tintuc'));
    }
    public function get_datphong(){
    	$tenloaiphong=LoaiphongModel::all();
    	return view('Frontend::Pages/datphong',compact('tenloaiphong'));
    }
    public function datphong(Request $request){
    	  $tenloaiphong=LoaiphongModel::all();
        $loaiphong=LoaiphongModel::find($request->FK_IDLoaiphong);
        $ngayden=$request->dNgayden;
        $ngaydi=$request->dNgaydi;
        $request->session()->put('loaiphong', $loaiphong);
        $request->session()->put('ngayden', $ngayden);
        $request->session()->put('ngaydi', $ngaydi);

         $phongdadat=DB::table('tblDatphong')->select(DB::raw('sum(iSoluongphong) as soluong'))
        ->where('FK_IDLoaiphong',$request->FK_IDLoaiphong)
        ->where(function($query){
           $query->where('iTrangthaidat','1')->orWhere('iTrangthaidat','2');
         })
        ->where(function ($query) use($request){
                $query->whereBetween('dNgayden',[$request->dNgayden, $request->dNgaydi])
                    ->orWhereBetween('dNgaydi', [$request->dNgayden, $request->dNgaydi]);
          })
         ->get();
        $soluongphongdadat=$phongdadat[0]->soluong;
        $soluongphongcosan=$loaiphong->iTongsophong;
        $sophongconlai=$soluongphongcosan-$soluongphongdadat;
        // return $sophongconlai;
    	return view('Frontend::Pages/datphong',compact('tenloaiphong','sophongconlai'));
    }

    public function post_datphong(Request $request){
    	$this->validate($request,
    	[
            'sTenKH'=>'required|min:2',
            'sQuoctich'=>'required|min:2',
            'dNgaysinh'=>'required',
            'sDinhdanh'=>'required',
            'sSDT'=>'required|numeric',
            'sDiachi'=>'required' 
    	],
    	[
            'sTenKH.required'=>'Tên khách hàng không để trống!',
            'sTenKH.min'=>'Tên khách hàng ít nhất 2 ký tự!',
            'sQuoctich.required'=>'Quốc tịch không để trống!',
            'sQuoctich.min'=>'Quốc tịch có ít nhất 2 ký tự!',
            'dNgaysinh.required'=>'Bạn chưa nhập ngày sinh!',
            'sDinhdanh.required'=>'chưa nhập',
            'sSDT.required'=>'Số điện thoại không để trống!',
            'sSDT.numeric'=>'Điện thoại chỉ nhập số!',
            'sDiachi.required'=>'Địa chỉ không được để trống!'
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
        // return Redirect('/')->with('thongbao','Đặt phòng thành công');
        //tra ve trang hoa don
        $sDinhdanh=$request->sDinhdanh;
         $khachhang=KhachhangModel::where('sDinhdanh',$sDinhdanh)->get();
          $datphong=DatphongModel::where('FK_IDKhachhang',$khachhang[0]->id)->get();
          $datdichvu=DatdichvuModel::where('FK_IDKhachhang',$khachhang[0]->id)->get();
         $dichvu=DichvuModel::all();

         //laygia tien loaiphong     
          $tongtiendatphong=0;  
              foreach ($datphong as $value) {
                   if($value->iTrangthaidat==1 || $value->iTrangthaidat==2 )
                   {
                      $loaiphong=LoaiphongModel::where('id',$value->FK_IDLoaiphong)->get();
                      //tinh ngay
                      $first_date = strtotime($value->dNgayden);
                      $second_date = strtotime($value->dNgaydi);
                      $datediff = abs($second_date - $first_date);
                      $days=floor($datediff / (60*60*24)); 
                      //tinh tien phong
                     $tongtiendatphong+=($loaiphong[0]->iGiaphong) * ($value->iSoluongphong) * $days;
                    } 
                }
             
                  $tongtiendichvu=0;
                   foreach ($datdichvu as $value) {
                       if($value->iTrangthaidat==1 || $value->iTrangthaidat==2 )
                       {
                          $giadichvu=DichvuModel::where('id',$value->FK_IDDichvu)->get();
                          $tongtiendichvu+=($value->iSoluong)*($giadichvu[0]->iDongia);
                       }
                  }
               $total=$tongtiendichvu + $tongtiendatphong;
         return view('Frontend::Pages/khachhangdadat',compact('tukhoa','khachhang','datphong','datdichvu','dichvu','total')); 
    }
    // kiem tra khach hang cu da dat phong
    public function khachhangcu_datphong($sDinhdanh)
    {
        $khachhang=KhachhangModel::where('sDinhdanh',$sDinhdanh)->get();
        return $khachhang;
    }

    public function gioithieu(){
        return view('Frontend::Pages/gioithieu');
    }
    //loaiphong
    public function loaiphong(){
        $loaiphong=LoaiphongModel::all();
        return view('Frontend::Pages/loaiphong',compact('loaiphong'));
    }
    public function post_loaiphong(Request $request){
        $tenloaiphong=LoaiphongModel::all();
        $loaiphong=LoaiphongModel::find($request->id);
        $request->session()->put('loaiphong', $loaiphong);

        $phongdadat=DB::table('tblCTDatphong')->join('tblPhong','tblCTDatphong.FK_IDPhong','=','tblPhong.id')->join('tblDatphong','tblCTDatphong.FK_IDDatphong','=','tblDatphong.id')->select(DB::raw('count(tblCTDatphong.id) as soluong'))
        ->where('tblPhong.FK_IDLoaiphong',$request->id)
        ->where(function($query){
          $query->where('iTrangthaidat','1')->orWhere('iTrangthaidat','2');
          })
        ->get();
        
        $soluongphongdadat=$phongdadat[0]->soluong;
        $soluongphongcosan=$loaiphong->iTongsophong;
        $sophongconlai=$soluongphongcosan-$soluongphongdadat;
        // return $phongdadat;
        return view('Frontend::Pages/datphong',compact('tenloaiphong','sophongconlai'));  
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
    //tinh so phong con lai ngay den
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
    //dichvu
    public function dichvu(){
        $dichvu=DichvuModel::all();
        return view('Frontend::Pages/dichvu',compact('dichvu'));
    }
    public function tintuc(){
        $tintuc=TintucModel::paginate(4);
        $toptintuc=TintucModel::orderBy('iSoluotxem','desc')->get();
        return view('Frontend::Pages/tintuc',compact('tintuc','toptintuc'));
    }
    public function chitiettintuc($id){
        $cttintuc=TintucModel::find($id);
        $top10tintuc=TintucModel::get();
        $toptintuc=TintucModel::orderBy('iSoluotxem','desc')->get();
        return view('Frontend::Pages/chitiettintuc',compact('cttintuc','top10tintuc','toptintuc'));
    }

    //khach hang da dat
    public function khachhangdadat(){

        return view('Frontend::Pages/khachhangdadat');
    }
    //timkiemdinhdanh
    public function xacthucdinhdanh(Request $request){
         $tukhoa=$request->tukhoa;
         $khachhang=KhachhangModel::where('sDinhdanh',$tukhoa)->get();
         if(!empty($khachhang[0]->id))
         {
              $datphong=DatphongModel::where('FK_IDKhachhang',$khachhang[0]->id)
              ->get();
              $datdichvu=DatdichvuModel::where('FK_IDKhachhang',$khachhang[0]->id)
              ->get();
              $dichvu=DichvuModel::all();
              //laygia tien loaiphong
              $tongtiendatphong=0;  
              foreach ($datphong as $value) {
                   if($value->iTrangthaidat==1 || $value->iTrangthaidat==2 )
                   {
                      $loaiphong=LoaiphongModel::where('id',$value->FK_IDLoaiphong)->get();
                      //tinh ngay
                      $first_date = strtotime($value->dNgayden);
                      $second_date = strtotime($value->dNgaydi);
                      $datediff = abs($second_date - $first_date);
                      $days=floor($datediff / (60*60*24)); 
                      //tinh tien phong
                     $tongtiendatphong+=($loaiphong[0]->iGiaphong) * ($value->iSoluongphong) * $days;
                    } 
                }
             
                  $tongtiendichvu=0;
                   foreach ($datdichvu as $value) {
                       if($value->iTrangthaidat==1 || $value->iTrangthaidat==2 )
                       {
                          $giadichvu=DichvuModel::where('id',$value->FK_IDDichvu)->get();
                          $tongtiendichvu+=($value->iSoluong)*($giadichvu[0]->iDongia);
                       }
                  }
          $total=$tongtiendichvu + $tongtiendatphong;
            
         return view('Frontend::Pages/khachhangdadat',compact('tukhoa','khachhang','datphong','datdichvu','dichvu','total')); 
         }
         else
         {
         return redirect()->route('callhome')->with('thongbao','Không có định danh tồn tại');
         }
    }
    //gọi khách hàng đã đặt từ trang đặt dịch vụ
    public function getkhachhangdadat(Request $request){
         $sDinhdanh=$request->sDinhdanh;
         $khachhang=KhachhangModel::where('sDinhdanh',$sDinhdanh)->get();
         $datphong=DatphongModel::where('FK_IDKhachhang',$khachhang[0]->id)->get();
         $datdichvu=DatdichvuModel::where('FK_IDKhachhang',$khachhang[0]->id)->get();
         $dichvu=DichvuModel::all();

         //laygia tien loaiphong     
          $tongtiendatphong=0;  
              foreach ($datphong as $value) {
                   if($value->iTrangthaidat==1 || $value->iTrangthaidat==2 )
                   {
                      $loaiphong=LoaiphongModel::where('id',$value->FK_IDLoaiphong)->get();
                      //tinh ngay
                      $first_date = strtotime($value->dNgayden);
                      $second_date = strtotime($value->dNgaydi);
                      $datediff = abs($second_date - $first_date);
                      $days=floor($datediff / (60*60*24)); 
                      //tinh tien phong
                     $tongtiendatphong+=($loaiphong[0]->iGiaphong) * ($value->iSoluongphong) * $days;
                    } 
                }
             
                  $tongtiendichvu=0;
                   foreach ($datdichvu as $value) {
                       if($value->iTrangthaidat==1 || $value->iTrangthaidat==2 )
                       {
                          $giadichvu=DichvuModel::where('id',$value->FK_IDDichvu)->get();
                          $tongtiendichvu+=($value->iSoluong)*($giadichvu[0]->iDongia);
                       }
                  }
               $total=$tongtiendichvu + $tongtiendatphong;
         return view('Frontend::Pages/khachhangdadat',compact('tukhoa','khachhang','datphong','datdichvu','dichvu','total')); 
    }

    //capnhatdatphong
    public function capnhatdatphong(Request $request,$id){
        $up_datphong=DatphongModel::find($id);

        $up_datphong->iSoluongphong=$request->iSoluongphong;
        $up_datphong->iTrangthaidat=$request->iTrangthaidat;

        $up_datphong->save();

         $tukhoa=$request->sDinhdanh;
         $khachhang=KhachhangModel::where('sDinhdanh','=',"$tukhoa")->get();
         $datphong=DatphongModel::where('FK_IDKhachhang',$khachhang[0]->id)->get();
         $datdichvu=DatdichvuModel::where('FK_IDKhachhang',$khachhang[0]->id)->get();
         $dichvu=DichvuModel::all();

         //laygia tien loaiphong     
            $tongtiendatphong=0;  
              foreach ($datphong as $value) {
                   if($value->iTrangthaidat==1 || $value->iTrangthaidat==2 )
                   {
                      $loaiphong=LoaiphongModel::where('id',$value->FK_IDLoaiphong)->get();
                      //tinh ngay
                      $first_date = strtotime($value->dNgayden);
                      $second_date = strtotime($value->dNgaydi);
                      $datediff = abs($second_date - $first_date);
                      $days=floor($datediff / (60*60*24)); 
                      //tinh tien phong
                     $tongtiendatphong+=($loaiphong[0]->iGiaphong) * ($value->iSoluongphong) * $days;
                    } 
                }
             
                  $tongtiendichvu=0;
                   foreach ($datdichvu as $value) {
                       if($value->iTrangthaidat==1 || $value->iTrangthaidat==2 )
                       {
                          $giadichvu=DichvuModel::where('id',$value->FK_IDDichvu)->get();
                          $tongtiendichvu+=($value->iSoluong)*($giadichvu[0]->iDongia);
                       }
                  }
          $total=$tongtiendichvu + $tongtiendatphong;
         return view('Frontend::Pages/khachhangdadat',compact('tukhoa','khachhang','datphong','datdichvu','dichvu','total')); 
    }
    //
    public function datdichvu(Request $request){
         $sDinhdanh=$request->sDinhdanh;
         $khachhang=KhachhangModel::where('sDinhdanh','=',"$sDinhdanh")->get();
         $dichvu=DichvuModel::all();
         $datdichvu=DatdichvuModel::where('FK_IDKhachhang',$khachhang[0]->id)->get();
         return view('Frontend::Pages/datdichvu',compact('khachhang','dichvu','datdichvu'));
    }
    public function post_datdichvu(Request $request){
        $datdichvu=new DatdichvuModel;
        $datdichvu->FK_IDKhachhang=$request->FK_IDKhachhang;
        $datdichvu->FK_IDDichvu=$request->FK_IDDichvu;
        $datdichvu->iSoluong=$request->iSoluong;
        $datdichvu->iTrangthaidat="1";
        $datdichvu->save();
        $sDinhdanh=$request->sDinhdanh;
        $khachhang=KhachhangModel::where('sDinhdanh','=',"$sDinhdanh")->get();
        $datdichvu=DatdichvuModel::where('FK_IDKhachhang',$khachhang[0]->id)->get();
        $dichvu=DichvuModel::all();

        return view('Frontend::Pages/datdichvu',compact('khachhang','dichvu','datdichvu'));
        return redirect()->route('callbackdv',[$sDinhdanh])->with('thongbao','Đăng ký dịch vụ thành công');
     }
     public function capnhatdatdichvu(Request $request,$id){
        $up_dichvu=DatdichvuModel::find($id);

        $up_dichvu->iSoluong=$request->iSoluong;
        $up_dichvu->iTrangthaidat=$request->iTrangthaidat;
        $up_dichvu->save();

         $tukhoa=$request->sDinhdanh;
         $khachhang=KhachhangModel::where('sDinhdanh','=',"$tukhoa")->get();
         $datphong=DatphongModel::where('FK_IDKhachhang',$khachhang[0]->id)->get();
         $datdichvu=DatdichvuModel::where('FK_IDKhachhang',$khachhang[0]->id)->get();
         $dichvu=DichvuModel::all();
         //laygia tien loaiphong     
          $tongtiendatphong=0;  
              foreach ($datphong as $value) {
                   if($value->iTrangthaidat==1 || $value->iTrangthaidat==2 )
                   {
                      $loaiphong=LoaiphongModel::where('id',$value->FK_IDLoaiphong)->get();
                      //tinh ngay
                      $first_date = strtotime($value->dNgayden);
                      $second_date = strtotime($value->dNgaydi);
                      $datediff = abs($second_date - $first_date);
                      $days=floor($datediff / (60*60*24)); 
                      //tinh tien phong
                     $tongtiendatphong+=($loaiphong[0]->iGiaphong) * ($value->iSoluongphong) * $days;
                    } 
                }
             
                  $tongtiendichvu=0;
                   foreach ($datdichvu as $value) {
                       if($value->iTrangthaidat==1 || $value->iTrangthaidat==2 )
                       {
                          $giadichvu=DichvuModel::where('id',$value->FK_IDDichvu)->get();
                          $tongtiendichvu+=($value->iSoluong)*($giadichvu[0]->iDongia);
                       }
                  }
               $total=$tongtiendichvu + $tongtiendatphong;
         return view('Frontend::Pages/khachhangdadat',compact('tukhoa','khachhang','datphong','datdichvu','dichvu','total'));
     }


     //phan hoi
     public function phanhoi($sDinhdanh){
         $khachhang=KhachhangModel::where('sDinhdanh',$sDinhdanh)->get();
         $phong=PhongModel::all();
         $dichvu=DichvuModel::all();
         $phanhoi=PhanhoiModel::orderBy('id','desc')->get();
         return view('Frontend::Pages/phan_hoi',compact('khachhang','phong','dichvu','phanhoi'));
     }
     public function post_phanhoi(Request $request,$sDinhdanh){
       $phanhoi=new PhanhoiModel;
       $phanhoi->FK_IDKhachhang=$request->FK_IDKhachhang;
       $phanhoi->sTieude=$request->sTieude;
       $phanhoi->sNoidung=$request->sNoidung;
       if($request->FK_IDDichvu!='')
       {
          $phanhoi->FK_IDDichvu=$request->FK_IDDichvu;
       } 
       if($request->FK_IDPhong!='')
       {
          $phanhoi->FK_IDPhong=$request->FK_IDPhong;
       }
       $phanhoi->save();

       //tra ve
       return redirect()->route('prevphanhoi',[$sDinhdanh])->with('thongbao','Phản hồi thành công');
     }
     //dang ky tai khoan khach hang
     public function dangkytaikhoan(){
          return view('Frontend::Pages/dang_ky_tai_khoan');
     }
     public function post_dangkytaikhoan(){
          $inputs = Input::all(); 
          $validator = Validator::make($inputs, TaikhoanModel::$rules);
           if ($validator->passes()){
              $user = new TaikhoanModel;
              $user->sTen = $inputs['name'];
              $user->email = $inputs['email'];
              $user->password =  Hash::make($inputs['password']); 
              $user->FK_IDLoaitaikhoan ='7';
              $user->save();  
               return Redirect::to('dang_ky_tai_khoan')->with('thongbao','Đăng ký tài khoản thành công');
            }

        return Redirect::to('dang_ky_tai_khoan')->with('thongbao','Mật khẩu nhập lại không khớp !!!');
     }

     public function post_logingiaodien(){
        $email= Input::get('email');
        $password = Input::get('pass');
        $dk = Auth::attempt(array('email' => $email, 'password' => $password),true);
        if ($dk)
        {     
         return Redirect::to("nguoi_dung_dang_nhap");      
        }
        else
        return Redirect("/")->with('thongbao','Đăng nhập ko thành công');
     }
     function logout(){
        Auth::logout();
        return Redirect::to("/");
     }


     //nguoi dung dang nhap
     public function post_nguoidungdangnhap(){
       if(!Auth::check())
        return \Redirect::to('/');

           if (empty(Input::get ( 'dNgaybd' ))|| empty(Input::get ( 'dNgaykt' ))) {
              $end= date("Y-m-d")." 23:59:59";
              if (empty(Input::get ( 'dNgaybd' )))
                $start = date('Y-m-d');
              else
                $start = str_replace("/","-",Input::get ( 'dNgaybd' ));              
          } else {
              $start = str_replace("/","-",Input::get ( 'dNgaybd' )); 
              $end = str_replace("/","-",Input::get ( 'dNgaykt' ));
          }

          $articles = array();
          $sumup=array(0,0,0,0,0,0,0,0,0,0,0);
          $runtime = $start;
          $runof=$end;
          $code = 1;
          $tongkhachhang=0;
          $tongdoanhthu=0;
          while ($runtime<=$end) {
            $tomorrow = strtotime("tomorrow", strtotime($runtime));
            $tomorrowdate = date('Y-m-d',$tomorrow);


               //phong da dat cao cap
               $phongdadat1=DB::table('tblCTDatphong')->join('tblPhong','tblCTDatphong.FK_IDPhong','=','tblPhong.id')->join('tblDatphong','tblCTDatphong.FK_IDDatphong','=','tblDatphong.id')->select('tblPhong.id','tblPhong.FK_IDLoaiphong','sTenP','iTrangthai','dNgayden','dNgaydi','iTrangthaidat')
              ->where('dNgayden','<=',$runtime)
              ->where('dNgaydi','>=',$runtime)
              ->where('tblPhong.FK_IDLoaiphong','1')
              ->get();
               //phong da dat hang sang
               $phongdadat2=DB::table('tblCTDatphong')->join('tblPhong','tblCTDatphong.FK_IDPhong','=','tblPhong.id')->join('tblDatphong','tblCTDatphong.FK_IDDatphong','=','tblDatphong.id')->select('tblPhong.id','tblPhong.FK_IDLoaiphong','sTenP','iTrangthai','dNgayden','dNgaydi','iTrangthaidat')
              ->where('dNgayden','<=',$runtime)
              ->where('dNgaydi','>=',$runtime)
              ->where('tblPhong.FK_IDLoaiphong','2')
              ->get();
               //phong da dat hang trung
               $phongdadat3=DB::table('tblCTDatphong')->join('tblPhong','tblCTDatphong.FK_IDPhong','=','tblPhong.id')->join('tblDatphong','tblCTDatphong.FK_IDDatphong','=','tblDatphong.id')->select('tblPhong.id','tblPhong.FK_IDLoaiphong','sTenP','iTrangthai','dNgayden','dNgaydi','iTrangthaidat')
              ->where('dNgayden','<=',$runtime)
              ->where('dNgaydi','>=',$runtime)
              ->where('tblPhong.FK_IDLoaiphong','3')
              ->get();

                //lay ra mang các phong da dat
              $cacphongdadat1=[];
              foreach($phongdadat1 as $value)
              {
                $cacphongdadat1[]=$value->id;
              }
              $cacphongdadat2=[];
              foreach($phongdadat2 as $value)
              {
                $cacphongdadat2[]=$value->id;
              }
              $cacphongdadat3=[];
              foreach($phongdadat3 as $value)
              {
                $cacphongdadat3[]=$value->id;
              }

              //danh sách phòng trống
              $danhsachphongtrong1 = DB::table('tblPhong')
              ->whereNotIn('id', $cacphongdadat1)
              ->where('FK_IDLoaiphong','1')
              ->get();
              $danhsachphongtrong2 = DB::table('tblPhong')
              ->whereNotIn('id', $cacphongdadat2)
              ->where('FK_IDLoaiphong','2')
              ->get();
              $danhsachphongtrong3 = DB::table('tblPhong')
              ->whereNotIn('id', $cacphongdadat3)
              ->where('FK_IDLoaiphong','3')
              ->get();
               //tinh tong luong khach hang
              
               
              $arrayBaocao = array(
                'ngay'=>date('d/m/Y',strtotime($runtime)),
                'intngay'=>$tomorrow,
                'phongdadat1'=>$phongdadat1,
                'phongdadat2'=>$phongdadat2,
                'phongdadat3'=>$phongdadat3,
                'phongtrong1'=>$danhsachphongtrong1,
                'phongtrong2'=>$danhsachphongtrong2,
                'phongtrong3'=>$danhsachphongtrong3
              );
              $articles[]=$arrayBaocao;

              //
              $runtime=$tomorrowdate;
            }

        return view('Frontend::CustomerLogin/nguoi_dung_dang_nhap',compact('articles'));
     }
}