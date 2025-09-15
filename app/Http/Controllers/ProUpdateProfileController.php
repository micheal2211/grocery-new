<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserForm; // Match your model name (uppercase W)
use Illuminate\Support\Facades\Hash;

class ProUpdateProfileController extends Controller
{
    public function showSignupForm()
    {
        return view('pro-update-profile');  // Make sure the view name is correct
    }

    public function register(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'email'      => 'required|email|unique:workers,email',
            'image'    => 'required|string|max:255',
            'old_password'   => 'required|string|min:6',
            'new_password'   => 'required|string|min:6',
            'c_password'   => 'required|string|min:6',
        ]);

        ProUpdateProfile::create([
            'user_name' => $request->user_name,
            'email'      => $request->email,
            'image'    => $request->image,
            'old_password'  => Hash::make($request->old_password),
            'new_password'  => Hash::make($request->new_password),
            'c_password'    => Hash::make($request->c_password),

        ]);

        return redirect()->route('pro-update-profile.pro-suceess')->with('message', 'Registration successful!');
    }
}


    
    
       
    

