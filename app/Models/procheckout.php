<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Procheckout extends Model
{
    // ✅ FIXED: table name must match your real table
    protected $table = 'procheckout';

    protected $fillable = [
        'user_id', 'name', 'number', 'email', 'method', 'address',
        'total_product', 'total_price', 'placed_on', 'payment_status',
    ];
}
