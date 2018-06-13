<?php

namespace App\Modules\Phong\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\LoaiphongModel;
use App\PhongModel;
use App\User;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use PhpParser\Comment;



class PhongController extends Controller{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function ql_phong(){
      $loaiphong=LoaiphongModel::get();
      $phong=PhongModel::get();
      return view('Phong::quan_ly_phong',compact('loaiphong','phong'));
    }
    public function update_phong(){
       $loaiphong=LoaiphongModel::get();
       $phong=PhongModel::get();
       return view('Phong::them_moi_phong',compact('loaiphong','phong'));
    }
    public function updatePost_phong(Request $request){
       $this->validate($request,
       [
          'sTenP'=>'required|min:2|max:50',
          'FK_IDLoaiphong'=>'required',
          'iKieuphong'=>'required',
          'iTrangthai'=>'required'
       ],
       [
          'sTenP.required'=>'Bạn chưa nhập tên phòng!!',
          'sTenP.min'=>'tên phòng phải nhật ít nhất 2 ký tự',
          'sTenP.max'=>'tên phòng nhập tối đa 50 ký tự',
          'FK_IDLoaiphong.required'=>'Bạn chưa chọn loại phòng',
          'iKieuphong.required'=>'Bạn không được bỏ trường Kiểu Phòng',
          'iTrangthai.required'=>'Bạn không được bỏ trường trạng thái'
       ]);
       $phong=new PhongModel;
       $phong->sTenP=$request->sTenP;
       $phong->iKieuphong=$request->iKieuphong;
       $phong->iTrangthai=$request->iTrangthai;
       $phong->FK_IDLoaiphong=$request->FK_IDLoaiphong;
       $phong->save();
       //return
       $loaiphong=LoaiphongModel::get();
       $phong=PhongModel::get();
       return view('Phong::quan_ly_phong',compact('loaiphong','phong'));
    }
    public function sua_phong($id){
       $loaiphong=LoaiphongModel::get();
       $phong=PhongModel::where('id',$id)->get();
       return view('Phong::sua_phong',compact('loaiphong','phong'));
    }
    public function suaPost_phong(Request $request,$id){
       $this->validate($request,
       [
          'sTenP'=>'required|min:2|max:50',
          'FK_IDLoaiphong'=>'required',
          'iKieuphong'=>'required',
          'iTrangthai'=>'required'
       ],
       [
          'sTenP.required'=>'Bạn chưa nhập tên phòng!!',
          'sTenP.min'=>'tên phòng phải nhật ít nhất 2 ký tự',
          'sTenP.max'=>'tên phòng nhập tối đa 50 ký tự',
          'FK_IDLoaiphong.required'=>'Bạn chưa chọn loại phòng',
          'iKieuphong.required'=>'Bạn không được bỏ trường Kiểu Phòng',
          'iTrangthai.required'=>'Bạn không được bỏ trường trạng thái'
       ]);
       $phong=PhongModel::find($id);
       $phong->sTenP=$request->sTenP;
       $phong->iKieuphong=$request->iKieuphong;
       $phong->iTrangthai=$request->iTrangthai;
       $phong->FK_IDLoaiphong=$request->FK_IDLoaiphong;
       $phong->save();
       //return
       return Redirect('admincp/phong/quan_ly_phong')->with('thongbao','Sửa thành công');
       $loaiphong=LoaiphongModel::get();
       $phong=PhongModel::get();
       return view('Phong::quan_ly_phong',compact('loaiphong','phong'));
    }
    public function delete_phong($id){
       $phong=PhongModel::find($id);
       $phong->delete();
       //
       return Redirect('admincp/phong/quan_ly_phong')->with('thongbao','Xóa thành công thành công');
       $loaiphong=LoaiphongModel::get();
       $phong=PhongModel::get();
       return view('Phong::quan_ly_phong',compact('loaiphong','phong'));
    }
}