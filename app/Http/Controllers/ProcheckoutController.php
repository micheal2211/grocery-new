<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProcheckoutController extends Controller
{
    public function showCheckout()
    {
        if (!Auth::check()) {
            return redirect()->route('pro-login')->with('error', 'Please login to checkout');
        }

        // Fetch cart items
        $cart_items = DB::table('carts')
            ->where('user_id', Auth::id())
            ->get()
            ->map(function ($item) {
                return [
                    'name' => $item->name,
                    'price' => $item->price,
                    'quantity' => $item->quantity,
                ];
            })->toArray();

        // Calculate grand total
        $cart_grand_total = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart_items));

        return view('pro-checkout', [
            'cart_items' => $cart_items,
            'cart_grand_total' => $cart_grand_total
        ]);
    }

    public function placeOrder(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('pro-login')->with('error', 'Please login to place an order');
        }

        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'number' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'flat' => 'required|string|max:255',
                'street' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'state' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'pin_code' => 'required|string|max:20',
                'method' => 'required|string|in:cash on delivery,credit card,stripe,paypal',
                'total_products' => 'required|string',
                'total_price' => 'required|numeric|min:0',
            ]);

            $address = implode(', ', [
                $validated['flat'],
                $validated['street'],
                $validated['city'],
                $validated['state'],
                $validated['country'],
                $validated['pin_code']
            ]);

            // ✅ If Stripe selected, redirect to Stripe payment page instead of inserting order immediately
            if ($validated['method'] === 'stripe') {
                // Save checkout details temporarily in session
                session([
                    'checkout_details' => [
                        'user_id'        => Auth::id(),
                        'name'           => $validated['name'],
                        'number'         => $validated['number'],
                        'email'          => $validated['email'],
                        'address'        => $address,
                        'method'         => $validated['method'],
                        'total_products' => $validated['total_products'],
                        'total_price'    => $validated['total_price'],
                    ]
                ]);

                return redirect()->route('stripe.page');
            }

            // ✅ For COD / Credit card / Paypal -> save order immediately
            DB::table('orders')->insert([
                'user_id'        => Auth::id(),
                'name'           => $validated['name'],
                'number'         => $validated['number'],
                'email'          => $validated['email'],
                'address'        => $address,
                'method'         => $validated['method'],
                'total_products' => $validated['total_products'],
                'total_price'    => $validated['total_price'],
                'placed_on'      => now(),
                'payment_status' => 'pending',
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);

            DB::table('carts')->where('user_id', Auth::id())->delete();

            return redirect()->route('pro-success')->with('success', 'Your order was placed successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error placing order: ' . $e->getMessage());
        }
    }

    public function showOrders()
    {
        if (!Auth::check()) {
            return redirect()->route('pro-login')->with('error', 'Please login to view orders');
        }

        $orders = DB::table('orders')
            ->where('user_id', Auth::id())
            ->orderBy('placed_on', 'desc')
            ->get();

        return view('pro-placed-orders', [
            'orders' => $orders,
            'statusColors' => [
                'pending'   => 'text-danger',
                'completed' => 'text-success'
            ]
        ]);
    }
}
