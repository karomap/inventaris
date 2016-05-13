<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAvatarAttribute($avatar)
    {
        if(!empty($avatar)) {
            return '/images/'.$avatar;
        }

        return '/images/avatar.png';

    }

    public function item()
    {
        return $this->hasMany('App\Item');
    }

    public function isAdmin() {
        return $this->attributes['role'] == 'admin';
    }
}
