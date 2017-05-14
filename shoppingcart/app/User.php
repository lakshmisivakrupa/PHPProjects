<?php

namespace App;
//use Illuminate\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as AuthenticatableTrait;
class User extends AuthenticatableTrait 
{

    protected $fillable = [
         'email', 'password',
    ];


protected $hidden = [
        'password', 'remember_token',

    ];

    public function orders()
    {
    	return $this->hasMany('App\Order');
    }
}
