<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Pet_Info extends Model
{
    use LogsActivity;
   
    public $table = 'pet_health_infos';


    protected static $logAttributes = ['pet_owner_id', 'pet_allergies', 'pet_existing_conditions'];

    protected static $logName = 'Pet Health Record';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "has {$eventName} a";
    }

    

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
