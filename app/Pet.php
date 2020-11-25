<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


class Pet extends Model
{
    //
    use LogsActivity;

    protected $fillable = [
        'name', 'age', 'breed','description','image','qrcodePath'
    ];

    protected static $logAttributes = ['name', 'age', 'breed','description','image'];

    protected static $logName = 'Pet';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "has {$eventName} a";
    }

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
