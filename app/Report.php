<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use Notifiable;
    use SoftDeletes;
    
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
