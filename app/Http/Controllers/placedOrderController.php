<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class PlacedOrderController extends Controller
{
    public function index()
    {
        // ✅ Fetch orders only for logged in user
        $orders = Order::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        // ✅ Map colors for statuses
        $statusColors = [
            'pending'   => 'text-warning',
            'completed' => 'text-success',
            'failed'    => 'text-danger',
        ];

        return view('pro-placed-orders', compact('orders', 'statusColors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'update_payment' => 'required|in:pending,completed',
        ]);

        $order = Order::where('user_id', Auth::id())->findOrFail($id);
        $order->payment_status = $request->update_payment;
        $order->save();

        return redirect()->back()->with('success', 'Order payment status updated!');
    }

    public function destroy($id)
    {
        $order = Order::where('user_id', Auth::id())->findOrFail($id);
        $order->delete();

        return redirect()->back()->with('success', 'Order deleted successfully!');
    }
}
