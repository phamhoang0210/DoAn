<?php
$namespace = 'App\Modules\Phanhoi\Controllers';

use App\Cpname; 
use App\Cp; 
use App\User;
use App\UserType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


Route::group(array('middleware'=>'web','module'=>'Phanhoi','namespace' => $namespace), function() {
	Route::group(['prefix' => 'admincp'], function(){
       
		Route::get('/', function(){

			if (Auth::check())
                	return view('backend/blank');			
			else
				return view('User::login');
		});
		Route::group(['prefix'=>'phanhoi'],function(){
			//code
			Route::get('quan_ly_phan_hoi','PhanhoiController@ql_phanhoi');
			//chitietphanhoi
			Route::get('chi_tiet_phan_hoi/{id}','PhanhoiController@chitietphanhoi');
	    });
    });
});