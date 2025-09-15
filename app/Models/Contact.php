<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // Optional: Only include this if your table name is not 'contacts'
    protected $table = 'contact'; 

    protected $fillable = [
        'idNo', 'user_id', 'name', 'email', 'number', 'message',
    ];
}

