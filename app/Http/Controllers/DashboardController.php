<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index()
    {
        // Total pending payments sum
        $total_pendings = Order::where('payment_status', 'pending')->sum('total_price');

        // Total completed payments sum
        $total_completed = Order::where('payment_status', 'completed')->sum('total_price');

        // Number of orders
        $number_of_orders = Order::count();

        // Number of products
        $number_of_products = Product::count();

        // Number of users (normal users)
        $number_of_users = User::where('user_type', 'user')->count();

        // Number of admins
        $number_of_admins = User::where('user_type', 'admin')->count();

        // Number of accounts (all users)
        $number_of_accounts = User::count();

        // Number of messages
        $number_of_messages = Message::count();

        // Pass all data to the dashboard view
        return view('pro-dashboard', compact(
            'total_pendings',
            'total_completed',
            'number_of_orders',
            'number_of_products',
            'number_of_users',
            'number_of_admins',
            'number_of_accounts',
            'number_of_messages'
        ));
    }
}
