<?php

namespace App\Modules\Baocao\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\DatdichvuModel;
use App\KhachhangModel;
use App\DichvuModel;
use App\DatphongModel;
use App\LoaiphongModel;
use App\User;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use PhpParser\Comment;



class BaocaoController extends Controller{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function baocao_datdichvu(){
    	 if (!Auth::check()) return \Redirect::to("admincp/login");

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
          $tongdoanhthu=0;
	        while ($runtime<=$end) {
            $tomorrow = strtotime("tomorrow", strtotime($runtime));
            $tomorrowdate = date('Y-m-d',$tomorrow);

               //
              $dichvudat=DatdichvuModel::
              whereDate('created_at',$runtime)
              ->get();
              //tinh tong so luong
              $soluong=DB::table('tblDatdichvu')->select(DB::raw('sum(iSoluong) as tongsoluong'))
              ->whereDate('created_at',$runtime)
              ->where('iTrangthaidat','3')
              ->get();
              //tinh tong tien tung ngay
              $tongtienmotngay=DB::table('tblDatdichvu')->join('tblDichvu','tblDatdichvu.FK_IDDichvu','=','tblDichvu.id')->select(DB::raw('sum(iSoluong * iDongia) as tongtien'))
              ->whereDate('tblDatdichvu.created_at',$runtime)
              ->where('iTrangthaidat','3')
              ->get();

             

              foreach ($tongtienmotngay as $sumtotal) {
              	$tongdoanhthu=$sumtotal->tongtien +$tongdoanhthu;
              }
              $arrayBaocao = array(
              	'ngay'=>date('d/m/Y',strtotime($runtime)), 
              	'dichvudat'=>$dichvudat,
              	'tongsoluong'=>$soluong,
              	'tongtienmotngay'=>$tongtienmotngay
              );
              $articles[]=$arrayBaocao;

              //
              $runtime=$tomorrowdate;
            }    
            return view('Baocao::bao_cao_thong_ke_dat_dich_vu',compact('articles','tongdoanhthu'));

    }

    public function thongkeluongkhachhang(){
      if (!Auth::check()) return \Redirect::to("admincp/login");

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
          $tongkhachhang=0;
          $tongdoanhthu=0;
          while ($runtime<=$end) {
            $tomorrow = strtotime("tomorrow", strtotime($runtime));
            $tomorrowdate = date('Y-m-d',$tomorrow);

               // phong da dat hoan thanh
              $danhsachdatphong=DatphongModel::
              where('dNgayden','=',$runtime)
              ->where('iTrangthaidat','=','3')
              ->get();
              //tinh tong luong khach hang
              $luongkhachhang=DB::table('tblDatphong')->select(DB::raw('sum(iSoluongnguoi) as luongnguoi'))
              ->where('dNgayden','=',$runtime)
              ->where('iTrangthaidat','=','3')
              ->get();
              //tinh danh thu tung ngay
              $doanhthu=0;
               foreach ($danhsachdatphong as $value) {
                      $loaiphong=LoaiphongModel::where('id',$value->FK_IDLoaiphong)->get();
                      $first_date = strtotime($value->dNgayden);
                      $second_date = strtotime($value->dNgaydi);
                      $datediff = abs($second_date - $first_date);
                      $days=floor($datediff / (60*60*24));
                      $doanhthu+=($loaiphong[0]->iGiaphong) * ($value->iSoluongphong) * $days;              
               }

               //tinh tong luong khach hang
              
               foreach ($luongkhachhang as $value) {
                  $tongkhachhang+=$value->luongnguoi;
               }
               $tongdoanhthu+=$doanhthu;
               
              $arrayBaocao = array(
                'ngay'=>date('d/m/Y',strtotime($runtime)), 
                'ds_datphong'=>$danhsachdatphong,
                'luongkhachhang'=>$luongkhachhang,
                'doanhthu'=>$doanhthu
              );
              $articles[]=$arrayBaocao;

              //
              $runtime=$tomorrowdate;
            }  
    	return view('Baocao::thong_ke_luong_khach_hang',compact('articles','tongkhachhang','tongdoanhthu'));
    }

}