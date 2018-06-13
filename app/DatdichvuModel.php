<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatdichvuModel extends Model
{
    //
    protected $table='tblDatdichvu';
    //
    public $timestamps=true;
    //connect
    public function khachhang(){
    	return $this->belongsTo('App\KhachhangModel','FK_IDKhachhang','id');
    }
    public function dichvu(){
    	return $this->belongsTo('App\DichvuModel','FK_IDDichvu','id');
    }
    public function hoadon(){
    	return $this->hasMany('App\HoadonModel','FK_IDDatdichvu','id');
    }
}
