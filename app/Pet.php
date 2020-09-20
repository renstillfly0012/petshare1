<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Pet extends Model
{
    //
    public function appointments(){
        return $this->hasMany('App\appointment');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
