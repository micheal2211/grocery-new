<?php
include 'connect.php';


if (isset($_POST['add_to_wishlist'])) {
    $pid = filter_var($_POST['pid'], FILTER_SANITIZE_STRING);
    $p_name = filter_var($_POST['p_name'], FILTER_SANITIZE_STRING);
    $p_price = filter_var($_POST['p_price'], FILTER_SANITIZE_STRING);
    $p_image = filter_var($_POST['p_image'], FILTER_SANITIZE_STRING);

    $check_wishlist = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
    $check_wishlist->execute([$p_name, $user_id]);

    $check_cart = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
    $check_cart->execute([$p_name, $user_id]);

    if ($check_wishlist->rowCount() > 0) {
        $message[] = 'already added to wishlist!';
    } elseif ($check_cart->rowCount() > 0) {
        $message[] = 'already added to cart!';
    } else {
        $insert_wishlist = $conn->prepare("INSERT INTO `wishlist` (user_id, pid, name, price, image) VALUES (?, ?, ?, ?, ?)");
        $insert_wishlist->execute([$user_id, $pid, $p_name, $p_price, $p_image]);
        $message[] = 'added to wishlist';
    }
}

if (isset($_POST['add_to_cart'])) {
    $pid = filter_var($_POST['pid'], FILTER_SANITIZE_STRING);
    $p_name = filter_var($_POST['p_name'], FILTER_SANITIZE_STRING);
    $p_price = filter_var($_POST['p_price'], FILTER_SANITIZE_STRING);
    $p_image = filter_var($_POST['p_image'], FILTER_SANITIZE_STRING);
    $p_qty = filter_var($_POST['p_qty'], FILTER_SANITIZE_STRING);

    $check_cart = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
    $check_cart->execute([$p_name, $user_id]);

    if ($check_cart->rowCount() > 0) {
        $message[] = 'already added to cart!';
    } else {
        $check_wishlist = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
        $check_wishlist->execute([$p_name, $user_id]);

        if ($check_wishlist->rowCount() > 0) {
            $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE name = ? AND user_id = ?");
            $delete_wishlist->execute([$p_name, $user_id]);
        }

        $insert_cart = $conn->prepare("INSERT INTO `cart` (user_id, pid, name, price, quantity, image) VALUES (?, ?, ?, ?, ?, ?)");
        $insert_cart->execute([$user_id, $pid, $p_name, $p_price, $p_qty, $p_image]);
        $message[] = 'added to cart!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Categories</title>
<link rel="stylesheet" href="{{ asset('css/projectR.css') }}">
</head>
<body>
<!-- Navigation Bar -->
    <nav class="navbar">
        <a href="#" class="navbar-brand">
            <i class="fas fa-store"></i>ProductHub
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
                <a href="order" class="nav-link">
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

@section('title', 'Product Categories')

@section('content')
<section class="products">
    <h1 class="title">Products Categories</h1>

    {{-- ✅ Success / Error messages --}}
    @if(session('success'))
        <div class="message success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="message error">{{ session('error') }}</div>
    @endif

    <div class="box-container">
        @if($products->count() > 0)
            @foreach($products as $product)
                <form action="{{ route('pro-category.store') }}" method="POST" class="box">
    @csrf
    <div class="price">${{ $product->price }}/-</div>

    <a href="{{ url('view_page', $product->idNo) }}" class="fas fa-eye"></a>

    <img src="{{ asset('uploaded_img/' . $product->image) }}" alt="">

    <div class="name">{{ $product->name }}</div>

    <input type="hidden" name="pid" value="{{ $product->idNo }}">
    <input type="hidden" name="p_name" value="{{ $product->name }}">
    <input type="hidden" name="p_price" value="{{ $product->price }}">
    <input type="hidden" name="p_image" value="{{ $product->image }}">
    
    <input type="number" min="1" value="1" name="p_qty" class="qty">

    <input type="submit" value="Add to Wishlist" class="option-btn" name="add_to_wishlist">
    <input type="submit" value="Add to Cart" class="option-btn" name="add_to_cart">
</form>


            @endforeach
        @else
            <p class="empty">No products available!</p>
        @endif
    </div>
</section>
@endsection


<!-- Footer Section -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h3>GroceryMate</h3>
                <p>Your one-stop solution for managing products, inventory, and orders efficiently.</p>
                <div class="socials">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="pro-home">Home</a></li>
                    <li><a href="pro-product">Products</a></li>
                    <li><a href="orders">Orders</a></li>
                    <li><a href="pro-contact">Contact</a></li>
                    <li><a href="#">Settings</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Support</h3>
                <ul>
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="pro_contacts">Contact Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Contact Info</h3>
                <div class="contact-info">
                    <p><i class="fas fa-map-marker-alt"></i> 123 Commerce St, Business City</p>
                    <p><i class="fas fa-phone"></i> 08143359625</p>
                    <p><i class="fas fa-envelope"></i> support@producthub.com</p>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2023 ProductHub. All rights reserved.</p>
        </div>
    </footer>

    <style>
        /* Footer Styles */
        .footer {
            background: linear-gradient(135deg, #2c3e50, #1a2530);
            color: #fff;
            padding: 3rem 1rem 1rem;
            margin-top: 2rem;
        }
        
        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;

        }
        
        .footer-section h3 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.5rem;
            color: green;
        }
        
        .footer-section h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 2px;
            background-color: #4CAF50;
        }
        
        .footer-section p {
            line-height: 1.6;
            margin-bottom: 1.5rem;
            color: #fff;
        }
        
        .footer-section ul {
            list-style: none;
        }
        
        .footer-section ul li {
            margin-bottom: 0.8rem;
            
        }
        
        .footer-section ul li a {
            color: #ddd;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-section ul li a:hover {
            color: #4CAF50;
            padding-left: 5px;
        }
        
        .socials {
            display: flex;
            gap: 1rem;
        }
        
        .socials a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: #fff;
            border-radius: 50%;
            color: #fff;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .socials a:hover {
            background-color: #4CAF50;
            transform: translateY(-3px);
        }
        
        .contact-info p {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 1rem;
            
        }

        .contact-info i {
            color: #fff;
        }
        
        .footer-bottom {
            max-width: 1200px;
            margin: 2rem auto 0;
            padding-top: 1.5rem;
            border-top: 1px solid #34495e;
            text-align: center;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .footer-container {
                grid-template-columns: 1fr;
                text-align: center;
            }
            
            .footer-section h3::after {
                left: 50%;
                transform: translateX(-50%);
            }
            
            .socials {
                justify-content: center;
            }
        }
    </style>

<?php include('footer.php'); ?>
</body>
</html>
