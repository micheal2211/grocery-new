<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="{{ asset('css/projectR.css') }}">
    <style>
        .message { 
            color: red; 
            font-weight: bold; 
            margin: 10px 0; 
            padding: 10px;
            border: 1px solid #f5c6cb;
            background-color: #f8d7da;
            border-radius: 4px;
        }
        .success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        .display-orders p { margin: 5px 0; }
        .grand-total { 
            font-weight: bold; 
            margin-top: 10px;
            font-size: 1.2em;
            color: #28a745;
        }
        .empty { 
            color: red;
            font-style: italic;
        }
        .flex { 
            display: flex; 
            flex-wrap: wrap; 
            gap: 20px; 
            margin-bottom: 20px;
        }
        .inputBox { 
            flex: 1 1 300px; 
        }
        .box { 
            width: 100%; 
            padding: 12px; 
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .btn { 
            padding: 12px 24px; 
            background: #28a745; 
            color: white; 
            border: none; 
            cursor: pointer;
            border-radius: 4px;
            font-size: 1em;
            transition: background 0.3s;
        }
        .btn:hover {
            background: #218838;
        }
        .checkout-orders {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }
        h3 {
            color: #333;
            margin-bottom: 15px;
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
    @if(session('error'))
        <div class="message">{{ session('error') }}</div>
    @endif
    
    @if(session('success'))
        <div class="message success">{{ session('success') }}</div>
    @endif

    <section class="display-orders">
        <h3>Your Cart</h3>
        @if (!Auth::check())
            <p class="empty">Please log in to view your cart!</p>
            <a href="{{ route('pro-login') }}" class="btn">Login Now</a>
        @elseif (empty($cart_items))
            <p class="empty">Your cart is empty!</p>
            <a href="{{ route('pro-shop') }}" class="btn">Shop Now</a>
        @else
            @foreach ($cart_items as $item)
                <p>
                    {{ $item['name'] }}
                    <span>({{ $item['quantity'] }} x ${{ number_format($item['price'], 2) }})</span>
                    <span>= ${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                </p>
            @endforeach
            <div class="grand-total">Grand Total: <span>${{ number_format($cart_grand_total, 2) }}</span></div>
        @endif
    </section>

    @if (Auth::check() && !empty($cart_items))
        <section class="checkout-orders">
            <form method="POST" action="{{ route('pro-checkout.submit') }}">
                @csrf
                <h3>Place Your Order</h3>
                <div class="flex">
                    <div class="inputBox">
                        <span>Your Name:</span>
                        <input type="text" name="name" placeholder="Enter your name" class="box" required>
                    </div>
                    <div class="inputBox">
                        <span>Your Number:</span>
                        <input type="text" name="number" placeholder="Enter your phone number" class="box" required>
                    </div>
                    <div class="inputBox">
                        <span>Your Email:</span>
                        <input type="email" name="email" placeholder="Enter your email" class="box" required>
                    </div>
                    <div class="inputBox">
                        <span>Payment Method:</span>
                        <select name="method" class="box" required>
                            <option value="">Select payment method</option>
                            <option value="cash on delivery">Cash on Delivery</option>
                            <option value="credit card">Credit Card</option>
                            <option value="stripe">Stripe</option>
                            <option value="paypal">Paypal</option>
                        </select>
                    </div>
                    <div class="inputBox">
                        <span>Address Line 1:</span>
                        <input type="text" name="flat" placeholder="Flat/Apartment number" class="box" required>
                    </div>
                    <div class="inputBox">
                        <span>Address Line 2:</span>
                        <input type="text" name="street" placeholder="Street name" class="box" required>
                    </div>
                    <div class="inputBox">
                        <span>City:</span>
                        <input type="text" name="city" placeholder="Your city" class="box" required>
                    </div>
                    <div class="inputBox">
                        <span>State:</span>
                        <input type="text" name="state" placeholder="Your state" class="box" required>
                    </div>
                    <div class="inputBox">
                        <span>Country:</span>
                        <input type="text" name="country" placeholder="Your country" class="box" required>
                    </div>
                    <div class="inputBox">
                        <span>Pin Code:</span>
                        <input type="text" name="pin_code" placeholder="Postal/Zip code" class="box" required>
                    </div>
                </div>
                <input type="hidden" name="total_products" value="{{ $cart_items ? count($cart_items) : 0 }}">
                <input type="hidden" name="total_price" value="{{ $cart_grand_total ?? 0 }}">
                <input type="submit" value="Place Order Now" class="btn">
            </form>


      
<script>
document.getElementById("checkout-form").addEventListener("submit", function(e) {
    let method = document.getElementById("payment-method").value;

    if(method === "stripe") {
        e.preventDefault(); 
        window.location.href = "{{ route('stripe.page') }}"; // go to Stripe payment page
    }
});
</script>
        </section>
    @endif
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