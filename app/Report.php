<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Report extends Model
{
    use Notifiable;

    
    protected $fillable = [
        'user_id','address', 'description','image'
    ];


    public function user(){
        return $this->belongsTo('App\User');
    }
}
