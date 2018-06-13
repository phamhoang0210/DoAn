<?php

namespace App\Modules\Datdichvu\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\DatdichvuModel;
use App\KhachhangModel;
use App\DichvuModel;
use App\User;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use PhpParser\Comment;



class DatdichvuController extends Controller{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
     public function ql_datdichvu(){
     	$datdichvu=DatdichvuModel::orderBy('created_at', 'desc')->get(); 
     	return view('Datdichvu::quan_ly_dat_dich_vu',compact('datdichvu'));

     }
     public function update_trangthai($id){
        $uptrangthai=DatdichvuModel::where('id',$id)->get();
        return view('Datdichvu::cap_nhat_trang_thai',compact('uptrangthai'));
     }
     public function post_trangthai(Request $request,$id){
        $uptrangthai=DatdichvuModel::find($id);

        $uptrangthai->iSoluong=$request->iSoluong;
        $uptrangthai->iTrangthaidat=$request->iTrangthaidat;

        $uptrangthai->save();

        $datdichvu=DatdichvuModel::all();
        return view('Datdichvu::quan_ly_dat_dich_vu',compact('datdichvu'));
     }

     //hoa don dich vu
     public function hoadondichvu($id){
          $datdichvu=DatdichvuModel::where('id',$id)->get();
          $tongtien=0;
          $tongtien=($datdichvu[0]->dichvu->iDongia)*($datdichvu[0]->iSoluong);
          return view('Datdichvu::hoa_don_dich_vu',compact('datdichvu','tongtien'));
     }
}