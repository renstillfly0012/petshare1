<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Pet extends Model
{
    //

    protected $fillable = [
        'name', 'age', 'breed','description','image'
    ];

    public function appointments(){
        return $this->hasMany('App\Appointment');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
