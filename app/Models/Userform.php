<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserForm extends Model
{
    use HasFactory;

    protected $table = 'users'; // Table name is correct

    protected $fillable = [
        'name',
        'email',
        'password',
        'confirm_password', // Fixed typo
        'image',
    ];
}
