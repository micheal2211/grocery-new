<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $category_name = $request->query('category', '');
        $products = DB::table('products')
            ->where('category', $category_name)
            ->get();

        return view('pro-category', compact('products'));
    }

    public function store(Request $request)
    {
        // 👇 Dump everything submitted from the form
        dd($request->all());
        
        $user_id = Auth::id();

        if (!$user_id) {
            return back()->with('error', 'You must be logged in to perform this action.');
        }

        // ✅ Add to Wishlist
        if ($request->has('add_to_wishlist')) {
            $exists = DB::table('wishlists')
                ->where('user_id', $user_id)
                ->where('pid', $request->pid)
                ->exists();

            if ($exists) {
                return back()->with('error', 'Already in wishlist!');
            }

            DB::table('wishlists')->insert([
                'user_id'   => $user_id,
                'pid'       => $request->pid,
                'name'      => $request->p_name,
                'price'     => $request->p_price,
                'image'     => $request->p_image,
                'created_at'=> now(),
                'updated_at'=> now(),
            ]);

            return back()->with('success', 'Product added to wishlist!');
        }

        // ✅ Add to Cart
        if ($request->has('add_to_cart')) {
            $exists = DB::table('carts')
                ->where('user_id', $user_id)
                ->where('pid', $request->pid)
                ->exists();

            if ($exists) {
                return back()->with('error', 'Already in cart!');
            }

            DB::table('carts')->insert([
                'user_id'   => $user_id,
                'pid'       => $request->pid,
                'name'      => $request->p_name,
                'price'     => $request->p_price,
                'image'     => $request->p_image,
                'quantity'  => $request->p_qty,
                'created_at'=> now(),
                'updated_at'=> now(),
            ]);

            return back()->with('success', 'Product added to cart!');
        }

        return back()->with('error', 'Invalid action.');
    }
}
