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

    public function pet_infos(){
        return $this->belongsToMany('App\Pet_Info');
    }
}
