@extends('layouts.app')

@section('content')
<div class="success-message">
    <h1 class="title">Order Placed Successfully!</h1>
    @if (session('success'))
        <div class="message success">{{ session('success') }}</div>
    @endif
    <p>Thank you for your order. You can view your orders <a href="{{ route('orders') }}">here</a>.</p>
    <a href="{{ route('pro-shop') }}" class="btn btn-primary">Continue Shopping</a>
</div>
@endsection

@section('styles')
<style>
    .success-message {
        text-align: center;
        padding: 50px;
        max-width: 600px;
        margin: 0 auto;
        background-color: #f8fafc;
    }
    .title {
        color: #1a202c;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 20px;
    }
    .message.success {
        color: #155724;
        background-color: #d4edda;
        border: 1px solid #c3e6cb;
        padding: 12px;
        border-radius: 6px;
        margin-bottom: 20px;
    }
    .btn-primary {
        background-color: #28a745;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 6px;
        font-weight: 500;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }
    .btn-primary:hover {
        background-color: #218838;
        transform: translateY(-2px);
    }
    @media (max-width: 768px) {
        .title { font-size: 2rem; }
        .btn-primary { padding: 8px 16px; font-size: 0.9rem; }
    }
</style>
@endsection