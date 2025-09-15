<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/projectR.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
    /* ===== Wishlist Section ===== */
.wishlist {
    max-width: 1200px;
    margin: 40px auto;
    padding: 25px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.08);
}

.wishlist .title {
    font-size: 28px;
    font-weight: 600;
    text-align: center;
    margin-bottom: 30px;
    color: #333;
}

/* ===== Wishlist Grid ===== */
.wishlist .box-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 20px;
}

/* ===== Individual Wishlist Box ===== */
.wishlist .box {
    background: #fafafa;
    border-radius: 12px;
    padding: 20px;
    text-align: center;
    position: relative;
    border: 1px solid #eee;
    transition: all 0.3s ease;
}

.wishlist .box:hover {
    box-shadow: 0 6px 18px rgba(0,0,0,0.1);
    transform: translateY(-4px);
}

/* ===== Product Image ===== */
.wishlist .box img {
    width: 100%;
    max-width: 160px;
    height: 160px;
    object-fit: cover;
    margin: 10px auto 15px;
    border-radius: 10px;
    transition: 0.3s ease;
}
.wishlist .box img:hover {
    transform: scale(1.05);
}

/* ===== Product Info ===== */
.wishlist .box .name {
    font-size: 16px;
    font-weight: 600;
    margin: 8px 0;
    color: #444;
}

.wishlist .box .price {
    font-size: 15px;
    color: #27ae60;
    font-weight: 500;
    margin-bottom: 12px;
}

/* ===== Delete & Preview Icons ===== */
.wishlist .box .fa-times,
.wishlist .box .fa-eye {
    position: absolute;
    top: 12px;
    font-size: 18px;
    width: 34px;
    height: 34px;
    border-radius: 50%;
    line-height: 34px;
    text-align: center;
    background: #eee;
    color: #444;
    transition: 0.3s ease;
}

.wishlist .box .fa-times {
    right: 12px;
}
.wishlist .box .fa-eye {
    left: 12px;
}

.wishlist .box .fa-times:hover {
    background: #e74c3c;
    color: #fff;
}
.wishlist .box .fa-eye:hover {
    background: #3498db;
    color: #fff;
}

/* ===== Buttons ===== */
.wishlist .box .btn {
    display: inline-block;
    padding: 10px 18px;
    border-radius: 8px;
    background: #3498db;
    color: #fff;
    font-size: 14px;
    font-weight: 500;
    border: none;
    cursor: pointer;
    transition: 0.3s ease;
}

.wishlist .box .btn:hover {
    background: #2980b9;
}

/* ===== Empty Message ===== */
.wishlist .empty {
    grid-column: span 3;
    text-align: center;
    font-size: 16px;
    color: #888;
    padding: 20px;
}

/* ===== Wishlist Totals ===== */
.wishlist-total {
    margin-top: 30px;
    padding: 20px;
    border-radius: 12px;
    background: #f9f9f9;
    text-align: center;
    border: 1px solid #eee;
}

.wishlist-total p {
    font-size: 18px;
    margin-bottom: 15px;
    color: #333;
}

.wishlist-total span {
    font-weight: 600;
    color: #27ae60;
}

/* Option + Delete Buttons */
.option-btn,
.delete-btn {
    display: inline-block;
    margin: 5px;
    padding: 10px 20px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    transition: 0.3s ease;
}

.option-btn {
    background: #27ae60;
    color: #fff;
}
.option-btn:hover {
    background: #1e8449;
}

.delete-btn {
    background: #e74c3c;
    color: #fff;
}
.delete-btn:hover {
    background: #c0392b;
}

/* ===== Responsive ===== */
@media (max-width: 768px) {
    .wishlist {
        margin: 20px;
        padding: 15px;
    }
    .wishlist .box-container {
        grid-template-columns: 1fr;
    }
}
</style>
</head>
<body><!-- Navigation Bar -->
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
<section class="wishlist">
    <h1 class="title">Products Added</h1>

    <div class="box-container">
        @php $grand_total = 0; @endphp

        @if($wishlist->count() > 0)
            @foreach($wishlist as $item)
                <form method="POST" action="{{ route('pro-wishlist.store') }}">
                    @csrf
                    <div class="box">
                        {{-- Delete link --}}
                        <a href="{{ route('wishlist.delete', $item->id) }}" class="fas fa-times" onclick="return confirm('Delete this from wishlist?');"></a>

                        {{-- Product preview --}}
                        <a href="{{ route('product.view', ['pid' => $item->pid]) }}" class="fas fa-eye">
                            <img src="{{ asset('uploaded_img/' . $item->image) }}" alt="">
                        </a>

                        <div class="name">{{ $item->name }}</div>
                        <div class="price">${{ $item->price }}/-</div>

                        {{-- Hidden inputs --}}
                        <input type="hidden" name="pid" value="{{ $item->pid }}">
                        <input type="hidden" name="name" value="{{ $item->name }}">
                        <input type="hidden" name="price" value="{{ $item->price }}">
                        <input type="hidden" name="image" value="{{ $item->image }}">

                        <input type="submit" value="Add to Wishlist Again" class="btn">
                    </div>
                </form>
                @php $grand_total += $item->price; @endphp
            @endforeach
        @else
            <p class="empty">Your wishlist is empty</p>
        @endif
    </div>

    <div class="wishlist-total">
        <p>Grand total: <span>${{ $grand_total }}/-</span></p>
        <a href="{{ route('pro-shop') }}" class="option-btn">Continue Shopping</a>
        <a href="{{ route('wishlist.clear') }}" class="delete-btn" onclick="return confirm('Clear wishlist?');">Clear Wishlist</a>
    </div>
</section>
@endsection


</body>
</html>
