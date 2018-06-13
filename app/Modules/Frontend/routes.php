<?php
$namespace = 'App\Modules\Frontend\Controllers';

use App\User;
use App\UserType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


Route::group(array('middleware'=>'web','module'=>'Frontend','namespace' => $namespace), function() {
	  Route::get('/','PoonsaController@trangchu')->name('callhome');
	  //datphong
	  Route::get('datphong','PoonsaController@get_datphong');
	  Route::post('datphong','PoonsaController@datphong');
	  Route::post('datphongtructuyen','PoonsaController@post_datphong');
	  //gioithieu
	  Route::get('gioithieu','PoonsaController@gioithieu');
	  //loaiphong
	  Route::get('loaiphong','PoonsaController@loaiphong');
	  Route::post('loaiphong','PoonsaController@post_loaiphong');
	  //dichvu
	  Route::get('dichvu','PoonsaController@dichvu');
	  //tintuc
	  Route::get('tintuc','PoonsaController@tintuc');
	  //chitiettin
	  Route::get('chitiettintuc/{id}','PoonsaController@chitiettintuc');

	  //khachhangdadat
	  // Route::get('khachhangdadat','PoonsaController@khachhangdadat');
	  //timkiemdinhdanh
	  Route::post('khachhangdadat','PoonsaController@xacthucdinhdanh');
	  //capnhatdatphong
	  Route::post('getkhachhangdadat','PoonsaController@getkhachhangdadat');
	  Route::post('capnhatdatphong/{id}','PoonsaController@capnhatdatphong');
	  //
	  //datdichvu
	  Route::post('datdichvu/{sDinhdanh}','PoonsaController@datdichvu')->name('callbackdv');
	  Route::post('postdatdichvu','PoonsaController@post_datdichvu');
	  //capnhatdatdichvu
	  Route::post('capnhatdatdichvu/{id}','PoonsaController@capnhatdatdichvu');
	  //khach hang cu dat phong
      Route::get('khachhangcudatphong/{sDinhdanh}','PoonsaController@khachhangcu_datphong');
      //ajax
      Route::get("Soluong/{id}",'PoonsaController@sophong');
      Route::get("Soluongloaiphong/{id}/{ngayden}/{ngaydi}",'PoonsaController@ajax_loaiphong');
      Route::get("Soluongngayden/{id}/{ngayden}/{ngaydi}",'PoonsaController@ajax_ngayden');
      //phanhoi
      Route::get('phan_hoi/{sDinhdanh}','PoonsaController@phanhoi')->name('prevphanhoi');
      Route::post('phan_hoi/{sDinhdanh}','PoonsaController@post_phanhoi');

      //dang ky tai khoan
      Route::get('dang_ky_tai_khoan','PoonsaController@dangkytaikhoan');
      Route::post('dang_ky_tai_khoan','PoonsaController@post_dangkytaikhoan');
      //login
      Route::post('login_post','PoonsaController@post_logingiaodien');
      Route::get('logout','PoonsaController@logout');



       //nguoi dung dang nhap
      Route::get('nguoi_dung_dang_nhap','PoonsaController@post_nguoidungdangnhap');
      Route::post('nguoi_dung_dang_nhap','PoonsaController@post_nguoidungdangnhap');
});