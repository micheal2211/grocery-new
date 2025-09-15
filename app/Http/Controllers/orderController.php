<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('pro-login')->with('error', 'Please login to view orders');
        }

        try {
            // Get database name
            $dbName = DB::connection()->getDatabaseName();
            Log::info("Connected to database: {$dbName}");

            // Check if table exists
            $tableExists = DB::select("
                SELECT COUNT(*) AS count FROM information_schema.tables 
                WHERE table_schema = ? AND (table_name = ? OR table_name = ?)",
                [$dbName, 'orders', 'Orders']
            )[0]->count > 0;

            if (!$tableExists) {
                throw new \RuntimeException('Orders table not found');
            }

            // Get orders
            $orders = DB::table('orders')
                ->where('user_id', Auth::id())
                ->orderBy('placed_on', 'desc')
                ->get();

            if ($orders->isEmpty()) {
                Log::info("No orders found for user ".Auth::id());
                return view('orders', [
                    'orders' => [],
                    'statusColors' => [
                        'pending' => 'text-danger',
                        'completed' => 'text-success'
                    ]
                ]);
            }

            return view('orders', [
                'orders' => $orders,
                'statusColors' => [
                    'pending' => 'text-danger',
                    'completed' => 'text-success'
                ]
            ]);

        } catch (\Exception $e) {
            Log::error("Order loading error: ".$e->getMessage());
            return redirect()->back()->with('error', 'Error loading orders. Please try again later.');
        }
    }

    public function debugDb()
    {
        try {
            return response()->json([
                'database' => DB::connection()->getDatabaseName(),
                'tables' => DB::select('SHOW TABLES'),
                'orders_structure' => DB::select('DESCRIBE orders'),
                'connection_status' => DB::connection()->getPdo() ? true : false
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}