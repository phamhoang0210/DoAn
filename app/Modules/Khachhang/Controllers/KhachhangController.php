<?php

namespace App\Modules\Khachhang\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\KhachhangModel;
use App\DatphongModel;
use App\User;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use PhpParser\Comment;



class KhachhangController extends Controller{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
     public function ql_khachhang(){
         $khachhang=KhachhangModel::get();
         return view('Khachhang::quan_ly_khach_hang',compact('khachhang'));
     }
     public function delete_khachhang($id){
     	$khachhang=KhachhangModel::find($id);
        $datphong=DatphongModel::where('FK_IDKhachhang',$id)->first();
        if(!empty($datphong))
        {
          return Redirect('admincp/khachhang/quan_ly_khach_hang')->with('error2','Khách hàng có thông tin đặt phòng.Ràng buộc không thể xóa!');
        }
     	$khachhang->delete();
     	return Redirect('admincp/khachhang/quan_ly_khach_hang')->with('thongbao','Bạn xóa thành công');
     	$khachhang=KhachhangModel::get();
        return view('Khachhang::quan_ly_khach_hang',compact('khachhang'));
     }
}