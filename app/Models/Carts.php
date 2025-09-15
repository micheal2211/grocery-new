<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    // Use the correct table name (make sure your actual table is named 'carts')
    protected $table = 'carts';

    protected $fillable = [
        'idno', 'user_id', 'pid', 'name', 'price', 'quantity', 'image',
    ];

    // If you don't have a password field, this is not needed:
    // protected $hidden = ['password'];
}
