<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\User;
use App\Pet;

class Appointment extends Model
{
    use Notifiable;

    
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function pet()
    {
        return $this->belongsTo('App\Pet');
    }

    
}
