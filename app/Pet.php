<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Pet extends Model
{
    //

    protected $fillable = [
        'name', 'age', 'breed','description','image','qrcodePath'
    ];

    public function appointments(){
        return $this->hasMany('App\Appointment');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function pet_info(){
        return $this->hasOne('App\Pet_Info');
    }

    public function medical_history(){
        return $this->hasOne('App\Pet_Info');
    }


    
}
