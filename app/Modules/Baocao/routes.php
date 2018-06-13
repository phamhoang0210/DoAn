<?php
$namespace = 'App\Modules\Baocao\Controllers';

use App\User;
use App\UserType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


Route::group(array('middleware'=>'web','module'=>'Baocao','namespace' => $namespace), function() {
	Route::group(['prefix' => 'admincp'], function(){
       
		Route::get('/', function(){

			if (Auth::check())
                	return view('backend/blank');			
			else
				return view('User::login');
		});
		Route::group(['prefix'=>'baocao'],function(){
			  //bao cao_dat dich vu
              Route::get('bao_cao_dat_dich_vu','BaocaoController@baocao_datdichvu');
              Route::post('bao_cao_dat_dich_vu','BaocaoController@baocao_datdichvu');
              //thong ke luong khach hang
              Route::get('thong_ke_luong_khach_hang','BaocaoController@thongkeluongkhachhang');
              Route::post('thong_ke_luong_khach_hang','BaocaoController@thongkeluongkhachhang');
		});
	});
});