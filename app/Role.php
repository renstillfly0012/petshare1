<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;


class Role extends Model
{
    
    
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function role_user()
    {
        return $this->hasMany('App\Role_User')->withTimestamps();
    }
}
