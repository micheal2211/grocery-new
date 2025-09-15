<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('carts')) {
            Schema::create('carts', function (Blueprint $table) {
                $table->id();
                $table->string('idno')->nullable();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->unsignedBigInteger('pid');
                $table->string('name');
                $table->decimal('price', 8, 2);
                $table->integer('quantity')->default(1);
                $table->string('image')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
