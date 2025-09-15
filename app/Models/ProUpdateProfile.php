<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProUpdateProfile extends Migration
{
    public function up()
    {
        // Drop the table if it exists first
        Schema::dropIfExists('update');

        Schema::create('update', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('email')->unique();
            $table->string('image')->nullable();
            $table->string('old_password');
            $table->string('new_password');
            $table->string('c_password');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('update');
    }
}


