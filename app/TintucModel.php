<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TintucModel extends Model
{
    //
    protected $table='tblTintuc';
    //
    public $timestamps=true;

    public function user()
    {
         return $this->belongsTo('App\User','FK_IDUsers','id');
    }
}
