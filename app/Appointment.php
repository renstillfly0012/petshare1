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

    protected $fillable = [
        'user_id','requested_pet_id','requested_pet','appointment_type'
    ];
    
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function pet()
    {
        return $this->belongsTo('App\Pet', 'requested_pet_id');
    }

    
}
