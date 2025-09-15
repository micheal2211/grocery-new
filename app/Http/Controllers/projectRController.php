<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserForm;
use Illuminate\Support\Facades\Hash;


class ProjectRController extends Controller
{
    public function showSignupForm()
    {
        return view('ProjectR'); // Ensure the file is named projectr.blade.php
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user_form,email',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'image' => 'required|image|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploaded_img'), $imageName);

        Userform::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'confirm_password' => Hash::make($request->password),
            'image' => $imageName,
        ]);

        return redirect()->route('pro-login.submit')->with('message', 'Registered successfully!');
    }
}



