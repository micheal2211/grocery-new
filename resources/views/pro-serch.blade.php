<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
    <link rel="stylesheet" href="{{ asset('css/projectR.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                    <i class="fas fa-chart-bar"></i>Contact
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
            <a href="#" class="nav-link">John Doe</a>
        </div>
        
        <button class="hamburger" id="hamburger-btn">
            <i class="fas fa-bars"></i>
        </button>
    </nav>
@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/projectR.css') }}">

<section class="search-form">
    <form action="{{ route('pro-serch') }}" method="GET">
        <input type="text" class="box" name="search_box" placeholder="search products..." value="{{ $query ?? '' }}">
        <input type="submit" name="search_btn" value="search" class="btn">
    </form>
</section>

<section class="products">
    <div class="box-container">
        @if($products->count() > 0)
            @foreach($products as $product)
                <div class="box">
                    <div class="price">${{ $product->price }}/-</div>
                    <a href="{{ url('view_page/'.$product->idNo) }}" class="fas fa-eye"></a>
                    <img src="{{ asset('uploaded_img/'.$product->image) }}" alt="">
                    <div class="name">{{ $product->name }}</div>

                    {{-- Wishlist Form --}}
                    <form action="{{ route('wishlist.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="pid" value="{{ $product->idNo }}">
                        <input type="hidden" name="p_name" value="{{ $product->name }}">
                        <input type="hidden" name="p_price" value="{{ $product->price }}">
                        <input type="hidden" name="p_image" value="{{ $product->image }}">
                        <input type="number" min="1" value="1" name="p_qty" class="qty">
                        <button type="submit" class="option-btn" name="add_to_wishlist">Add to Wishlist</button>
                    </form>

                    {{-- Cart Form --}}
                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="pid" value="{{ $product->idNo }}">
                        <input type="hidden" name="p_name" value="{{ $product->name }}">
                        <input type="hidden" name="p_price" value="{{ $product->price }}">
                        <input type="hidden" name="p_image" value="{{ $product->image }}">
                        <input type="number" min="1" value="1" name="p_qty" class="qty">
                        <button type="submit" class="option-btn" name="add_to_cart">Add to Cart</button>
                    </form>
                </div>
            @endforeach
        @else
            <p class="empty">no products found!</p>
        @endif
    </div>
</section>
@endsection



</body>
</html>
