<!DOCTYPE html>
<html>
<head>
    <title>Stripe Payment</title>
</head>
<body>
    @if(session('success_message'))
        <p>{{ session('success_message') }}</p>
    @endif
    @if(session('error_message'))
        <p style="color:red;">{{ session('error_message') }}</p>
    @endif

    <form action="{{ route('process.payment') }}" method="POST">
        @csrf
        <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="{{ config('services.stripe.key') }}"
            data-amount="{{ ($cart_grand_total ?? 0) * 100 }}" {{-- convert to cents --}}
            data-name="My Store"
            data-description="Order Payment"
            data-currency="usd">
        </script>
    </form>
</body>
</html>
