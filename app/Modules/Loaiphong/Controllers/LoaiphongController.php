<?php

namespace App\Modules\Loaiphong\Controllers;

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



class LoaiphongController extends Controller{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function ql_loaiphong(){
    	$loaiphong=LoaiphongModel::all();
    	return view('Loaiphong::quan_ly_loai_phong',compact('loaiphong'));
    }
    public function addPost_loaiphong(Request $request){
    	$this->validate($request,
    	[
           'sTenLP'=>'required|min:3|max:100',
           'sMota'=>'required',
           'iGiaphong'=>'required|integer',
    	],
    	[
           'sTenLP.required'=>'Trường tên loại phòng bạn không được để trống',
           'sTenLP.min'=>'Loại phòng phải nhật tối thiểu 2 ký tự',
           'sTenLP.max'=>'Loại phòng chỉ nhập tối đa 100 ký tự',
           'sMota.required'=>'Mô tả không được để trống',
           'iGiaphong.required'=>'Bạn chưa nhập giá phòng',
           'iGiaphong.integer'=>'Giá phòng chỉ được nhập số'
    	]);

    	$loaiphong=new LoaiphongModel;
    	$loaiphong->sTenLP=$request->sTenLP;
    	$loaiphong->iGiaphong=$request->iGiaphong;
    	$loaiphong->sMota=$request->sMota;
    	if($request->hasFile('sHinhanh')){
    		$file=$request->file('sHinhanh');
    		$name=$file->getClientOriginalName();
    		$duoi=$file->getClientOriginalExtension();
    		if($duoi !='jpg' && $duoi !='png')
    		{
                return redirect('admincp/loaiphong/quan_ly_loai_phong')->with('error2','Ảnh chỉ cho phép đuôi .JPG hoặc .PNG');
    		}
    		   $hinh=str_random(4)."_".$name;
    		   while(file_exists('upload/images/'.$hinh))
            	   {
                      $hinh=str_random(4)."_".$name;  
            	   }
            	   $file->move('upload/images/',$hinh);
            	   $loaiphong->sHinhanh=$hinh;
            }   
            else
            {
            	return redirect('admincp/loaiphong/quan_ly_loai_phong')->with('error2','Không có thông tin ảnh!');
            	$loaiphong->sHinhanh="";
            }

            $loaiphong->save();
            return redirect('admincp/loaiphong/quan_ly_loai_phong')->with('thongbao','Thêm loại phòng thành công');
            //
            $loaiphong=LoaiphongModel::all();
    	    return view('Loaiphong::quan_ly_loai_phong',compact('loaiphong'));
    	}

    	public function update_loaiphong($id){
               $loaiphong=LoaiphongModel::where('id',$id)->get();
               return view("Loaiphong::sua_loai_phong",compact('loaiphong'));
    	}
    	public function uploadPost_loaiphong(Request $request,$id){
    		$loaiphong=LoaiphongModel::find($id);
            $this->validate($request,
		    	[
		           'sTenLP'=>'required|min:3|max:100',
		           'sMota'=>'required',
		           'iGiaphong'=>'required|integer',
		    	],
		    	[
		           'sTenLP.required'=>'Trường tên loại phòng bạn không được để trống',
		           'sTenLP.min'=>'Loại phòng phải nhật tối thiểu 2 ký tự',
		           'sTenLP.max'=>'Loại phòng chỉ nhập tối đa 100 ký tự',
		           'sMota.required'=>'Mô tả không được để trống',
		           'iGiaphong.required'=>'Bạn chưa nhập giá phòng',
		           'iGiaphong.integer'=>'Giá phòng chỉ được nhập số'
		    	]);
    		$loaiphong->sTenLP=$request->sTenLP;
	    	$loaiphong->iGiaphong=$request->iGiaphong;
	    	$loaiphong->sMota=$request->sMota;
	    	if($request->hasFile('sHinhanh')){
	    		$file=$request->file('sHinhanh');
	    		$name=$file->getClientOriginalName();
	    		$duoi=$file->getClientOriginalExtension();
	    		if($duoi !='jpg' && $duoi !='png')
	    		{
	                return redirect('admincp/loaiphong/quan_ly_loai_phong')->with('error2','Ảnh chỉ cho phép đuôi .JPG hoặc .PNG');
	    		}
	    		   $hinh=str_random(4)."_".$name;
	    		   while(file_exists('upload/images/'.$hinh))
	            	   {
	                      $hinh=str_random(4)."_".$name;  
	            	   }
	            	   $file->move('upload/images/',$hinh);
	            	   $loaiphong->sHinhanh=$hinh;
	            }   

	            $loaiphong->save();
	            return redirect('admincp/loaiphong/quan_ly_loai_phong')->with('thongbao','Sửa loại phòng thành công');
	            //
	            $loaiphong=LoaiphongModel::all();
	    	    return view('Loaiphong::quan_ly_loai_phong',compact('loaiphong'));
    	}
    	//delete
    	public function delete_loaiphong($id){
              $del_loaiphong=LoaiphongModel::find($id);
              $phong=PhongModel::where('FK_IDLoaiphong',$id)->first();
               if(!empty($phong))
               {
                   return Redirect('admincp/loaiphong/quan_ly_loai_phong')->with('error2','Khách hàng có thông tin đặt phòng.Ràng buộc không thể xóa!');
               }
              $del_loaiphong->delete();
              return redirect('admincp/loaiphong/quan_ly_loai_phong')->with('thongbao','Xóa thành công');
              $loaiphong=LoaiphongModel::all();
    	        return view('Loaiphong::quan_ly_loai_phong',compact('loaiphong'));
    	}
}