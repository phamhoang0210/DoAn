<?php

namespace App\Modules\User\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\UserType;
use App\TaikhoanModel;
use App\LoaitaikhoanModel;
use Illuminate\Support\Facades\Hash;
use Validator;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use PhpParser\Comment;
use Crypt;



class UserController extends Controller{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    

    public function index(){

      if (Auth::check())
        return view('backend/blank');
      else
        return view('User::login');
    }

    function login(){
      if (Auth::check()) {
        return Redirect::to("admincp/");
        }
        return view('User::login');
    }

    function logout(){
      Auth::logout();
      return view('User::login');
    }

    function postLogin(){
      if (Auth::check()) {
        return Redirect::to("admincp/");
      }
      $email= Input::get('email');
      $password = Input::get('password');
      $var1 = Auth::attempt(array('email' => $email, 'password' => $password),true);
      if ($var1)
      {       
        return Redirect::to("admincp");
      }else
        return Redirect::to("admincp/login");
    }

    public function tao_user ()
    {   
      if (!Auth::check()) return \Redirect::to("admincp/login");
      if (Auth::user()->FK_IDLoaitaikhoan !=1 and Auth::user()->FK_IDLoaitaikhoan !=4 ) return \Redirect::to("admincp/");
      $inputs = Input::all(); 

      $validator = Validator::make($inputs, TaikhoanModel::$rules);

      if ($validator->passes()){
        $user = new TaikhoanModel;
        $user->sTen = $inputs['name'];
        $user->password =  Hash::make($inputs['password']);
        $user->email = $inputs['email'];
        $user->FK_IDLoaitaikhoan =  $inputs['user_type_id'];
        $user->save();
        return Redirect::to('admincp/user/danh-muc-user');
      }
      return Redirect::to('admincp/user/tao-user')->withErrors($validator);


    }

    public function sua_user($id)
    {
      if (!Auth::check()) return \Redirect::to("admincp/login");
      $user= TaikhoanModel::find($id);
      $user_types = LoaitaikhoanModel::all();

      return view('User::sua_user', compact('user','user_types'));
    }

    public function capnhat_user($id)
    {
      if (!Auth::check()) return \Redirect::to("admincp/login");

      $inputs = Input::all(); 

      $rules= array(
        'password' => 'required|confirmed|min:3',
        'name'=>'required'  
        );

      $validator = Validator::make($inputs, $rules);

      if ($validator->passes()){
        $user = TaikhoanModel::find($id);
        if (Auth::user()->FK_IDLoaitaikhoan == 1 || Auth::user()->FK_IDLoaitaikhoan == 4){
          $user->sTen = $inputs['name'];
          $user->password =  Hash::make($inputs['password']);
          $user->FK_IDLoaitaikhoan =  $inputs['user_type_id'];
          $user->save();
        }else{
          $user->sTen = $inputs['name'];
          $user->password =  Hash::make($inputs['password']);

          $user->save();
        }


        return Redirect::to('admincp/user/danh-muc-user');
      }
      return Redirect::to('admincp/user/user_sua/'.$id)->withErrors($validator);
    }

    public function tao_quyen(Request $request)
    {
      if (!Auth::check()) return \Redirect::to("admincp/login");
      if (Auth::user()->FK_IDLoaitaikhoan !=1) return \Redirect::to("admincp/");

      $quyen = new LoaitaikhoanModel;
      $quyen->sTen = $request->input('ten_quyen');
      $quyen->sMota = $request->input('description');
      $quyen->sQuyen="";
      $quyen->save();
      return \Redirect::to('admincp/user/ql-quyen');
    }

    public function xoa_user($id)
    {
      if (!Auth::check()) return \Redirect::to("admincp/login");
      if (Auth::user()->FK_IDLoaitaikhoan !=1 and Auth::user()->FK_IDLoaitaikhoan !=4) return \Redirect::to("admincp/");



      $user = TaikhoanModel::find($id);
      if ($user->FK_IDLoaitaikhoan==1)
       return \Redirect::to("admincp/");

     $user->delete();
     return \Redirect::to('admincp/user/danh-muc-user');
   }
   public function chitiet_user($id)
   {
    if (!Auth::check()) return \Redirect::to("admincp/login");
    $user = TaikhoanModel::find($id);
    $user_types = LoaitaikhoanModel::all();
    return view('User::chi_tiet_user', compact('user','user_types'));
  }

  public function ql_quyen()
  {
    if (!Auth::check()) return \Redirect::to("admincp/login");

    if (Auth::user()->FK_IDLoaitaikhoan !=1) return \Redirect::to("admincp/");

    $FK_IDLoaitaikhoan = Input::get ('FK_IDLoaitaikhoan');
    $user_type = LoaitaikhoanModel::find($FK_IDLoaitaikhoan);
    $user_types = LoaitaikhoanModel::all();
    $quyen = explode(',',$user_type->sQuyen);

    return view('User::ql_nhomquyen', compact('quyen','user_type','user_types'));
  }

  public function ql_nhomquyen($id)
  {
    if (!Auth::check()) return \Redirect::to("admincp/login");
    if (Auth::user()->FK_IDLoaitaikhoan !=1) return \Redirect::to("admincp/");

    $user_type_id = $id;
    $user_type = LoaitaikhoanModel::find($user_type_id);
    $user_type->sQuyen = implode(',',Input::get('user_type_permissions'));
    //implode: chuyen mang thanh chuoi
    $user_types = LoaitaikhoanModel::all();
    $quyen = Input::get('user_type_permissions');
    $user_type->save();
    return view('User::ql_nhomquyen', compact('quyen','user_type','user_types'));
  }   

}