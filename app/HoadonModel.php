<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoadonModel extends Model
{
    //
    protected $table='tblHoadon';
    //
    public $timestamps=true;
    //connect
    public function datdichvu(){
    	return $this->belongsTo('App\Datdichvu','FK_IDDatdichvu','id');
    }
    public function datphong(){
    	return $this->belongsTo('App\Datphong','FK_IDDatphong','id');
    }
}
