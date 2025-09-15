<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    public function index(Request $request)
    {
        // ✅ Handle add to cart/wishlist if query params exist
        if ($request->has('add_to_cart') || $request->has('add_to_wishlist')) {
            return $this->processProductAction($request);
        }

        // ✅ Show products
        $products = DB::table('product')->limit(6)->get();
        return view('pro-home', compact('products'));
    }

    public function handleForm(Request $request)
    {
        // ✅ Handle POST form
        return $this->processProductAction($request);
    }

    private function processProductAction(Request $request)
    {
        // ✅ Ensure the user is logged in
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to perform this action.');
        }

        $user_id = Auth::id();

        $product = [
            'pid'   => $request->input('pid'),
            'name'  => $request->input('p_name'),
            'price' => $request->input('p_price'),
            'image' => $request->input('p_image'),
            'qty'   => $request->input('p_qty', 1),
        ];

        // ✅ Validate product id (prevent null insert)
        if (empty($product['pid'])) {
            return redirect()->back()->with('error', 'Invalid product selected.');
        }

        // ✅ Add to Cart
        if ($request->has('add_to_cart')) {
            $exists = DB::table('carts')
                ->where('pid', $product['pid'])
                ->where('user_id', $user_id)
                ->exists();

            if ($exists) {
                return redirect()->back()->with('info', 'Already added to cart!');
            }

            // Remove from wishlist if it exists there
            DB::table('wishlists')
                ->where('pid', $product['pid'])
                ->where('user_id', $user_id)
                ->delete();

            DB::table('carts')->insert([
                'idno'      => rand(1000, 9999), // or generate however you like
                'user_id'   => $user_id,
                'pid'       => $product['pid'],
                'name'      => $product['name'],
                'price'     => $product['price'],
                'quantity'  => $product['qty'],
                'image'     => $product['image'],
                'created_at'=> now(),
                'updated_at'=> now(),
            ]);

            return redirect()->back()->with('success', 'Product added to cart!');
        }

        // ✅ Add to Wishlist
        if ($request->has('add_to_wishlist')) {
            $exists = DB::table('wishlists')
                ->where('pid', $product['pid'])
                ->where('user_id', $user_id)
                ->exists();

            if ($exists) {
                return redirect()->back()->with('info', 'Already added to wishlist!');
            }

            DB::table('wishlists')->insert([
                'user_id'   => $user_id,
                'pid'       => $product['pid'],
                'name'      => $product['name'],
                'price'     => $product['price'],
                'image'     => $product['image'],
                'created_at'=> now(),
                'updated_at'=> now(),
            ]);

            return redirect()->back()->with('success', 'Product added to wishlist!');
        }

        return redirect()->back()->with('error', 'Invalid action.');
    }
}
