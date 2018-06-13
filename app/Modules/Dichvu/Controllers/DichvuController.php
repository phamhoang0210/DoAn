<?php

namespace App\Modules\Dichvu\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\DichvuModel;
use App\User;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use PhpParser\Comment;



class DichvuController extends Controller{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
     public function ql_dichvu(){
           $dichvu=DichvuModel::get();
           return view('Dichvu::quan_ly_dich_vu',compact('dichvu'));
     }
     //add
     public function add_dichvu(Request $request){
     	$this->validate($request,
     	[
           'sTenDV'=>'required|min:2|max:100',
           'iDongia'=>'required|integer'
     	],
     	[
           'sTenDV.required'=>"Bạn chưa nhập tên Dịch Vụ",
           'sTenDV.min'=>'tên Dịch Vụ phải tối thiểu 2 ký tự',
           'sTenDV.max'=>'tên Dịch vụ chỉ nhập tối đa 100 ký tự',
           'iDongia.required'=>'Bạn chưa nhập đơn giá',
           'iDongia.integer'=>'Đơn giá chỉ nhập số'
     	]);
     	$dichvu=new DichvuModel;
     	$dichvu->sTenDV=$request->sTenDV;
        $dichvu->iDongia=$request->iDongia;
    	$dichvu->sMota=$request->sMota;
    	if($request->hasFile('sHinhanh')){
    		$file=$request->file('sHinhanh');
    		$name=$file->getClientOriginalName();
    		$duoi=$file->getClientOriginalExtension();
    		if($duoi !='jpg' && $duoi !='png')
    		{
                return redirect('admincp/dichvu/quan_ly_dich_vu')->with('error2','Ảnh chỉ cho phép đuôi .JPG hoặc .PNG');
    		}
    		   $hinh=str_random(4)."_".$name;
    		   while(file_exists('upload/images/'.$hinh))
            	   {
                      $hinh=str_random(4)."_".$name;  
            	   }
            	   $file->move('upload/images/',$hinh);
            	   $dichvu->sHinhanh=$hinh;
            }   
            else
            {
            	return redirect('admincp/dichvu/quan_ly_dich_vu')->with('error2','Không có thông tin ảnh!');
            	$dichvu->sHinhanh="";
            }

            $dichvu->save();
            return redirect('admincp/dichvu/quan_ly_dich_vu')->with('thongbao','Thêm thành công');
             //tra ve
            $dichvu=DichvuModel::get();
            return view('Dichvu::quan_ly_dich_vu',compact('dichvu'));

     }
     public function update_dichvu($id){
           $dichvu=DichvuModel::where('id',$id)->get();
           return view('Dichvu::sua_dich_vu',compact('dichvu'));
     }
     public function updatePost_dichvu(Request $request,$id){
        $this->validate($request,
        [
           'sTenDV'=>'required|min:2|max:100',
           'iDongia'=>'required|integer'
        ],
        [
           'sTenDV.required'=>"Bạn chưa nhập tên Dịch Vụ",
           'sTenDV.min'=>'tên Dịch Vụ phải tối thiểu 2 ký tự',
           'sTenDV.max'=>'tên Dịch vụ chỉ nhập tối đa 100 ký tự',
           'iDongia.required'=>'Bạn chưa nhập đơn giá',
           'iDongia.integer'=>'Đơn giá chỉ nhập số'
        ]);
          $dichvu=DichvuModel::find($id);
          $dichvu->sTenDV=$request->sTenDV;
          $dichvu->iDongia=$request->iDongia;
          $dichvu->sMota=$request->sMota;
          if($request->hasFile('sHinhanh')){
            $file=$request->file('sHinhanh');
            $name=$file->getClientOriginalName();
            $duoi=$file->getClientOriginalExtension();
            if($duoi !='jpg' && $duoi !='png')
            {
                return redirect('admincp/dichvu/quan_ly_dich_vu')->with('error2','Ảnh chỉ cho phép đuôi .JPG hoặc .PNG');
            }
               $hinh=str_random(4)."_".$name;
               while(file_exists('upload/images/'.$hinh))
                   {
                      $hinh=str_random(4)."_".$name;  
                   }
                   $file->move('upload/images/',$hinh);
                   $dichvu->sHinhanh=$hinh;
          }
         $dichvu->save();
         return redirect('admincp/dichvu/quan_ly_dich_vu')->with('thongbao','Thêm thành công');
             //tra ve
         $dichvu=DichvuModel::get();
         return view('Dichvu::quan_ly_dich_vu',compact('dichvu'));
     }
     public function delete_dichvu($id){
        $dichvu=DichvuModel::find($id);
        $dichvu->delete();

        return redirect('admincp/dichvu/quan_ly_dich_vu')->with('thongbao','Xóa thành công');

        $dichvu=DichvuModel::get();
        return view('Dichvu::quan_ly_dich_vu',compact('dichvu'));
     }
}