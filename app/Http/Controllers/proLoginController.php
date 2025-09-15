<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class proLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('pro-login'); // resources/views/pro-login.blade.php
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            session_start(); // Start PHP session for raw PHP scripts
            $user_id = Auth::user()->id;
            if (!$user_id) {
                return back()->withErrors(['email' => 'User ID is missing in the database. Contact support.']);
            }
            $_SESSION['user_id'] = $user_id;

            return redirect()->route('pro-shop')->with('message', 'Login successful!');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        session_start();
        $_SESSION = [];
        session_destroy();

        return redirect()->route('pro-login.form');
    }
}