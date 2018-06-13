<?php
$namespace = 'App\Modules\Phong\Controllers';

use App\User;
use App\UserType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


Route::group(array('middleware'=>'web','module'=>'Phong','namespace' => $namespace), function() {
	Route::group(['prefix' => 'admincp'], function(){
       
		Route::get('/', function(){

			if (Auth::check())
                	return view('backend/blank');			
			else
				return view('User::login');
		});
		Route::group(['prefix'=>'phong'],function(){
			//code
			Route::get('quan_ly_phong','PhongController@ql_phong');
            //add_loaiphong
			Route::get('them_moi_phong','PhongController@update_phong');
			Route::post('them_moi_phong','PhongController@updatePost_phong');
			//update_loaiphong
			Route::get('sua_phong/{id}','PhongController@sua_phong');
			Route::post('sua_phong/{id}','PhongController@suaPost_phong');
			//delete_loaiphong
			Route::get('delete_phong/{id}','PhongController@delete_phong');
	    });
    });
});