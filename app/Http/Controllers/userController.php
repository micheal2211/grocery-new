<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectR; // Match your model name (uppercase W)
use Illuminate\Support\Facades\Hash;

class ProjectRController extends Controller
{
    public function showSignupForm()
    {
        return view('projectR');  // Make sure the view name is correct
    }

    public function register(Request $request)
    {
        $request->validate([
            'idno' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email'      => 'required|email|unique:workers,email',
            'password'   => 'required|string|min:6',
            'c password'    => 'required|string|max:255',
            'image'    => 'required|string|max:255',

        ]);

        $imagePath = null;
        if ($request->hasFill('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
        }

        users::create([
            'idno' => $request->idno,
            'name' => $request->first_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'c_password'    => Hash::make($request->password),
            'image'        => $request->image,
        ]);

        return redirect()->route('projectR.pro-success')->with('message', 'Registration successful!');
    }
}
