<?php
$namespace = 'App\Modules\Loaiphong\Controllers';

use App\Cpname; 
use App\Cp; 
use App\User;
use App\UserType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


Route::group(array('middleware'=>'web','module'=>'Loaiphong','namespace' => $namespace), function() {
	Route::group(['prefix' => 'admincp'], function(){
       
		Route::get('/', function(){

			if (Auth::check())
                	return view('backend/blank');			
			else
				return view('User::login');
		});
		Route::group(['prefix'=>'loaiphong'],function(){
			//code
			Route::get('quan_ly_loai_phong','LoaiphongController@ql_loaiphong');
            //add_loaiphong
			Route::post('quan_ly_loai_phong','LoaiphongController@addPost_loaiphong');
			// //update_loaiphong
			Route::get('sua_loai_phong/{id}','LoaiphongController@update_loaiphong');
			Route::post('sua_loai_phong/{id}','LoaiphongController@uploadPost_loaiphong');
			// //delete_loaiphong
			Route::get('delete_loaiphong/{id}','LoaiphongController@delete_loaiphong');
	    });
    });
});