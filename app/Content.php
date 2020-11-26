<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Content extends Model
{
    use SoftDeletes;
    use LogsActivity;

    protected static $logName = 'Content';
    protected static $recordEvents = ['updated'];

    public function getDescriptionForEvent(string $eventName): string
    {
        
        return "has {$eventName} a";
    }


}
