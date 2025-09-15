<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'idno',
        'user_id',
        'name',
        'number',
        'email',
        'method',
        'address',
        'total_product',
        'total_price',
        'place_on',
        'payment_status',
    ];
}
