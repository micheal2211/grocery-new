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
       Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('idno')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('number');
            $table->string('email');
            $table->string('method');
            $table->text('address');
            $table->integer('total_product');
            $table->decimal('total_price',10, 2);
            $table->dateTime('place_on');
            $table->string('payment_status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
