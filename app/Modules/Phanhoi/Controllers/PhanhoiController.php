<?php

namespace App\Modules\Phanhoi\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\KhachhangModel;
use App\DatphongModel;
use App\PhanhoiModel;
use App\User;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use PhpParser\Comment;



class PhanhoiController extends Controller{
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
       public function ql_phanhoi(){
       	 $phanhoi=PhanhoiModel::all();
         return view('Phanhoi::quan_ly_phan_hoi',compact('phanhoi'));
       }
       public function chitietphanhoi($id){
       	  $ctphanhoi=PhanhoiModel::where('id',$id)->get();
       	  return view('Phanhoi::chi_tiet_phan_hoi',compact('ctphanhoi'));
       }



}