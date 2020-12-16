<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Medical_Histories extends Model
{
    use LogsActivity;
    public $table = 'medical_histories';
    
    protected $fillable = [
        'pet_info_id', 'pet_id','date','description'
        ,'diagnosis','test_performed','test_results'
        ,'action','medications','comments'
        ];


        protected static $logAttributes = [
            'description', 'diagnosis', 'test_performed','test_results'
             ,'action','medications','comments'];

        protected static $logName = 'Medical History For a Pet';
    
        protected static $logOnlyDirty = true;
    
        public function getDescriptionForEvent(string $eventName): string
        {
            return "has {$eventName} a";
        }

    public function pet_info(){
        return $this->belongsTo('App\Pet_Info','pet_info_id', 'id');
    }

    public function pets(){
        return $this->belongsTo('App\Pet', 'pet_id', 'id');
    }
}
