<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use SoftDeletes;

    // protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'email','password', 'remember_token','email_verified_at',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function pets()
    {
        return $this->hasMany('App\Pet');
    }

    public function reports()
    {
        return $this->hasMany('App\Report');
    }

    public function appointments()
    {
        return $this->hasMany('App\Appointment');
    }


    public function hasAnyRoles($roles)
    {
        if ($this->roles()->wherein('name', $roles)->first()) {
            return true;
        }
        return false;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public function setPasswordAttribute($password){
        if (Hash::needsRehash($password))
        {
            $this->attributes['password'] = bcrypt($password);
        }   
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($user) {
            $user->appointments()->delete();
        });
    
        static::deleting(function($user) {
            $user->reports()->delete();
        });

        static::deleting(function($user) {
            $user->appointments()->delete();
        });

        
    }

 


}
