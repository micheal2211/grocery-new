<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/project.css') }}">
    <link rel="stylesheet" href="{{ asset('css/projectR.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
/* General Reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

body {
  background: #f7f7f7;
  color: #333;
  line-height: 1.6;
}

/* Alerts */
.alert {
  max-width: 900px;
  margin: 10px auto;
  padding: 12px 15px;
  border-radius: 6px;
  font-size: 14px;
  font-weight: 500;
}
.alert.success {
  background: #d4edda;
  color: #155724;
  border-left: 5px solid #28a745;
}
.alert.warning {
  background: #fff3cd;
  color: #856404;
  border-left: 5px solid #ffc107;
}
.alert.error {
  background: #f8d7da;
  color: #721c24;
  border-left: 5px solid #dc3545;
}

/* Shopping Cart Section */
.shopping-cart {
  max-width: 1200px;
  margin: 30px auto;
  padding: 20px;
}

.shopping-cart .title {
  text-align: center;
  font-size: 28px;
  margin-bottom: 25px;
  color: #444;
  font-weight: 600;
  text-transform: uppercase;
}

.box-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 20px;
}

/* Each Cart Item */
.box {
  background: #fff;
  border-radius: 10px;
  padding: 15px;
  position: relative;
  box-shadow: 0 3px 6px rgba(0,0,0,0.1);
  transition: 0.3s;
}

.box:hover {
  transform: translateY(-3px);
  box-shadow: 0 6px 12px rgba(0,0,0,0.15);
}

.box img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  border-radius: 8px;
  margin-bottom: 12px;
}

.box .name {
  font-size: 18px;
  font-weight: 600;
  margin: 5px 0;
  color: #333;
}

.box .price {
  font-size: 16px;
  color: #28a745;
  margin-bottom: 10px;
  font-weight: 500;
}

.box .sub-total {
  margin-top: 10px;
  font-size: 14px;
  color: #555;
}
.box .sub-total span {
  font-weight: 600;
  color: #e63946;
}

/* Buttons */
.flex-btn {
  display: flex;
  align-items: center;
  gap: 10px;
}

.qty {
  width: 60px;
  padding: 6px;
  border: 1px solid #ddd;
  border-radius: 5px;
  text-align: center;
}

.option-btn {
  padding: 6px 10px;
  background: #ffc107;
  color: #333;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  font-size: 13px;
  transition: 0.3s;
}
.option-btn:hover {
  background: #e0a800;
  color: #fff;
}

/* Icons */
.box .fa-times,
.box .fa-eye {
  position: absolute;
  top: 10px;
  font-size: 16px;
  color: #555;
  background: #eee;
  padding: 5px 7px;
  border-radius: 50%;
  transition: 0.3s;
}
.box .fa-times {
  right: 10px;
}
.box .fa-eye {
  right: 40px;
}

.box .fa-times:hover {
  background: #dc3545;
  color: #fff;
}
.box .fa-eye:hover {
  background: #28a745;
  color: #fff;
}

/* Empty Cart */
.empty {
  text-align: center;
  font-size: 18px;
  padding: 20px;
  background: #fff3cd;
  border-radius: 8px;
  color: #856404;
  grid-column: 1/-1;
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
                <a href="#" class="nav-link active">
                    <i class="fas fa-home"></i>Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-box"></i>Products
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-shopping-cart"></i>Orders
                    <span class="badge">5</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-chart-bar"></i>Analytics
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
            <a href="pro-update" class="nav-link">John Doe</a>
        </div>
        
        <button class="hamburger" id="hamburger-btn">
            <i class="fas fa-bars"></i>
        </button>
    </nav>
@extends('layouts.app')

@section('content')

@if(session('success'))
    <div class="alert success">{{ session('success') }}</div>
@endif

@if(session('message'))
    <div class="alert warning">{{ session('message') }}</div>
@endif

@if(session('error'))
    <div class="alert error">{{ session('error') }}</div>
@endif

<section class="shopping-cart">
    <h1 class="title">Products in Cart</h1>
    <div class="box-container">
      @php $grand_total = 0; @endphp

@forelse($cart_items as $item)
    @php 
        $sub_total = $item->price * $item->quantity;
        $grand_total += $sub_total;
    @endphp


    <form action="{{ url('update-cart') }}" method="POST" class="box">
        @csrf

        <a href="{{ url('remove-from-cart/' . $item->id) }}" class="fas fa-times" onclick="return confirm('Delete this item from cart?');"></a>
        <a href="{{ url('pro-view?pid=' . $item->pid) }}" class="fas fa-eye"></a>

        <img src="{{ asset('uploaded_img/' . $item->image) }}" alt="{{ $item->name }}">
        <div class="name">{{ $item->name }}</div>
        <div class="price">${{ number_format($item->price, 2) }}/-</div>

        <input type="hidden" name="cart_id" value="{{ $item->id }}">
        <input type="hidden" name="p_name" value="{{ $item->name }}">
        <input type="hidden" name="p_price" value="{{ $item->price }}">

        <div class="flex-btn">
            <input type="number" min="1" name="quantity" value="{{ $item->quantity }}" class="qty" required>
            <input type="submit" value="Update Quantity" class="option-btn">
        </div>

        <div class="sub-total">Sub Total: <span>${{ number_format($sub_total, 2) }}/-</span></div>
    </form>
@empty
    <p class="empty">Your cart is empty.</p>
@endforelse




</body>
</html>