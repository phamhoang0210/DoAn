<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CTdatphongModel extends Model
{
    //
    protected $table="tblCTdatphong";
    //
    public $timestamps=true;
    //
    public function datphong(){
    	return $this->belongsTo('App\DatphongModel','FK_IDDatphong','id'); 
    }
    public function phong(){
    	return $this->belongsTo('App\PhongModel','FK_IDPhong','id'); 
    }
}
