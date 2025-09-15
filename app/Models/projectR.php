<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectR extends Model
{
    protected $table = 'user_form'; // optional if table is not `project_rs`
    protected $fillable = ['name', 'email', 'password', 'image'];
}
