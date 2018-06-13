<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DichvuModel extends Model
{
    //
    protected $table='tblDichvu';
    //
    public $timestamps=true;
    //connect
    public function datdichvu(){
    	return $this->hasMany('App\Datdichvu','FK_IDDichvu','id');
    }
    public function phanhoi(){
    	return $this->hasMany('App\Phanhoi','FK_IDDichvu','id');
    }
}
