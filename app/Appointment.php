<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    
    public function requests()
    {
        return $this->belongsToMany('App\User');
    }
}
