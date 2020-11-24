<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet_Info extends Model
{
   
    public $table = 'pet_health_infos';

    

    public function user(){
        return $this->belongsTo('App\User', 'pet_owner_id', 'id');
    }

    public function pets(){
        return $this->belongsTo('App\Pet', 'pet_id', 'id');
    }

    public function medhistory(){
        return $this->hasOne('App\MedicaL_Histories');
    }

   
}
