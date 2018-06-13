<?php

namespace App\Modules\Tintuc\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\TintucModel;
use App\User;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use PhpParser\Comment;



class TintucController extends Controller{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
     public function ql_tintuc(){
     	$tintuc=TintucModel::all();
     	return view('Tintuc::quan_ly_tin_tuc',compact('tintuc'));
     }
     //them_moi_tin_tuc
     public function add_tintuc(){
     	$tintuc=TintucModel::all();
     	return view('Tintuc::them_moi_tin_tuc',compact('tintuc'));
     }
     public function addPost_tintuc(Request $request){
     	    $this->validate($request,
     	    [
                'sTieude'=> 'required|min:3|max:100',
                'sTomtat'=> 'required|min:3|max:255',
                'sNoidung'=>'required'
     	    ],
     	    [
                'sTieude.required'=>'Bạn chưa nhập tiêu đề',
                'sTieude.min'=>'Tên tiêu đề tối thiểu 2 ký tự',
                'sTieude.max'=>'Tên tiêu đề tối đa là 100 ký tự',
                'sTomtat.required'=>'Bạn chưa nhập tóm tắt',
                'sTomtat.min'=>'Tóm tắt phải nhập ít nhất 3 ký tự',
                'sTomtat.max'=>'Tóm tắt chỉ nhập tối đa 255 ký tự',
                'sNoidung.required'=>'Nội dung không được bỏ trống'
     	    ]);
            $tintuc=new TintucModel;
            $tintuc->sTieude=$request->sTieude;
            $tintuc->sTomtat=$request->sTomtat;
            $tintuc->sNoidung=$request->sNoidung;
            if($request->hasFile('sHinhanh')){
            	$file=$request->file('sHinhanh');
            	$name=$file->getClientOriginalName();
            	$duoi=$file->getClientOriginalExtension();
            	if($duoi!='jpg' and $duoi!='PNG'){
            		return redirect('admincp/tintuc/them_moi_tin_tuc')->with('error1','Ảnh chỉ cho phép đuôi .JPG hoặc .PNG');
            	}
            	$hinh=str_random(4)."_".$name;
            	while(file_exists('upload/images/'.$hinh))
            	{
                     $hinh=str_random(4)."_".$name;  
            	}
            	$file->move('upload/images/',$hinh);
            	$tintuc->sHinhanh=$hinh;
            }
            else
            {
            	return redirect('admincp/tintuc/them_moi_tin_tuc')->with('error1','Không có thông tin ảnh!');
            	$tintuc->sHinhanh="";
            }
            $tintuc->iNoibat=$request->iNoibat;

            $tintuc->save();
            return redirect('admincp/tintuc/quan_ly_tin_tuc')->with('thongbao','Thêm thành công thông tin');
            $tintuc=TintucModel::all();
     	    return view('Tintuc::quan_ly_tin_tuc',compact('tintuc'));
     }

     public function sua_tintuc($id){
           $tintuc=TintucModel::where('id',$id)->get();
           return view('Tintuc::sua_tin_tuc',compact('tintuc'));
     }
     public function suaPost_tintuc(Request $request,$id){
     	$this->validate($request,
     	    [
                'sTieude'=> 'required|min:3|max:100',
                'sTomtat'=> 'required|min:3|max:255',
                'sNoidung'=>'required'
     	    ],
     	    [
                'sTieude.required'=>'Bạn chưa nhập tiêu đề',
                'sTieude.min'=>'Tên tiêu đề tối thiểu 2 ký tự',
                'sTieude.max'=>'Tên tiêu đề tối đa là 100 ký tự',
                'sTomtat.required'=>'Bạn chưa nhập tóm tắt',
                'sTomtat.min'=>'Tóm tắt phải nhập ít nhất 3 ký tự',
                'sTomtat.max'=>'Tóm tắt chỉ nhập tối đa 255 ký tự',
                'sNoidung.required'=>'Nội dung không được bỏ trống'
     	    ]);
     	    $tintuc=TintucModel::find($id);
     	    $tintuc->sTieude=$request->sTieude;
            $tintuc->sTomtat=$request->sTomtat;
            $tintuc->sNoidung=$request->sNoidung;
            if($request->hasFile('sHinhanh')){
            	$file=$request->file('sHinhanh');
            	$name=$file->getClientOriginalName();
            	$duoi=$file->getClientOriginalExtension();
            	if($duoi!='jpg' and $duoi !='png'){
            		return redirect('admincp/tintuc/them_moi_tin_tuc')->with('error1','Ảnh chỉ cho phép đuôi .JPG hoặc .PNG');
            	}
            	$hinh=str_random(4)."_".$name;
            	while(file_exists('upload/images/'.$hinh))
            	{
                     $hinh=str_random(4)."_".$name;  
            	}
            	$file->move('upload/images/',$hinh);
            	$tintuc->sHinhanh=$hinh;
            }
            $tintuc->iNoibat=$request->iNoibat;

            $tintuc->save();
            return redirect('admincp/tintuc/quan_ly_tin_tuc')->with('thongbao','Sửa thành công thông tin');
            $tintuc=TintucModel::all();
     	    return view('Tintuc::quan_ly_tin_tuc',compact('tintuc'));
     }
     public function delete_tintuc($id){
     	$tintuc=TintucModel::find($id);

     	$tintuc->delete();
        $tintuc=TintucModel::all();
     	return view('Tintuc::quan_ly_tin_tuc',compact('tintuc'));
     }
}