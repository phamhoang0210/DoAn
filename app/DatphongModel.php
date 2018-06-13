<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatphongModel extends Model
{
    //
    protected $table='tblDatphong';
    //
    public $timestamps=true;
    //connect
    public function khachhang(){
    	return $this->belongsTo('App\KhachhangModel','FK_IDKhachhang','id');
    }
    public function ctdatphong(){
        return $this->hasOne('App\CTdatphongModel','FK_IDDatphong','id');
    }
    public function loaiphong(){
    	return $this->belongsTo('App\LoaiphongModel','FK_IDLoaiphong','id');
    }
    public function hoadon(){
        return $this->hasMany('App\HoadonModel','FK_IDDatphong','id');
    }
}
