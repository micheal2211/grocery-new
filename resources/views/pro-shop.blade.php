<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$messages = session('messages', []);
$user_id = Auth::id();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocery & Book Store</title>
    <link rel="stylesheet" href="{{ asset('css/projectA.css') }}">
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
    
    
    <!-- Display messages -->
    @if (!empty($messages))
        <div class="messages">
            @foreach ($messages as $msg)
                <p>{{ $msg }}</p>
            @endforeach
        </div>
    @endif

    <!-- Category Navigation -->
    <section class="p-category">
        <a href="{{ url('pro-category?category=fruits') }}">Fruits</a>
        <a href="{{ url('pro-category?category=vegetables') }}">Vegetables</a>
        <a href="{{ url('pro-category?category=fish') }}">Fish</a>
        <a href="{{ url('pro-category?category=meat') }}">Meat</a>
    </section>

    <!-- Static Grocery Products -->
    <section class="products">
        <h2>Our Fresh Products</h2>
        <div class="product-grid">
            @php
                $static_products = [
                    ['id' => '1', 'name' => 'Apples', 'price' => 2.99, 'image' => 'img1.jpg'],
                    ['id' => '2', 'name' => 'Bananas', 'price' => 1.20, 'image' => 'img2.jpg'],
                    ['id' => '3', 'name' => 'Tomatoes', 'price' => 3.50, 'image' => 'img3.jpg'],
                    ['id' => '4', 'name' => 'Tomatoes', 'price' => 3.50, 'image' => 'img4.jpg'],
                    ['id' => '5', 'name' => 'Tomatoes', 'price' => 3.50, 'image' => 'img5.jpg'],
                    ['id' => '6', 'name' => 'Tomatoes', 'price' => 3.50, 'image' => 'img6.jpg'],
                    ['id' => '7', 'name' => 'Tomatoes', 'price' => 3.50, 'image' => 'img7.jpg'],
                    ['id' => '8', 'name' => 'Tomatoes', 'price' => 3.50, 'image' => 'img8.jpg'],
                ];
            @endphp
            @foreach ($static_products as $product)
                <form method="POST" action="{{ route('pro-shop.submit') }}">
                    @csrf
                    <div class="product-card">
                        <img src="{{ asset('images/' . $product['image']) }}" alt="{{ $product['name'] }}">
                        <h3>{{ $product['name'] }}</h3>
                        <p>${{ number_format($product['price'], 2) }} / kg</p>
                        <input type="hidden" name="pid" value="{{ $product['id'] }}">
                        <input type="hidden" name="p_name" value="{{ $product['name'] }}">
                        <input type="hidden" name="p_price" value="{{ $product['price'] }}">
                        <input type="hidden" name="p_image" value="{{ $product['image'] }}">
                        <input type="number" min="1" value="1" name="p_qty" class="qty">
                        <input type="submit" value="Add to Cart" class="option-btn" name="add_to_cart">
                        <input type="submit" value="Add to Wishlist" class="option-btn" name="add_to_wishlist">
                    </div>
                </form>
            @endforeach
        </div>
    </section>

    <!-- Static Book Section -->
    <header class="header">
        <h1>The Book Shop</h1>
        <div class="cart-count">🛒 
            @php
                $cart_count = $user_id ? DB::table('carts')->where('user_id', $user_id)->sum('quantity') : 0;
                echo $cart_count;
            @endphp
        </div>
    </header>

    <section class="shop-container">
        @php
            $books = [
                ['id' => 'book1', 'name' => 'HTML', 'price' => 1000, 'image' => 'html.jpg'],
                ['id' => 'book2', 'name' => 'CSS', 'price' => 1000, 'image' => 'css.jpg'],
                ['id' => 'book3', 'name' => 'JavaScript', 'price' => 5000, 'image' => 'js.jpg'],
            ];
        @endphp
        @foreach ($books as $book)
            <form method="POST" action="{{ route('pro-shop.submit') }}">
                @csrf
                <div class="book-card">
                    <h2>{{ $book['name'] }}</h2>
                    <p class="price">${{ number_format($book['price'], 2) }}</p>
                    <input type="hidden" name="pid" value="{{ $book['id'] }}">
                    <input type="hidden" name="p_name" value="{{ $book['name'] }}">
                    <input type="hidden" name="p_price" value="{{ $book['price'] }}">
                    <input type="hidden" name="p_image" value="{{ $book['image'] }}">
                    <input type="number" min="1" value="1" name="p_qty" class="qty">
                    <input type="submit" value="Add to Cart" class="btn" name="add_to_cart">
                    <input type="submit" value="Add to Wishlist" class="btn" name="add_to_wishlist">
                </div>
            </form>
        @endforeach
    </section>

    <!-- Dynamic PHP Products -->
    <section class="products">
        <h2 class="title">Latest Products</h2>
        <div class="box-container">
            @foreach ($products as $product)
                <form action="{{ url('pro-home/handleForm') }}" class="box" method="POST">
    @csrf
    <div class="price">$<span>{{ $product->price }}</span>/-</div>
    <a href="{{ url('view_page?pid='.$product->idNo) }}" class="fas fa-eye" aria-label="View {{ $product->name }}"></a>
    <img src="uploaded_img/{{ $product->image }}" alt="{{ $product->name }}">
    <div class="name">{{ $product->name }}</div>

    <input type="hidden" name="pid" value="{{ $product->idNo }}">
    <input type="hidden" name="p_name" value="{{ $product->name }}">
    <input type="hidden" name="p_price" value="{{ $product->price }}">
    <input type="hidden" name="p_image" value="{{ $product->image }}">
    <input type="number" min="1" value="1" name="p_qty" class="qty" required>

    <input type="submit" value="add to wishlist" class="option-btn" name="add_to_wishlist">
    <input type="submit" value="add to cart" class="option-btn" name="add_to_cart">
</form>

            @endforeach
        </div>
    </section>

    <!-- Link to Checkout -->
    <div>
        <a href="{{ route('pro-checkout') }}" class="btn">Proceed to Checkout</a>
    </div>
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
</body>
</html>