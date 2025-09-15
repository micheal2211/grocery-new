<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workers; // Match your model name (uppercase W)
use Illuminate\Support\Facades\Hash;

class WorkersController extends Controller
{
    public function showSignupForm()
    {
        return view('workers');  // Make sure the view name is correct
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:workers,email',
            'password'   => 'required|string|min:6',
            'country'    => 'required|string|max:255',
            'sex'        => 'required|string|max:255',
            'age'        => 'required|integer|min:0',
        ]);

        Workers::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'country'    => $request->country,
            'sex'        => $request->sex,
            'age'        => $request->age,
        ]);

        return redirect()->route('workers.worksuc')->with('message', 'Registration successful!');
    }
}
