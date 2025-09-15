<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// Create new migration: php artisan make:migration update_orders_table
public function up()
{
    Schema::table('orders', function (Blueprint $table) {
        $table->text('total_products')->nullable()->after('method');
        $table->string('placed_on', 20)->nullable()->after('total_price');
    });
}

public function down()
{
    Schema::table('orders', function (Blueprint $table) {
        $table->dropColumn('total_products');
    });
}
};
