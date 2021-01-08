<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Report extends Model
{
    use Notifiable;
    use SoftDeletes;
    use LogsActivity;

    
    protected $fillable = [
        'user_id','address', 'description','image','email','mobile_number','report_type','name'
    ];

    // protected $hidden = [
    //     'address'
    // ];

    protected static $logName = 'Report';
    protected static $recordEvents = ['updated'];

    public function getDescriptionForEvent(string $eventName): string
    {
        
        return "has {$eventName} a";
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function locations(){
        return $this->hasMany('App\Location');
    }
}
