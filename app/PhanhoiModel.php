<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhanhoiModel extends Model
{
    //
    protected $table="tblPhanhoi";
    //
    public $timestamps=true;
    //lien ket khach hang
    public function khachhang(){
    	return $this->belongsTo('App\KhachhangModel','FK_IDKhachhang','id');
    }
    //dichvu
    public function dichvu(){
    	return $this->belongsTo('App\DichvuModel','FK_IDDichvu','id');
    }
    public function phong(){
    	return $this->belongsTo('App\PhongModel','FK_IDPhong','id');
    }
}
