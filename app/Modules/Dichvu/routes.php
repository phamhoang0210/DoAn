<?php
$namespace = 'App\Modules\Dichvu\Controllers';

use App\User;
use App\UserType;
use App\DichvuModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


Route::group(array('middleware'=>'web','module'=>'Dichvu','namespace' => $namespace), function() {
	Route::group(['prefix' => 'admincp'], function(){
       
		Route::get('/', function(){

			if (Auth::check())
                	return view('backend/blank');			
			else
				return view('User::login');
		});
		Route::group(['prefix'=>'dichvu'],function(){
            Route::get('quan_ly_dich_vu','DichvuController@ql_dichvu');
            Route::post('quan_ly_dich_vu','DichvuController@add_dichvu');
            //updaet
            Route::get('sua_dich_vu/{id}','DichvuController@update_dichvu');
            Route::post('sua_dich_vu/{id}','DichvuController@updatePost_dichvu');
            //delete
            Route::get('xoa_dich_vu/{id}','DichvuController@delete_dichvu');
		});
	});
});