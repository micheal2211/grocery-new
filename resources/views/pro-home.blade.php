<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organic Food Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="/css/projectR.css">
    <style>
        :root {
            --green: #27ae60;
            --orange: #f39c12;
            --red: #e74c3c;
            --black: #333;
            --light-color: #666;
            --white: #fff;
            --light-bg: #f6f6f6;
            --border: 2px solid var(--black);
            --box-shadow: 0 .5rem 1rem rgba(0,0,0,.1);
        }
        
        * {
            font-family: 'Rubik', sans-serif;
            margin: 0; 
            padding: 0;
            box-sizing: border-box;
            outline: none; 
            border: none;
            text-decoration: none;
            color: var(--black);
        }
        
        *::selection {
            background-color: var(--green);
            color: var(--white);
        }
        
        *::-webkit-scrollbar {
            height: 5px;
            width: 10px;
        }
        
        *::-webkit-scrollbar-track {
            background-color: transparent;
        }
        
        *::-webkit-scrollbar-thumb {
            background-color: var(--green);
            border-radius: 5px;
        }
        
        body {
            background-color: var(--light-bg);
            overflow-x: hidden;
        }
        
        html {
            font-size: 62.5%;
            overflow-x: hidden;
            scroll-behavior: smooth;
            scroll-padding-top: 6.5rem;
        }
        
        section {
            padding: 3rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .title {
            text-align: center;
            margin-bottom: 2rem;
            text-transform: uppercase;
            color: var(--black);
            font-size: 2.5rem;
        }
        
        .btn {
            display: inline-block;
            margin-top: 1rem;
            border-radius: 5rem;
            color: var(--white);
            font-size: 1.8rem;
            padding: 1rem 2rem;
            text-transform: capitalize;
            cursor: pointer;
            text-align: center;
            background-color: var(--green);
        }
        
        .btn:hover {
            background-color: var(--black);
        }
        
        .option-btn {
            display: inline-block;
            padding: 1rem 1.5rem;
            border-radius: 0.5rem;
            color: var(--white);
            font-size: 1.6rem;
            text-align: center;
            cursor: pointer;
            background-color: var(--orange);
            width: 100%;
            margin-top: 1rem;
        }
        
        .option-btn:hover {
            background-color: var(--black);
        }
        
        /* Home Background and Hero Section */
        .home-bg {
            background: linear-gradient(90deg, var(--white), transparent), url('https://images.unsplash.com/photo-1542838132-92c53300491e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1600&q=80') no-repeat;
            background-size: cover;
            background-position: center;
            padding: 4rem 0;
        }
        
        .home {
            min-height: 60vh;
            display: flex;
            align-items: center;
        }
        
        .home .content {
            max-width: 50rem;
        }
        
        .home .content span {
            color: var(--green);
            font-size: 2.5rem;
            font-weight: bold;
        }
        
        .home .content h3 {
            color: var(--black);
            font-size: 3rem;
            margin: 1rem 0;
        }
        
        .home .content p {
            color: var(--light-color);
            font-size: 1.6rem;
            line-height: 2;
            margin-bottom: 2rem;
        }
        
        /* Home Category Section */
        .home-category {
            padding: 3rem 0;
        }
        
        .home-category .box-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(25rem, 1fr));
            gap: 1.5rem;
        }
        
        .home-category .box {
            padding: 2rem;
            text-align: center;
            border: var(--border);
            box-shadow: var(--box-shadow);
            background-color: var(--white);
            border-radius: 0.5rem;
            transition: transform 0.3s ease;
        }
        
        .home-category .box:hover {
            transform: translateY(-0.5rem);
        }
        
        .home-category .box img {
            height: 15rem;
            margin-bottom: 1rem;
            width: 100%;
            object-fit: cover;
            border-radius: 0.5rem;
        }
        
        .home-category .box h3 {
            font-size: 2rem;
            color: var(--black);
            margin-bottom: 1rem;
        }
        
        .home-category .box p {
            font-size: 1.5rem;
            color: var(--light-color);
            line-height: 1.5;
            margin-bottom: 1.5rem;
        }
        
        /* Products Section */
        .products {
            padding: 3rem 0;
        }
        
        .products .box-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
            gap: 1.5rem;
        }
        
        .products .box {
            text-align: center;
            border: var(--border);
            box-shadow: var(--box-shadow);
            background-color: var(--white);
            border-radius: 0.5rem;
            padding: 2rem;
            position: relative;
            transition: transform 0.3s ease;
        }
        
        .products .box:hover {
            transform: translateY(-0.5rem);
        }
        
        .products .box .price {
            position: absolute;
            top: 1rem;
            left: 1rem;
            padding: 0.5rem 1rem;
            font-size: 1.8rem;
            color: var(--white);
            background-color: var(--red);
            border-radius: 0.5rem;
        }
        
        .products .box .fa-eye {
            position: absolute;
            top: 1rem;
            right: 1rem;
            height: 4rem;
            width: 4rem;
            line-height: 4rem;
            font-size: 1.8rem;
            background-color: var(--white);
            color: var(--black);
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .products .box .fa-eye:hover {
            background-color: var(--green);
            color: var(--white);
        }
        
        .products .box img {
            width: 100%;
            margin-bottom: 1rem;
            border-radius: 0.5rem;
            height: 25rem;
            object-fit: cover;
        }
        
        .products .box .name {
            margin: 1rem 0;
            font-size: 2rem;
            color: var(--black);
        }
        
        .products .box .qty {
            width: 100%;
            padding: 1.2rem 1.4rem;
            font-size: 1.6rem;
            color: var(--black);
            border-radius: 0.5rem;
            background-color: var(--light-bg);
            border: var(--border);
            margin: 1rem 0;
        }
        
        .empty {
            padding: 1.5rem;
            background: var(--white);
            color: var(--red);
            border-radius: 0.5rem;
            border: var(--border);
            font-size: 2rem;
            text-align: center;
            box-shadow: var(--box-shadow);
            width: 100%;
            grid-column: 1 / -1;
        }
        
        /* Responsive Design */
        @media (max-width: 991px) {
            .home .content {
                text-align: center;
                max-width: 100%;
            }
            
            .home .content h3 {
                font-size: 2.5rem;
            }
        }
        
        @media (max-width: 768px) {
            .home-bg {
                background: linear-gradient(rgba(255,255,255,0.8), rgba(255,255,255,0.8)), url('https://images.unsplash.com/photo-1542838132-92c53300491e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1600&q=80') no-repeat;
                background-size: cover;
                background-position: center;
            }
            
            .home .content span {
                font-size: 2rem;
            }
            
            .home .content h3 {
                font-size: 2rem;
            }
            
            .title {
                font-size: 2.2rem;
            }
        }
        
        @media (max-width: 450px) {
            .home-category .box-container,
            .products .box-container {
                grid-template-columns: 1fr;
            }
            
            .home .content h3 {
                font-size: 1.8rem;
            }
            
            .btn {
                font-size: 1.6rem;
                padding: 0.8rem 1.5rem;
            }
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

    <div class="home-bg">
        <section class="home">
            <div class="content">
                <span>don't panic, go organice</span>
                <h3>Reach For A Healthier You With Organic Foods</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ducimus velit quaerat in, est ab ipsum optio?</p>
                <a href="pro-about" class="btn">about us</a>
            </div>
        </section>
    </div>

    <section class="home-category">
        <h1 class="title">shop by category</h1>
        <div class="box-container">
            <div class="box">
                <img src="https://images.unsplash.com/photo-1619566636858-adf3ef46400b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1000&q=80" alt="Fruits">
                <h3>fruits</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. At.</p>
                <a href="pro-category?category=fruits" class="btn">fruits</a>
            </div>

            <div class="box">
                <img src="https://images.unsplash.com/photo-1603052875180-e1e10e5a0b36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1000&q=80" alt="Meat">
                <h3>meat</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. At.</p>
                <a href="pro-category?category=meat" class="btn">meat</a>
            </div>

            <div class="box">
                <img src="https://images.unsplash.com/photo-1566385101042-1a0aa0c1268c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1000&q=80" alt="Vegetables">
                <h3>vegetable</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. At.</p>
                <a href="pro-category?category=vegetable" class="btn">vegetables</a>
            </div>

            <div class="box">
                <img src="https://images.unsplash.com/photo-1592517918258-4811a92d-0d27-4c30-80c0-cccd36b74633?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1000&q=80" alt="Fish">
                <h3>fish</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. At.</p>
                <a href="pro-category?category=fish" class="btn">fish</a>
            </div>
        </div>
    </section>

    <section class="products">
        <h1 class="title">latest products</h1>
        <div class="box-container">
            <form action="" class="box" method="GET">
                <div class="price">$<span>12.99</span>/-</div>
                <a href="view_page.php?pid=1" class="fas fa-eye" aria-label="View Organic Apples"></a>
                <img src="https://images.unsplash.com/photo-1568702846914-96b305d2aaeb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1000&q=80" alt="Organic Apples">
                <div class="name">Organic Apples</div>
                <input type="hidden" name="pid" value="1">
                <input type="hidden" name="p_name" value="Organic Apples">
                <input type="hidden" name="p_price" value="12.99">
                <input type="hidden" name="p_image" value="apples.jpg">
                <input type="number" min="1" value="1" name="p_qty" class="qty" required>
                <input type="submit" value="add to wishlist" class="option-btn" name="add_to_wishlist">
                <input type="submit" value="add to cart" class="option-btn" name="add_to_cart">
            </form>

            <form action="" class="box" method="GET">
                <div class="price">$<span>9.50</span>/-</div>
                <a href="view_page.php?pid=2" class="fas fa-eye" aria-label="View Fresh Carrots"></a>
                <img src="https://images.unsplash.com/photo-1445282768818-728615cc910a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1000&q=80" alt="Fresh Carrots">
                <div class="name">Fresh Carrots</div>
                <input type="hidden" name="pid" value="2">
                <input type="hidden" name="p_name" value="Fresh Carrots">
                <input type="hidden" name="p_price" value="9.50">
                <input type="hidden" name="p_image" value="carrots.jpg">
                <input type="number" min="1" value="1" name="p_qty" class="qty" required>
                <input type="submit" value="add to wishlist" class="option-btn" name="add_to_wishlist">
                <input type="submit" value="add to cart" class="option-btn" name="add_to_cart">
            </form>

            <form action="" class="box" method="GET">
                <div class="price">$<span>24.99</span>/-</div>
                <a href="view_page.php?pid=3" class="fas fa-eye" aria-label="View Organic Chicken"></a>
                <img src="https://images.unsplash.com/photo-1603052875302-d376b7c0638a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1000&q=80" alt="Organic Chicken">
                <div class="name">Organic Chicken</div>
                <input type="hidden" name="pid" value="3">
                <input type="hidden" name="p_name" value="Organic Chicken">
                <input type="hidden" name="p_price" value="24.99">
                <input type="hidden" name="p_image" value="chicken.jpg">
                <input type="number" min="1" value="1" name="p_qty" class="qty" required>
                <input type="submit" value="add to wishlist" class="option-btn" name="add_to_wishlist">
                <input type="submit" value="add to cart" class="option-btn" name="add_to_cart">
            </form>

            <form action="" class="box" method="GET">
                <div class="price">$<span>18.75</span>/-</div>
                <a href="view_page.php?pid=4" class="fas fa-eye" aria-label="View Fresh Salmon"></a>
                <img src="https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1000&q=80" alt="Fresh Salmon">
                <div class="name">Fresh Salmon</div>
                <input type="hidden" name="pid" value="4">
                <input type="hidden" name="p_name" value="Fresh Salmon">
                <input type="hidden" name="p_price" value="18.75">
                <input type="hidden" name="p_image" value="salmon.jpg">
                <input type="number" min="1" value="1" name="p_qty" class="qty" required>
                <input type="submit" value="add to wishlist" class="option-btn" name="add_to_wishlist">
                <input type="submit" value="add to cart" class="option-btn" name="add_to_cart">
            </form>
        </div>
    </section>


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