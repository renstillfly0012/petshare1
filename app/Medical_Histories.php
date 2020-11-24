<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medical_Histories extends Model
{

    public $table = 'medical_histories';
    
    protected $fillable = [
        'pet_info_id', 'pet_id','date','description'
        ,'diagnosis','test_performed','test_results'
        ,'action','medications','comments'
        ];

    public function pet_info(){
        return $this->belongsTo('App\Pet_Info','pet_info_id', 'id');
    }

    public function pets(){
        return $this->belongsTo('App\Pet', 'pet_id', 'id');
    }
}
