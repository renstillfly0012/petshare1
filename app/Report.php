<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Report extends Model
{
    use Notifiable;

    
    protected $fillable = [
        'user_id','address', 'description','image',
    ];

    protected $hidden = [
        'address'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function locations(){
        return $this->hasMany('App\Location');
    }
}
