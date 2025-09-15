<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - ProductHub</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/project.css') }}">
    <style>
        :root {
            --green: #27ae60;
            --orange: #f39c12;
            --red: #e74c3c;
            --blue: #3498db;
            --purple: #9b59b6;
            --black: #333;
            --light-color: #666;
            --white: #fff;
            --light-bg: #f6f6f6;
            --dark-bg: #2c3e50;
            --dark-secondary: #1a2530;
            --border: 2px solid var(--black);
            --box-shadow: 0 .5rem 1rem rgba(0,0,0,.1);
            --sidebar-width: 250px;
        }
        
        * {
            font-family: 'Rubik', sans-serif;
            margin: 0; 
            padding: 0;
            box-sizing: border-box;
            outline: none; 
            border: none;
            text-decoration: none;
        }
        
        *::selection {
            background-color: var(--green);
            color: var(--white);
        }
        
        body {
            background-color: var(--light-bg);
            overflow-x: hidden;
            min-height: 100vh;
            display: flex;
        }
        
        /* Auth Status Styles */
        .auth-status {
            position: fixed;
            top: 1rem;
            right: 1rem;
            padding: 0.8rem 1.5rem;
            border-radius: 0.5rem;
            font-size: 1.4rem;
            z-index: 1000;
            box-shadow: var(--box-shadow);
        }
        
        .auth-status.guest {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .auth-status.auth {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: var(--sidebar-width);
            background: linear-gradient(135deg, var(--dark-bg), var(--dark-secondary));
            color: var(--white);
            transition: all 0.3s ease;
            z-index: 900;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        
        .sidebar .logo {
            padding: 1.5rem;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 2rem;
            font-weight: 700;
            color: var(--white);
        }
        
        .nav-menu {
            padding: 2rem 0;
        }
        
        .nav-menu a {
            display: flex;
            align-items: center;
            padding: 1.2rem 1.5rem;
            color: #e0e0e0;
            transition: all 0.3s ease;
            font-size: 1.6rem;
            border-left: 4px solid transparent;
        }
        
        .nav-menu a:hover, 
        .nav-menu a.active {
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--white);
            border-left-color: var(--green);
        }
        
        .nav-menu a i {
            margin-right: 1rem;
            font-size: 1.8rem;
            width: 20px;
            text-align: center;
        }
        
        .sidebar-toggle {
            display: none;
            position: fixed;
            top: 1rem;
            left: 1rem;
            background-color: var(--dark-bg);
            color: var(--white);
            border: none;
            border-radius: 0.5rem;
            padding: 0.8rem;
            font-size: 2rem;
            cursor: pointer;
            z-index: 1000;
            box-shadow: var(--box-shadow);
        }
        
        /* Main Content Area */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 2rem;
            transition: all 0.3s ease;
        }
        
        .dashboard {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .title {
            text-align: center;
            margin-bottom: 3rem;
            text-transform: uppercase;
            color: var(--black);
            font-size: 2.5rem;
            position: relative;
            padding-bottom: 1rem;
        }
        
        .title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background-color: var(--green);
        }
        
        /* Dashboard Boxes */
        .box-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        .box {
            background-color: var(--white);
            border-radius: 0.5rem;
            padding: 2rem;
            text-align: center;
            box-shadow: var(--box-shadow);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
        }
        
        .box:nth-child(1)::before { background-color: var(--green); }
        .box:nth-child(2)::before { background-color: var(--blue); }
        .box:nth-child(3)::before { background-color: var(--orange); }
        .box:nth-child(4)::before { background-color: var(--purple); }
        .box:nth-child(5)::before { background-color: var(--red); }
        .box:nth-child(6)::before { background-color: var(--green); }
        .box:nth-child(7)::before { background-color: var(--blue); }
        .box:nth-child(8)::before { background-color: var(--orange); }
        
        .box:hover {
            transform: translateY(-5px);
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15);
        }
        
        .box h3 {
            font-size: 3.5rem;
            color: var(--black);
            margin-bottom: 1rem;
        }
        
        .box p {
            font-size: 1.6rem;
            color: var(--light-color);
            margin-bottom: 1.5rem;
        }
        
        .box .btn {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            border-radius: 0.5rem;
            color: var(--white);
            font-size: 1.4rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background-color: var(--green);
        }
        
        .box .btn:hover {
            background-color: var(--black);
            transform: translateY(-2px);
        }
        
        /* Responsive styles */
        @media (max-width: 991px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .sidebar-toggle {
                display: block;
            }
            
            .box-container {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            }
        }
        
        @media (max-width: 768px) {
            .main-content {
                padding: 1.5rem;
            }
            
            .title {
                font-size: 2.2rem;
            }
            
            .box h3 {
                font-size: 2.8rem;
            }
        }
        
        @media (max-width: 576px) {
            .box-container {
                grid-template-columns: 1fr;
            }
            
            .title {
                font-size: 2rem;
            }
            
            .auth-status {
                top: 0.5rem;
                right: 0.5rem;
                font-size: 1.2rem;
                padding: 0.6rem 1rem;
            }
        }
        
        /* Animation for boxes */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .box {
            animation: fadeIn 0.5s ease forwards;
        }
        
        .box:nth-child(1) { animation-delay: 0.1s; }
        .box:nth-child(2) { animation-delay: 0.2s; }
        .box:nth-child(3) { animation-delay: 0.3s; }
        .box:nth-child(4) { animation-delay: 0.4s; }
        .box:nth-child(5) { animation-delay: 0.5s; }
        .box:nth-child(6) { animation-delay: 0.6s; }
        .box:nth-child(7) { animation-delay: 0.7s; }
        .box:nth-child(8) { animation-delay: 0.8s; }
    </style>
</head>
<body>
   
    
    <!-- Auth Status Indicator -->
    @auth
        <div class="auth-status auth">
            ✅ Logged in as: {{ Auth::user()->email }}
        </div>
    @endauth

    @guest
        <div class="auth-status guest">
            ❌ Not logged in
        </div>
    @endguest

    <!-- Sidebar Toggle Button (for mobile) -->
    <div class="sidebar-toggle">
        <i class="fas fa-bars" id="toggle-btn"></i>
    </div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <h2 class="logo">Admin Panel</h2>
        <nav class="nav-menu">
            <a href="dashboard.php" class="active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="orders"><i class="fas fa-shopping-cart"></i> Orders</a>
            <a href="pro-product"><i class="fas fa-box"></i> Products</a>
            <a href="pro-user"><i class="fas fa-users"></i> Users</a>
            <a href="pro-contact"><i class="fas fa-envelope"></i> Messages</a>
            <a href="pro-logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <section class="dashboard">
            <h1 class="title">dashboard</h1>
            <div class="box-container"> 
                <div class="box">
                    <h3>1,254</h3>
                    <p>total pendings</p>
                    <a href="orders" class="btn">see orders</a>                
                </div>
                
                <div class="box">
                    <h3>845</h3>  
                    <p>completed</p>
                    <a href="orders" class="btn">see orders</a>              
                </div>

                <div class="box">
                    <h3>2,099</h3>
                    <p>orders placed</p>
                    <a href="orders" class="btn">see orders</a>                
                </div>

                <div class="box">
                    <h3>156</h3>
                    <p>products added</p>
                    <a href="pro-product" class="btn">see products</a>                
                </div>

                <div class="box">
                    <h3>2,487</h3>
                    <p>total users</p>
                    <a href="pro-user" class="btn">see users</a>                
                </div>

                <div class="box">
                    <h3>5</h3>
                    <p>total admin</p>
                    <a href="pro-user" class="btn">see admins</a>                
                </div>

                <div class="box">
                    <h3>2,492</h3>
                    <p>total accounts</p>
                    <a href="pro-user" class="btn">see accounts</a>                
                </div>

                <div class="box">
                    <h3>324</h3>
                    <p>total messages</p>
                    <a href="pro-contact" class="btn">see messages</a>                
                </div>
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
    </main>

    <script>
        // Toggle sidebar on mobile
        document.getElementById('toggle-btn').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });
        
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.getElementById('toggle-btn');
            
            if (window.innerWidth < 992 && 
                !sidebar.contains(event.target) && 
                !toggleBtn.contains(event.target) &&
                sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        });
        
        // Add animation to boxes when they come into view
        const boxes = document.querySelectorAll('.box');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = 1;
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1 });
        
        boxes.forEach(box => {
            box.style.opacity = 0;
            box.style.transform = 'translateY(20px)';
            box.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            observer.observe(box);
        });
    </script>
</body>
</html>