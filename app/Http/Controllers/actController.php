<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Act;
use Illuminate\Support\Facades\Hash;

class ActController extends Controller
{
    // Show the form
    public function create()
    {
        return view('act');
    }

    // Handle form submission
    public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|min:6|unique:register,email', // Ensure email is unique in the 'register' table
            'password' => 'required|min:6',
        ]);

        // Save the form data to the 'register' table
        $act = Act::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect to success page with a success message
        return redirect()->route('act.success')->with('message', 'Form submitted successfully!');
    }
}


