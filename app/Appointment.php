<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Pet;

class Appointment extends Model
{
    use Notifiable;
    use SoftDeletes;
    
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function pet()
    {
        return $this->belongsTo('App\Pet');
    }

    
}
