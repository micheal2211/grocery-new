```blade
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
                        <p>Order ID: <span>{{ $order->id ?? 'N/A' }}</span></p>
                        <p>Date: <span>{{ $order->placed_on ? \Carbon\Carbon::parse($order->placed_on)->format('M d, Y H:i') : 'N/A' }}</span></p>
                        <p>Name: <span>{{ $order->name ?? 'N/A' }}</span></p>
                        <p>Phone: <span>{{ $order->number ?? 'N/A' }}</span></p>
                        <p>Email: <span>{{ $order->email ?? 'N/A' }}</span></p>
                        <p>Address: <span>{{ $order->address ?? 'N/A' }}</span></p>
                        <p>Method: <span>{{ $order->method ? ucfirst($order->method) : 'N/A' }}</span></p>
                        <p>Items: <span>{{ $order->total_products ?: 'N/A' }}</span></p>
                        <p>Total: <span>${{ isset($order->total_price) ? number_format($order->total_price, 2) : '0.00' }}</span></p>
                        <p>Status: 
                            <span class="{{ $statusColors[$order->payment_status] ?? 'text-secondary' }}">
                                {{ ucfirst($order->payment_status ?? 'N/A') }}
                            </span>
                        </p>
                    </div>
                @endforeach
            @else
                <p class="empty">No orders placed yet! <a href="{{ route('shop') }}" class="btn btn-primary">Shop now</a></p>
            @endif
        @else
            <p class="empty">Please <a href="{{ route('login') }}" class="btn btn-primary">login</a> to view your orders</p>
        @endauth
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Base Styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background-color: #f8f9fa;
        color: #333;
        line-height: 1.6;
    }

    .placed-orders {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .title { 
        text-align: center; 
        margin: 30px 0;
        color: #333;
        font-size: 2rem;
        position: relative;
        padding-bottom: 15px;
    }

    .title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, #28a745, #218838);
        border-radius: 2px;
    }

    /* Messages */
    .message {
        padding: 15px;
        margin-bottom: 25px;
        border-radius: 8px;
        font-weight: 500;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .message.success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .message.error {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    /* Orders Container */
    .box-container { 
        display: flex; 
        flex-wrap: wrap; 
        gap: 20px; 
        padding: 20px;
    }

    .box { 
        border: 1px solid #ddd; 
        padding: 20px; 
        border-radius: 8px;
        flex: 1 1 300px;
        background: #f9f9f9;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        transition: transform 0.2s;
    }

    .box:hover {
        transform: translateY(-5px);
    }

    .box p {
        margin: 10px 0;
        line-height: 1.6;
        color: #555;
        display: flex;
        justify-content: space-between;
    }

    .box p span {
        font-weight: 600;
        color: #333;
        text-align: right;
        flex: 1;
    }

    /* Status Colors */
    .text-danger { 
        color: #dc3545; 
    }

    .text-success { 
        color: #28a745; 
    }

    .text-warning { 
        color: #ffc107; 
    }

    .text-secondary { 
        color: #6c757d; 
    }

    /* Buttons */
    .btn-primary {
        display: inline-block;
        padding: 10px 20px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 600;
        background: linear-gradient(90deg, #28a745, #218838);
        color: white;
        transition: all 0.3s;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        background: linear-gradient(90deg, #218838, #28a745);
        text-decoration: none;
    }

    /* Empty State */
    .empty { 
        color: #dc3545; 
        font-weight: bold;
        text-align: center;
        width: 100%;
        padding: 20px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    /* Links */
    a {
        color: #28a745;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .title {
            font-size: 1.8rem;
        }

        .box-container {
            flex-direction: column;
            padding: 15px;
        }

        .box {
            flex: 1 1 100%;
        }
    }

    @media (max-width: 576px) {
        .placed-orders {
            padding: 15px;
        }

        .title {
            font-size: 1.6rem;
            margin: 20px 0;
        }

        .box p {
            flex-direction: column;
        }

        .box p span {
            text-align: left;
            margin-top: 5px;
        }

        .btn-primary {
            padding: 8px 16px;
            font-size: 0.9rem;
        }
    }

    /* Animation for order boxes */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .box {
        animation: fadeIn 0.5s ease-out;
    }

    .box:nth-child(2) { animation-delay: 0.1s; }
    .box:nth-child(3) { animation-delay: 0.2s; }
    .box:nth-child(4) { animation-delay: 0.3s; }
    .box:nth-child(5) { animation-delay: 0.4s; }
</style>
@endsection
```