<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // Show wishlist page
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('pro-login.form')->with('error', 'Please log in to view wishlist.');
        }

        $userId = Auth::id();
        $wishlist = Wishlist::where('user_id', $userId)->get();

        return view('pro-wishlist', compact('wishlist'));
    }

    // Add to wishlist
    public function store(Request $request)
    {
        $request->validate([
            'pid'   => 'required',
            'name'  => 'required|string|max:255',
            'price' => 'required',
            'image' => 'required|string|max:255',
        ]);

        if (!Auth::check()) {
            return redirect()->back()->with('error', 'You must be logged in to add to wishlist.');
        }

        $userId = Auth::id();

        $exists = Wishlist::where('user_id', $userId)
            ->where('pid', $request->pid)
            ->first();

        if ($exists) {
            return redirect()->back()->with('message', 'Product already in wishlist!');
        }

        Wishlist::create([
            'user_id' => $userId,
            'pid'     => $request->pid,
            'name'    => $request->name,
            'price'   => $request->price,
            'image'   => $request->image,
        ]);

        return redirect()->route('pro-wishlist.index')->with('message', 'Item added to wishlist!');
    }

    // Delete single item
    public function destroy($id)
    {
        Wishlist::where('id', $id)->where('user_id', Auth::id())->delete();
        return redirect()->route('pro-wishlist.index')->with('message', 'Item removed from wishlist!');
    }

    // Delete all items
    public function clear()
    {
        Wishlist::where('user_id', Auth::id())->delete();
        return redirect()->route('pro-wishlist.index')->with('message', 'Wishlist cleared!');
    }
}
