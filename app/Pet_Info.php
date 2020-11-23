<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet_Info extends Model
{
   
    public $table = 'pet_health_infos';

    public function user(){
        return $this->belongsToMany('App\User', 'pet_owner_id');
    }

    public function pets(){
        return $this->belongsTo('App\Pet');
    }

   
}
