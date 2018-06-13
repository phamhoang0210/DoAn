<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhongModel extends Model
{
    //
    protected $table='tblPhong';
    //
    public $timestamps=true;
    //connect
    public function loaiphong(){
    	return $this->belongsTo('App\LoaiphongModel','FK_IDLoaiphong','id');
    }
    public function ctdatphong(){
        return $this->hasOne('App\CTdatphongModel','FK_IDPhong','id');
    }
    public function phanhoi(){
    	return $this->hasMany('App\PhanhoiModel','FK_IDPhong','id');
    }
    
}
