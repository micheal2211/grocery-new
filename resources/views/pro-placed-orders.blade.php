@extends('layouts.app')

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
                        <p><strong>Order ID:</strong> <span>{{ $order->id ?? 'N/A' }}</span></p>
                        <p><strong>Placed on:</strong> <span>{{ $order->placed_on ? \Carbon\Carbon::parse($order->placed_on)->format('M d, Y H:i') : 'N/A' }}</span></p>
                        <p><strong>Name:</strong> <span>{{ $order->name ?? 'N/A' }}</span></p>
                        <p><strong>Email:</strong> <span>{{ $order->email ?? 'N/A' }}</span></p>
                        <p><strong>Number:</strong> <span>{{ $order->number ?? 'N/A' }}</span></p>
                        <p><strong>Address:</strong> <span>{{ $order->address ?? 'N/A' }}</span></p>
                        <p><strong>Total Products:</strong> <span>{{ $order->total_products ?? 'N/A' }}</span></p>
                        <p><strong>Total Price:</strong> <span>${{ isset($order->total_price) ? number_format($order->total_price, 2) : '0.00' }}</span></p>
                        <p><strong>Payment Method:</strong> <span>{{ $order->method ? ucfirst($order->method) : 'N/A' }}</span></p>
                        <p><strong>Payment Status:</strong> 
                            <span class="{{ $statusColors[$order->payment_status] ?? 'text-secondary' }}">
                                {{ ucfirst($order->payment_status ?? 'N/A') }}
                            </span>
                        </p>
                        <form action="{{ route('orders.update', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                            <select name="update_payment" class="drop-down" required>
                                <option value="" disabled selected>{{ ucfirst($order->payment_status ?? 'Select Status') }}</option>
                                <option value="pending">Pending</option>
                                <option value="completed">Completed</option>
                            </select>
                            <input type="submit" name="update_order" class="option-btn" value="Update">
                        </form>
                        <form action="{{ route('orders.delete', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                        </form>
                    </div>
                @endforeach
            @else
                <p class="empty">No orders placed yet! <a href="{{ route('pro-shop') }}" class="btn btn-primary">Shop Now</a></p>
            @endif
        @else
            <p class="empty">Please <a href="{{ route('pro-login') }}" class="btn btn-primary">Login to View Orders</a></p>
        @endauth
    </div>
    <footer class="footer">
        <p>© 2025 My Store</p>
    </footer>
</div>
@endsection

@section('styles')
<style>
    /* ===== Layout ===== */
    .placed-orders {
        max-width: 1200px;
        margin: 0 auto;
        padding: 30px 20px;
        background-color: #f9fafb;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    /* ===== Title ===== */
    .title {
        text-align: center;
        margin: 40px 0 30px;
        color: #1a202c;
        font-size: 2.5rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
    }

    /* ===== Flash Messages ===== */
    .message {
        max-width: 650px;
        margin: 0 auto 20px;
        padding: 14px 18px;
        border-radius: 8px;
        font-weight: 500;
        font-size: 1rem;
        text-align: center;
    }
    .message.error {
        color: #b91c1c;
        background-color: #fee2e2;
        border: 1px solid #fecaca;
    }
    .message.success {
        color: #166534;
        background-color: #dcfce7;
        border: 1px solid #bbf7d0;
    }

    /* ===== Order Grid ===== */
    .box-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(330px, 1fr));
        gap: 24px;
        padding: 20px;
        flex-grow: 1;
    }

    /* ===== Order Card ===== */
    .box {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }
    .box:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.08);
    }
    .box p {
        margin: 10px 0;
        line-height: 1.6;
        color: #374151;
        font-size: 0.95rem;
    }
    .box p strong {
        font-weight: 600;
        color: #111827;
        display: inline-block;
        min-width: 120px;
    }

    /* ===== Empty State ===== */
    .empty {
        color: #dc2626;
        font-weight: 600;
        text-align: center;
        padding: 25px;
        font-size: 1.1rem;
    }

    /* ===== Buttons ===== */
    .btn-primary, .option-btn, .delete-btn {
        display: inline-block;
        padding: 10px 22px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.95rem;
        transition: all 0.25s ease;
        cursor: pointer;
        border: none;
    }
    .btn-primary {
        background-color: #16a34a;
        color: #fff;
    }
    .btn-primary:hover {
        background-color: #15803d;
        transform: translateY(-2px);
    }
    .option-btn {
        background-color: #2563eb;
        color: #fff;
    }
    .option-btn:hover {
        background-color: #1e40af;
        transform: translateY(-2px);
    }
    .delete-btn {
        background-color: #dc2626;
        color: #fff;
    }
    .delete-btn:hover {
        background-color: #b91c1c;
        transform: translateY(-2px);
    }

    /* ===== Dropdown ===== */
    .drop-down {
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #d1d5db;
        margin: 12px 0;
        font-size: 0.95rem;
        width: 100%;
    }

    /* ===== Status Colors ===== */
    .text-danger { color: #dc2626; }
    .text-success { color: #16a34a; }
    .text-secondary { color: #6b7280; }

    /* ===== Footer ===== */
    .footer {
        text-align: center;
        padding: 20px 0;
        color: #6b7280;
        font-size: 0.9rem;
        border-top: 1px solid #e5e7eb;
        margin-top: auto;
    }

    /* ===== Responsive ===== */
    @media (max-width: 768px) {
        .title { font-size: 2rem; }
        .box-container { grid-template-columns: 1fr; padding: 10px; }
        .box { padding: 18px; }
        .btn-primary, .option-btn, .delete-btn {
            padding: 9px 18px;
            font-size: 0.9rem;
        }
    }
</style>




@endsection