<?php
$namespace = 'App\Modules\Datdichvu\Controllers';

use App\User;
use App\UserType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


Route::group(array('middleware'=>'web','module'=>'Datdichvu','namespace' => $namespace), function() {
	Route::group(['prefix' => 'admincp'], function(){
       
		Route::get('/', function(){

			if (Auth::check())
                	return view('backend/blank');			
			else
				return view('User::login');
		});
		Route::group(['prefix'=>'datdichvu'],function(){
             Route::get('quan_ly_dat_dich_vu','DatdichvuController@ql_datdichvu');
             //cap nhat trang thai phong
             Route::get('capnhattrangthai/{id}','DatdichvuController@update_trangthai');
             Route::post('capnhattrangthai/{id}','DatdichvuController@post_trangthai');
             //hoa don dich vu
             Route::get('hoadondichvu/{id}','DatdichvuController@hoadondichvu');
             
		});
		

	});
});