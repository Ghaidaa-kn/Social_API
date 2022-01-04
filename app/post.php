<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function comments(){
    	return $this->hasMany('App\Comment');
    }

    // public function friend(){
    // 	return $this->belongsTo('App\Friend');
    // }
}
