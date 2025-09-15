<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Act; // Use your custom model
use Illuminate\Support\Facades\Hash;
use App\model\workers;
use App\model\projectR;


class workersController extends Controller
{
    // Show the signup form
    public function showSignupForm()
    {
        return view('workers');
    }

    // Handle registration
    public function register(Request $request)
    {
        // Validate the request
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:acts,email', // Updated table name for validation
            'password' => 'required|string|min:6|confirmed',
            'country' => 'required|string|max:255',
            'sex' => 'required|string|max:255',
            'age' => 'required|string|max:255',

        ]);

        // Create a new record in acts table
        workers::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'country' => 'required|string|max:255',
            'sex' => 'required|string|max:255',
            'age' => 'required|string|max:255',
        ]);

        return redirect()->route('workers.worksuc')->with('message', 'Registration successful!');
    }
}
class AuthController extends Controller
{
    // Show the signup form
    public function showSignupForm()
    {
        return view('act');
    }

    // Handle registration
    public function register(Request $request)
    {
        // Validate the request
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:acts,email', // Updated table name for validation
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create a new record in acts table
        Act::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
        ]);

        return redirect()->route('act.success')->with('message', 'Registration successful!');
    }
    public function signin(Request $request)
{
    $credentials = $request->only('email','password');

    if(Auth::attempt($credentials)) {
        return redirect()->intended('second');
    }

    return back()->withErrors([
        'email'=>'invalid login credentials.',
    ]);
}

    
}



class projectRController extends Controller
{
    // Show the signup form
    public function showSignupForm()
    {
        return view('projectR');
    }

    // Handle registration
    public function register(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:acts,email', // Updated table name for validation
            'password' => 'required|string|min:6|confirmed',
            'c_password' => 'required|string|min:6|confirmed',
            'image' => 'required|string|max:255',
        ]);

        // Create a new record in acts table
        ProjectR::create([
            'name' => $request->name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'c_password'   => Hash::make($request->password),
            'image'   => $request->image
        ]);

        return redirect()->route('projectR.success')->with('message', 'Registration successful!');
    }
    public function signin(Request $request)
{
    $credentials = $request->only('email','password');

    if(Auth::attempt($credentials)) {
        return redirect()->intended('second');
    }

    return back()->withErrors([
        'email'=>'invalid login credentials.',
    ]);
}

    

}