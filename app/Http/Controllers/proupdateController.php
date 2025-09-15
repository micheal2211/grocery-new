<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // ✅ Correct model name
use Illuminate\Support\Facades\Hash;

class ProupdateController extends Controller
{
    // ✅ Method to show the update form
    public function showSignupForm()
    {
        return view('pro-update'); // make sure pro-update.blade.php exists
    }

    // ✅ Method to edit a product
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('pro-update', compact('product'));
    }

    // ✅ Method to register a new product/user
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:products,email',
            'password'   => 'required|string|min:6',
            'country'    => 'required|string|max:255',
            'sex'        => 'required|string|max:255',
            'age'        => 'required|integer|min:0',
        ]);

        Product::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'country'    => $request->country,
            'sex'        => $request->sex,
            'age'        => $request->age,
        ]);

        return redirect()->route('pro-update.pro-success')
                         ->with('message', 'Registration successful!');
    }
}

