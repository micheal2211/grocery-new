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
            <a href="pro-user" class="nav-link">John Doe</a>
        </div>
        
        <button class="hamburger" id="hamburger-btn">
            <i class="fas fa-bars"></i>
        </button>
    </nav>
@extends('layouts.app')

@section('title', 'Your Orders')

@section('content')
<div class="placed-orders">
    <h1 class="title">Your Orders</h1>

    @if(session('error'))
        <div class="message error">{{ session('error') }}</div>
    @endif
    @if(session('success'))
        <div class="message success">{{ session('success') }}</div>
    @endif

    <div class="box-container">
        @auth
            @if($orders && $orders->count() > 0)
                @foreach($orders as $order)
                    <div class="box">
                        <p><strong>Order ID:</strong> {{ $order->id ?? 'N/A' }}</p>
                        <p><strong>Placed on:</strong> {{ $order->placed_on ?? 'N/A' }}</p>
                        <p><strong>Name:</strong> {{ $order->name ?? 'N/A' }}</p>
                        <p><strong>Email:</strong> {{ $order->email ?? 'N/A' }}</p>
                        <p><strong>Number:</strong> {{ $order->number ?? 'N/A' }}</p>
                        <p><strong>Address:</strong> {{ $order->address ?? 'N/A' }}</p>
                        <p><strong>Total Products:</strong> {{ $order->total_products ?? 'N/A' }}</p>
                        <p><strong>Total Price:</strong> ${{ number_format($order->total_price ?? 0, 2) }}</p>
                        <p><strong>Payment Method:</strong> {{ $order->method ?? 'N/A' }}</p>
                        <p><strong>Payment Status:</strong> 
                            <span class="status-badge 
                                @if($order->payment_status === 'paid') status-success 
                                @elseif($order->payment_status === 'pending') status-warning 
                                @elseif($order->payment_status === 'failed') status-danger 
                                @else status-secondary @endif">
                                {{ ucfirst($order->payment_status ?? 'N/A') }}
                            </span>
                        </p>
                        <div class="flex-btn">
                            <a href="{{ route('order.delete', $order->id) }}" 
                               class="delete-btn" 
                               onclick="return confirm('Delete this order?');">Delete</a>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="empty">
                    No orders placed yet! 
                    <a href="{{ route('pro-shop') }}" class="btn">Shop Now</a>
                </p>
            @endif
        @else
            <p class="empty">
                Please <a href="{{ route('pro-login') }}" class="btn">Login</a> to view orders.
            </p>
        @endauth
    </div>
</div>

<style>
    .placed-orders { max-width: 1100px; margin: 40px auto; padding: 20px; }
    .placed-orders .title { font-size: 2rem; font-weight: 700; text-align: center; margin-bottom: 30px; color: #333; }
    .message { padding: 12px 16px; margin-bottom: 20px; border-radius: 8px; font-size: 14px; font-weight: 500; }
    .message.error { background: #ffe3e3; border: 1px solid #ff6b6b; color: #c0392b; }
    .message.success { background: #e3ffe7; border: 1px solid #2ecc71; color: #27ae60; }
    .box-container { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 20px; }
    .box { background: #fff; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.08); padding: 20px; transition: 0.2s; }
    .box:hover { transform: translateY(-4px); box-shadow: 0 6px 14px rgba(0,0,0,0.12); }
    .box p { margin: 8px 0; font-size: 15px; color: #555; }
    .box p strong { color: #222; font-weight: 600; }
    .delete-btn { display: inline-block; background: #e74c3c; color: #fff; padding: 8px 14px; border-radius: 6px; text-decoration: none; }
    .delete-btn:hover { background: #c0392b; }
    .empty { text-align: center; font-size: 16px; margin-top: 40px; color: #777; }
    .empty .btn { background: #3498db; color: #fff; padding: 8px 16px; border-radius: 6px; text-decoration: none; }
    .status-badge { padding: 4px 10px; border-radius: 20px; font-size: 13px; font-weight: 600; }
    .status-success { background: #eafaf1; color: #27ae60; }
    .status-danger { background: #fdecea; color: #e74c3c; }
    .status-warning { background: #fff6e5; color: #f39c12; }
    .status-secondary { background: #f2f2f2; color: #777; }
</style>
@endsection
