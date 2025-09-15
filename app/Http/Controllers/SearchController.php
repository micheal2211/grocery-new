<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class SearchController extends Controller
{
    // Search products
    public function search(Request $request)
    {
        $query = $request->input('search_box');

        $products = Product::when($query, function ($q) use ($query) {
            $q->where('name', 'like', "%{$query}%");
        })->get();

        return view('pro-serch', compact('products', 'query'));
    }

    // Add to wishlist
    public function addToWishlist(Request $request)
    {
        $user_id = Auth::id();
        if (!$user_id) {
            return redirect()->route('pro-login')->with('error', 'Please login first.');
        }

        $data = $request->only(['pid', 'p_name', 'p_price', 'p_image']);

        // check wishlist
        $exists = DB::table('wishlist')
            ->where('user_id', $user_id)
            ->where('name', $data['p_name'])
            ->exists();

        if ($exists) {
            return back()->with('error', 'Already added to wishlist!');
        }

        // check cart
        $inCart = DB::table('cart')
            ->where('user_id', $user_id)
            ->where('name', $data['p_name'])
            ->exists();

        if ($inCart) {
            return back()->with('error', 'Already added to cart!');
        }

        // insert
        DB::table('wishlist')->insert([
            'user_id' => $user_id,
            'pid'     => $data['pid'],
            'name'    => $data['p_name'],
            'price'   => $data['p_price'],
            'image'   => $data['p_image'],
        ]);

        return back()->with('success', 'Added to wishlist!');
    }

    // Add to cart
    public function addToCart(Request $request)
    {
        $user_id = Auth::id();
        if (!$user_id) {
            return redirect()->route('pro-login')->with('error', 'Please login first.');
        }

        $data = $request->only(['pid', 'p_name', 'p_price', 'p_image', 'p_qty']);

        $exists = DB::table('cart')
            ->where('user_id', $user_id)
            ->where('name', $data['p_name'])
            ->exists();

        if ($exists) {
            return back()->with('error', 'Already added to cart!');
        }

        DB::table('cart')->insert([
            'user_id'  => $user_id,
            'pid'      => $data['pid'],
            'name'     => $data['p_name'],
            'price'    => $data['p_price'],
            'image'    => $data['p_image'],
            'quantity' => $data['p_qty'] ?? 1,
        ]);

        return back()->with('success', 'Added to cart!');
    }
}
