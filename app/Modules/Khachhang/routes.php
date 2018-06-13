<?php
$namespace = 'App\Modules\Khachhang\Controllers';

use App\Cpname; 
use App\Cp; 
use App\User;
use App\UserType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


Route::group(array('middleware'=>'web','module'=>'Khachhang','namespace' => $namespace), function() {
	Route::group(['prefix' => 'admincp'], function(){
       
		Route::get('/', function(){

			if (Auth::check())
                	return view('backend/blank');			
			else
				return view('User::login');
		});
		Route::group(['prefix'=>'khachhang'],function(){
			//code
			Route::get('quan_ly_khach_hang','KhachhangController@ql_khachhang');
			//delete
			Route::get('delete_khachhang/{id}','KhachhangController@delete_khachhang');
	    });
    });
});