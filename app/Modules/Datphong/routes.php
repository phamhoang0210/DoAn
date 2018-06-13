<?php
$namespace = 'App\Modules\Datphong\Controllers';

use App\User;
use App\UserType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


Route::group(array('middleware'=>'web','module'=>'Datphong','namespace' => $namespace), function() {
	Route::group(['prefix' => 'admincp'], function(){
       
		Route::get('/', function(){

			if (Auth::check())
                	return view('backend/blank');			
			else
				return view('User::login');
		});
		Route::group(['prefix'=>'datphong'],function(){
             Route::get('quan_ly_dat_phong','DatphongController@ql_datphong');
             //cap nhat trang thai dat phong
             Route::get('capnhattrangthai/{id}','DatphongController@update_datphong');
             Route::post('capnhattrangthai/{id}','DatphongController@postupdate_datphong');
             //cap nhat trang thai dich vu
             Route::post('capnhatdichvu/{id}','DatphongController@post_trangthaidichvu');
             //chi tiet dat phong
             Route::get('chitietdatphong/{sDinhdanh}','DatphongController@chitietdatphong');
             //layphong cho khach hang
             Route::post('chitietdatphong/{sDinhdanh}','DatphongController@layphong');
             //huychonphong
             Route::post('huychonphong/{sDinhdanh}','DatphongController@huychonphong');
             //lichdatphogn
             Route::get('lichdatphong','DatphongController@lichdatphong');
             //
             Route::post('lichdatphong','DatphongController@lichdatphong');

             //datloai phong moi
             Route::get('datloaiphongmoi/{sDinhdanh}','DatphongController@datloaiphong');
             Route::get('sophong/{id}','DatphongController@sophong');
             Route::post('datloaiphong','DatphongController@post_datphong');

             //datphongyeu cau
             Route::get('dat_phong_moi','DatphongController@datphongmoi');
             Route::post('dat_phong_moi','DatphongController@post_datphongmoi');
             //thong tin hoan thanh
             Route::get('thongtinhoanthanh/{id}','DatphongController@thongtinhoanthanh');
             //ajax
             Route::get("Soluong/{id}",'DatphongController@sophong');
             Route::get("Soluongloaiphong/{id}/{ngayden}/{ngaydi}",'DatphongController@ajax_loaiphong');
             Route::get("Soluongngayden/{id}/{ngayden}/{ngaydi}",'DatphongController@ajax_ngayden');
             


		});
	});
});