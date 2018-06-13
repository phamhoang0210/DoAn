<?php
$namespace = 'App\Modules\Tintuc\Controllers';

use App\Cpname; 
use App\Cp; 
use App\User;
use App\UserType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


Route::group(array('middleware'=>'web','module'=>'Tintuc','namespace' => $namespace), function() {
	Route::group(['prefix' => 'admincp'], function(){
       
		Route::get('/', function(){

			if (Auth::check())
                	return view('backend/blank');			
			else
				return view('User::login');
		});
		Route::group(['prefix'=>'tintuc'],function(){
			//code
			Route::get('quan_ly_tin_tuc','TintucController@ql_tintuc');
            //add_tintuc
			Route::get('them_moi_tin_tuc','TintucController@add_tintuc');
			Route::post('them_moi_tin_tuc','TintucController@addPost_tintuc');
			//update_tintuc
			Route::get('sua_tin_tuc/{id}','TintucController@sua_tintuc');
			Route::post('sua_tin_tuc/{id}','TintucController@suaPost_tintuc');
			//delete_tintuc
			Route::get('delete_tintuc/{id}','TintucController@delete_tintuc');
	    });
    });
});