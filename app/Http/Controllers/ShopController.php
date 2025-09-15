<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function showShop()
    {
        $products = DB::table('products')->get();
        return view('pro-shop', compact('products'));
    }

    public function handleActions(Request $request)
    {
        $user_id = Auth::id();
        if (!$user_id) {
            return redirect()->route('pro-login.form')->withErrors(['error' => 'Please log in to perform this action']);
        }

        $messages = [];

        // ✅ Add to Wishlist
        if ($request->has('add_to_wishlist')) {
            $pid    = $request->input('pid');
            $p_name = $request->input('p_name');
            $p_price= $request->input('p_price');
            $p_image= $request->input('p_image');

            $check_wishlist = DB::table('wishlist')
                ->where('pid', $pid)
                ->where('user_id', $user_id)
                ->exists();

            $check_cart = DB::table('carts')
                ->where('pid', $pid)
                ->where('user_id', $user_id)
                ->exists();

            if ($check_wishlist) {
                $messages[] = 'Already in wishlist!';
            } elseif ($check_cart) {
                $messages[] = 'Already in cart!';
            } else {
                DB::table('wishlist')->insert([
                    'user_id' => $user_id,
                    'pid'     => $pid,
                    'name'    => $p_name,
                    'price'   => $p_price,
                    'image'   => $p_image,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                $messages[] = 'Added to wishlist';
            }
        }

        // ✅ Add to Cart
        if ($request->has('add_to_cart')) {
            $pid    = $request->input('pid');
            $p_name = $request->input('p_name');
            $p_price= $request->input('p_price');
            $p_image= $request->input('p_image');
            $p_qty  = $request->input('p_qty', 1);

            $check_cart = DB::table('carts')
                ->where('pid', $pid)
                ->where('user_id', $user_id)
                ->exists();

            if ($check_cart) {
                $messages[] = 'Already in cart!';
            } else {
                try {
                    DB::table('carts')->insert([
                        'idno'      => rand(1000, 9999), // optional custom field
                        'user_id'   => $user_id,
                        'pid'       => $pid,             // ✅ FIX: include pid
                        'name'      => $p_name,
                        'price'     => $p_price,
                        'quantity'  => $p_qty,
                        'image'     => $p_image,
                        'created_at'=> now(),
                        'updated_at'=> now(),
                    ]);
                    $messages[] = 'Added to cart';
                } catch (\Exception $e) {
                    $messages[] = 'Error adding to cart: ' . $e->getMessage();
                }
            }
        }

        return redirect()->route('pro-shop')->with('messages', $messages);
    }
}
