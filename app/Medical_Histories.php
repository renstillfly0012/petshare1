<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medical_Histories extends Model
{

    public $table = 'medical_histories';
    public function pet_infos(){
        return $this->belongsToMany('App\Pet_Info');
    }
}
