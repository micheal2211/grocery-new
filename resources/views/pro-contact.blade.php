<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="{{ asset('css/projectR.css') }}">
    <style>
        /* Container */
/* ==== CART WRAPPER ==== */
.cart-wrapper {
  max-width: 1100px;
  margin: 30px auto;
  padding: 25px;
  background: #f9f9f9;
  border-radius: 8px;
  font-family: Arial, Helvetica, sans-serif;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
}

/* ==== HEADINGS ==== */
.cart-wrapper h2 {
  color: #333;
  margin-bottom: 15px;
}

/* ==== CART ITEMS ==== */
.cart-item {
  margin: 6px 0;
  padding: 8px 12px;
  background: #fff;
  border: 1px solid #ddd;
  border-radius: 4px;
  font-size: 0.95rem;
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
}

.empty-cart {
  color: #c00;
  font-style: italic;
  margin: 10px 0;
}

/* ==== GRAND TOTAL ==== */
.grand-total {
  font-weight: bold;
  margin-top: 15px;
  font-size: 1.2em;
  color: #28a745;
}

/* ==== FORM ==== */
.order-form {
  margin-top: 25px;
}

.form-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
}

/* Input & select */
.form-grid input,
.form-grid select {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 0.95rem;
  box-sizing: border-box;
  background: #fff;
  transition: border-color 0.2s ease;
}
.form-grid input:focus,
.form-grid select:focus {
  border-color: #28a745;
  outline: none;
}

/* ==== BUTTON ==== */
.order-form button {
  margin-top: 20px;
  padding: 12px 24px;
  background: #28a745;
  color: #fff;
  font-size: 1em;
  border: none;
  cursor: pointer;
  border-radius: 4px;
  transition: background 0.3s ease;
}
.order-form button:hover:not([disabled]) {
  background: #218838;
}
.order-form button:disabled {
  opacity: 0.6;
  cursor: not-allowed;
}

/* ==== RESPONSIVE ==== */
@media (max-width: 600px) {
  .cart-wrapper {
    padding: 15px;
    margin: 15px;
  }
  .cart-item {
    flex-direction: column;
    align-items: flex-start;
  }
  .order-form button {
    width: 100%;
    text-align: center;
  }


  
}



    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <a href="#" class="navbar-brand">
            <i class="fas fa-store"></i>GroceryMate
        </a>
        
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="pro-dashboard" class="nav-link active">
                    <i class="fas fa-home"></i>Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="pro-product" class="nav-link">
                    <i class="fas fa-box"></i>Products
                </a>
            </li>
            <li class="nav-item">
                <a href="orders" class="nav-link">
                    <i class="fas fa-shopping-cart"></i>Orders
                    <span class="badge">5</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="pro-contact" class="nav-link">
                    <i class="fas fa-chart-bar"></i>Contacts
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-cog"></i>Settings
                </a>
            </li>
        </ul>
        
        <div class="user-profile">
            <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=200&q=80" alt="User" class="user-img">
            <a href="pro-user" class="nav-link">John Doe</a>
        </div>
        
        <button class="hamburger" id="hamburger-btn">
            <i class="fas fa-bars"></i>
        </button>
    </nav>
@extends('layouts.app')

@section('content')
<div class="cart-wrapper">
    <h2>Your Cart</h2>

    @forelse ($cart as $item)
        <p class="cart-item">
            {{ $item->name }}
            <span>({{ $item->quantity }} × ${{ number_format($item->price, 2) }})</span>
            <span>= ${{ number_format($item->price * $item->quantity, 2) }}</span>
        </p>
    @empty
        <p class="empty-cart">Your cart is empty!</p>
    @endforelse

    <p class="grand-total">Grand Total: ${{ number_format($grandTotal, 2) }}/-</p>

    <h2 class="mt-8 mb-4">Place Your Order</h2>
    <form method="POST" action="{{ route('pro-contact.submit') }}" class="order-form">
        @csrf
        <div class="form-grid">
            <input type="text" name="name" placeholder="Your name" required>
            <input type="text" name="number" placeholder="Your number" required>
            <input type="email" name="email" placeholder="Your email" required>
            <select name="method" required>
                <option value="cash on delivery">Cash on Delivery</option>
                <option value="credit card">Credit Card</option>
                <option value="paytm">Paytm</option>
                <option value="paypal">Paypal</option>
            </select>
            <input type="text" name="flat" placeholder="Flat number" required>
            <input type="text" name="street" placeholder="Street name" required>
            <input type="text" name="city" placeholder="City" required>
            <input type="text" name="state" placeholder="State" required>
            <input type="text" name="country" placeholder="Country" required>
            <input type="text" name="pin_code" placeholder="Pin code" required>
        </div>
        <button {{ $grandTotal == 0 ? 'disabled' : '' }}>Place Order Now</button>
    </form>
</div>
@endsection



</body>
</html>