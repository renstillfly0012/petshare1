<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Pet;
use Spatie\Activitylog\Traits\LogsActivity;

class Appointment extends Model
{
    use Notifiable;
    use SoftDeletes;
    use LogsActivity;

    protected $fillable = [
        'user_id','requested_pet_id','requested_date','appointment_type','name','message'
    ];

    // protected static $logAttributes = ['name', 'age', 'breed','description','image'];

    protected static $logName = 'Appointment';
    protected static $recordEvents = ['updated'];

    // protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        
        return "has {$eventName} an";
    }
    
    
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function pet()
    {
        return $this->belongsTo('App\Pet', 'requested_pet_id');
    }

    
}
