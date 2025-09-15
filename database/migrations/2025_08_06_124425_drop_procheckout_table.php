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
    Schema::dropIfExists('procheckout');
}

public function down(): void
{
    // Optional: Recreate the table if rollback
    Schema::create('procheckout', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->string('name');
        $table->string('number');
        $table->string('email');
        $table->string('method');
        $table->string('address');
        $table->integer('total_product');
        $table->decimal('total_price', 10, 2);
        $table->dateTime('placed_on')->nullable();
        $table->string('payment_status')->nullable();
        $table->timestamps();
    });
}

};
