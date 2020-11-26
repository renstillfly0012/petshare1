<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_User extends Model
{
    public $table = 'role_user';

    public function roles() {
        return $this->belongsToMany('App\Role');
    }

}
