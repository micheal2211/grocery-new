<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Act extends Model
{
    protected $table = 'acts'; // Set the table name

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];
}


\App\Model\User::create([
    'name'=>'Test User',
    'email'=>'test@example.com',
    'password'=>bcrypt('password123')
]);
