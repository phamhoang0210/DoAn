<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\TaikhoanModel as Authenticatable;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\Authenticatable;

class TaikhoanModel extends Authenticatable
{


   
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table='tblTaikhoan';

    protected $fillable = [
        'sTen', 'email', 'password',
    ];
    

    
    public function tintuc(){
        return $this->hasMany('App\TintucModel','FK_IDUsers','id');
    }
    // public function loaitaikhoan(){
    //     return $this->hasMany('App\LoaitaikhoanModel','FK_IDLoaitaikhoan','id');
    // }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
     // protected $hidden = array('password', 'remember_token');
        
    public static $rules= array(
        //"username" => 'required|alpha_num|min:3',
         "email" => "required|unique:users,email", // bo email | de cho truong hop sso nguoi dung dang nhap ko phai email
        //"username" => "required|min:3|max:20|unique:users,username",
        'password' => 'required|confirmed|min:3',
        'name'=>'required'
        
    );
}
