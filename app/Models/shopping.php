<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shopping extends Model
{
    protected $table = 'shopping';

    protected $fillable = [
        'name', 'email', 'password', 'c_password', 'image',
    ];

    // Hide password if you use API responses
    protected $hidden = [
        'password',
    ];
}
