<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'confirm_password')) {
                $table->string('confirm_password')->nullable();
            }

            // Skip 'image' to avoid duplicate column error
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'confirm_password')) {
                $table->dropColumn('confirm_password');
            }

            // Do not drop 'image' since this migration didn't add it
        });
    }
};
