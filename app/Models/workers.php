<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workers extends Model
{
    protected $table = 'workers';

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'country', 'sex', 'age',
    ];

    // Hide password if you use API responses
    protected $hidden = [
        'password',
    ];
}
