<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachhangModel extends Model
{
    //
    protected $table='tblKhachhang';
    //
    public $timestamps=true;
    //connect
    public function user(){
    	return $this->hasOne('App\User','FK_IDUsers','id');
    }
    public function datphong(){
    	return $this->hasMany('App\DatphongModel','FK_IDKhachhang' ,'id');
    }
    public function datdichvu(){
    	return $this->hasMany('App\DatdichvuModel','FK_IDKhachhang','id');
    }
    public function phanhoi(){
    	return $this->hasMany('App\PhanhoiModel','FK_IDKhachhang','id');
    }

}
