<?php
$namespace = 'App\Modules\User\Controllers';

use App\User;
use App\UserType;
use App\TaikhoanModel;
use App\LoaitaikhoanModel;
use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\CheckLogout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


Route::group(array('middleware'=>'web','module'=>'User','namespace' => $namespace), function() {
	Route::group(['prefix' => 'admincp'], function(){

		  Route::get('/', function(){

		  if(Auth::check())
             return view('backend/blank');			
		       else
		 	return view('User::login');
		  });
		Route::get('login', 'UserController@login');
		Route::post('login','UserController@postLogin');

	    Route::get('logout', [
			'as' => 'logout',
			'uses' => 'UserController@logout'
			]);
		

		Route::group(['prefix' => 'user'], function(){

			Route::get('danh-muc-user', function()
			{
				if (!Auth::check()) return \Redirect::to("admincp/login");
				if (Auth::user()->FK_IDLoaitaikhoan ==1 || Auth::user()->FK_IDLoaitaikhoan == 4)
					{
						$users = TaikhoanModel::all();
						$user_types = LoaitaikhoanModel::all();
						return view('User::danh_muc_user', compact('users','user_types'));
					}
					return \Redirect::to("admincp/");
			});
			Route::get('ql-quyen', function()
			{
				if (!Auth::check()) return \Redirect::to("admincp/login");
				if (Auth::user()->FK_IDLoaitaikhoan ==1 || Auth::user()->FK_IDLoaitaikhoan == 4)
				{
					$user_types = LoaitaikhoanModel::all();
				return view('User::ql_quyen', compact('user_types'));
				} return \Redirect::to("admincp/");

				
			});
			Route::post('ql-quyen','UserController@ql_quyen');
			Route::post('ql-nhomquyen/{id}','UserController@ql_nhomquyen');

			Route::get('tao-user', function()
			{
				if (!Auth::check()) return \Redirect::to("admincp/login");
				if (Auth::user()->FK_IDLoaitaikhoan ==1 || Auth::user()->FK_IDLoaitaikhoan == 4) 
					{
						$user_types = LoaitaikhoanModel::all();
				        return view('User::tao_user',compact('user_types'));
					}
					return \Redirect::to("admincp/");	
			});
			Route::post('tao-quyen','UserController@tao_quyen');
			Route::post('tao_user','UserController@tao_user');
			Route::get('user_sua/{id}', 'UserController@sua_user');
			Route::post('user_capnhat/{id}','UserController@capnhat_user');
			Route::get('user_chitiet/{id}','UserController@chitiet_user');
			Route::get('user_xoa/{id}','UserController@xoa_user');
			



				});

    });
});