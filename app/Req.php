<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Req extends Model
{
    //
    public $table='request';

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
