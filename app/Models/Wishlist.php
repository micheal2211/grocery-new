<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    // Explicitly declare table name if not default plural form
    protected $table = 'wishlist';

    // Allow mass assignment for these fields
    protected $fillable = [
        'user_id',  // Foreign key to users table
        'pid',      // Product identifier (not a foreign key unless defined)
        'name',
        'price',
        'image',
    ];
}

