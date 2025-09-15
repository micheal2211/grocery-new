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
        Schema::create('products', function (Blueprint $table) {
            $table->id();$table->string('name');          // Product name
            $table->string('category');      // Category
            $table->text('detail');          // Details (long text)
            $table->decimal('price', 10, 2); // Price with 2 decimal places
            $table->string('image')->nullable(); // Image path/filename, nullable if no image
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
