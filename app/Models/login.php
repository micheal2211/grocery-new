<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class login extends Authenticatable
{
    protected $table = 'user_form';

    protected $fillable = [
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    // Automatically hash password when set
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}

