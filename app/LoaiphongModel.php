<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiphongModel extends Model
{
    //
    protected $table='tblLoaiphong';
    //
    public $timestamps = true;
    //connect
    public function phong(){
    	return $this->hasMany('App\Phong','	FK_IDLoaiphong','id');
    }
    public function datphong(){
    	return $this->hasMany('App\Datphong','FK_IDLoaiphong','id');
    }
}
