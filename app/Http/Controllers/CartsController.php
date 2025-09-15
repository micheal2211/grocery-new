<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartsController extends Controller
{
    // ✅ Show a form to add product manually
    public function showAddForm()
    {
        return view('pro-add-to-cart'); // 👈 create this blade file
    }

    // ✅ Add product to cart
    public function addToCart(Request $request)     
    {
        if (!Auth::check()) {
            return redirect()->route('pro-login.form')->with('error', 'Please log in to add items to your cart.');
        }

        $request->validate([
            'product_id' => 'required|integer',
            'name'       => 'required|string|max:255',
            'price'      => 'required|numeric',
            'image'      => 'nullable|string',
            'quantity'   => 'required|integer|min:1',
        ]);

        $user_id = Auth::id();
        $product_id = $request->product_id;

        // Check if product already in user's cart
        $exists = DB::table('carts')
            ->where('user_id', $user_id)
            ->where('pid', $product_id)
            ->exists();

        if ($exists) {
            return back()->with('message', 'Product is already in your cart!');
        }

        // Insert new cart item
        DB::table('carts')->insert([
            'idno'       => Auth::id(), 
            'user_id'    => $user_id,
            'pid'        => $product_id,
            'name'       => $request->name,
            'price'      => $request->price,
            'quantity'   => $request->quantity,
            'image'      => $request->image,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Product added to cart successfully!');
    }

    // ✅ Show all items in the cart
    public function showCart()
    {
        if (!Auth::check()) {
            return redirect()->route('pro-login.form')->with('error', 'You must be logged in to view your cart.');
        }

        $user_id = Auth::id();
        $cart_items = DB::table('carts')->where('user_id', $user_id)->get();

        return view('pro-cart', compact('cart_items'));
    }

    // ✅ Update cart item quantity
    public function updateCart(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('pro-login.form')->with('error', 'Please log in first.');
        }

        $request->validate([
            'cart_id'  => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        DB::table('carts')
            ->where('id', $request->cart_id)
            ->where('user_id', Auth::id())
            ->update([
                'quantity'   => $request->quantity,
                'updated_at' => now(),
            ]);

        return back()->with('success', 'Cart updated successfully!');
    }

    // ✅ Remove item from cart
    public function remove($id)
    {
        if (!Auth::check()) {
            return redirect()->route('pro-login.form')->with('error', 'Please log in first.');
        }

        DB::table('carts')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->delete();

        return back()->with('success', 'Item removed from cart.');
    }
}
