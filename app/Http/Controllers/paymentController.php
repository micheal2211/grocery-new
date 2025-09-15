<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as CheckoutSession;

class PaymentController extends Controller
{
    public function stripeCheckout(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $checkout_session = CheckoutSession::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Cart Purchase',
                        ],
                        'unit_amount' => $request->total_price * 100, // cents
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('stripe.success'),
                'cancel_url' => route('stripe.cancel'),
            ]);

            return response()->json(['id' => $checkout_session->id]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function success()
    {
        return view('payment.success')->with('success_message', 'Payment successful!');
    }

    public function cancel()
    {
        return view('payment.cancel')->with('error_message', 'Payment was cancelled.');
    }
}
