<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Show the contact / signup form.
     */
    public function showSignupForm()
    {
        // always give the view a $cart collection and $grandTotal number
        $cart       = collect(); // empty collection by default
        $grandTotal = 0;

        if (Auth::check()) {
            $cart = DB::table('carts')
                ->where('user_id', Auth::id())
                ->get();

            $grandTotal = $cart->sum(function ($row) {
                return $row->price * $row->quantity;
            });
        }

        return view('pro-contact', compact('cart', 'grandTotal'));
    }

    /**
     * Handle contact form submission.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|unique:contact,email',
            'number'  => 'required|string|max:255',
            'message' => 'required|string|max:255',
        ]);

        Contact::create([
            'idNo'    => uniqid(),
            'user_id' => Auth::id() ?? 'guest',
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'number'  => $validated['number'],
            'message' => $validated['message'],
        ]);

        return redirect()
            ->route('pro-contact.success')
            ->with('message', 'Registration successful!');
    }

    /**
     * List all contact messages.
     */
    public function index()
    {
        $messages = Contact::all();

        // also send an empty cart so Blade never errors
        $cart       = collect();
        $grandTotal = 0;

        return view('pro-contact', compact('messages', 'cart', 'grandTotal'));
    }

    /**
     * Delete a contact message by its idNo.
     */
    public function destroy($idNo)
    {
        $message = Contact::where('idNo', $idNo)->first();

        if ($message) {
            $message->delete();
            return back()->with('success', 'Message deleted successfully.');
        }

        return back()->with('error', 'Message not found.');
    }
}
