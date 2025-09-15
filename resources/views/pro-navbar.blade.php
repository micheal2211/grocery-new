<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
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
        
        /* Navigation Bar Styles */
        .navbar {
            background: linear-gradient(135deg, #2c3e50, #1a2530);
            color: white;
            padding: 0.8rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .navbar-brand {
            display: flex;
            align-items: center;
            font-size: 1.6rem;
            font-weight: 700;
            color: white;
            text-decoration: none;
        }
        
        .navbar-brand i {
            margin-right: 10px;
            color: #4ecdc4;
            font-size: 1.8rem;
        }
        
        .navbar-nav {
            display: flex;
            list-style: none;
        }
        
        .nav-item {
            margin-left: 1.2rem;
            position: relative;
        }
        
        .nav-link {
            color: #e0e0e0;
            text-decoration: none;
            padding: 0.6rem 1rem;
            border-radius: 6px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            font-weight: 500;
        }
        
        .nav-link i {
            margin-right: 8px;
            font-size: 1.1rem;
        }
        
        .nav-link:hover {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .nav-link.active {
            color: white;
            background-color: #4ecdc4;
        }
        
        .nav-link.active:hover {
            background-color: #3bb4ac;
        }
        
        .badge {
            background-color: #ff6b6b;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 0.75rem;
            margin-left: 6px;
        }
        
        .user-profile {
            display: flex;
            align-items: center;
            margin-left: 1.5rem;
        }
        
        .user-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
            border: 2px solid #4ecdc4;
        }
        
        .hamburger {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }
        
        /* Responsive styles */
        @media (max-width: 992px) {
            .navbar-nav {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background: linear-gradient(135deg, #2c3e50, #1a2530);
                flex-direction: column;
                padding: 1rem 0;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            }
            
            .navbar-nav.active {
                display: flex;
            }
            
            .nav-item {
                margin: 0.5rem 0;
                width: 100%;
                text-align: center;
            }
            
            .nav-link {
                padding: 1rem;
                justify-content: center;
            }
            
            .user-profile {
                margin: 0.5rem 0;
                justify-content: center;
                width: 100%;
            }
            
            .hamburger {
                display: block;
            }
        }
        
        /* Content styles for demonstration */
        .content {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 20px;
        }
        
        .content h1 {
            color: #2c3e50;
            margin-bottom: 1.5rem;
            font-weight: 600;
        }
        
        .content p {
            margin-bottom: 1rem;
            font-size: 1.1rem;
            color: #555;
        }
        
        .demo-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 2rem;
        }
        
        .demo-box {
            flex: 1;
            min-width: 300px;
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .demo-box h2 {
            color: #2c3e50;
            margin-bottom: 1rem;
            font-weight: 600;
        }
        
        .demo-box p {
            color: #666;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <a href="#" class="navbar-brand">
            <i class="fas fa-store"></i>ProductHub
        </a>
        
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="nav-link active">
                    <i class="fas fa-home"></i>Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-box"></i>Products
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-shopping-cart"></i>Orders
                    <span class="badge">5</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-chart-bar"></i>Analytics
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

    <!-- Demo content -->
    <div class="content">
        <h1>Product Management Dashboard</h1>
        <p>This is a demonstration of a professional navigation bar for your product management system. The navbar includes all essential elements with a clean, modern design.</p>
        
        <div class="demo-container">
            <div class="demo-box">
                <h2>Responsive Design</h2>
                <p>The navbar adapts to different screen sizes. On mobile devices, the menu collapses into a hamburger menu for better user experience.</p>
            </div>
            <div class="demo-box">
                <h2>Visual Indicators</h2>
                <p>Active page highlighting, notification badges, and hover effects provide clear visual feedback to users.</p>
            </div>
        </div>
    </div>

    <script>
        // Mobile menu toggle functionality
        document.getElementById('hamburger-btn').addEventListener('click', function() {
            const navMenu = document.querySelector('.navbar-nav');
            navMenu.classList.toggle('active');
            
            // Change icon when menu is open/closed
            const icon = this.querySelector('i');
            if (navMenu.classList.contains('active')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
        
        // Close menu when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const hamburgerBtn = document.getElementById('hamburger-btn');
            const navMenu = document.querySelector('.navbar-nav');
            const isClickInsideNav = event.target.closest('.navbar-nav');
            const isClickInsideHamburger = event.target.closest('#hamburger-btn');
            
            if (navMenu.classList.contains('active') && !isClickInsideNav && !isClickInsideHamburger) {
                navMenu.classList.remove('active');
                const icon = hamburgerBtn.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
    </script>
</body>
</html>