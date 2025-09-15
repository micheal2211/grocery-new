<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class projectR extends Model
{
    protected $table = 'projectR';

    protected $fillable = [
        'idno', 'name', 'email', 'password', 'c_password', 'image',
    ];

    // Hide password if you use API responses
    protected $hidden = [
        'password',
    ];
}