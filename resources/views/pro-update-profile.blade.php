<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/projectR.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
    /* ===== General Reset ===== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    background: #f8f9fa;
    color: #333;
    font-size: 16px;
    line-height: 1.6;
}

/* ===== Section Styling ===== */
.update-profile {
    max-width: 900px;
    margin: 50px auto;
    padding: 30px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    text-align: center;
}

.update-profile h1 {
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 25px;
    color: #444;
    text-transform: capitalize;
}

/* ===== Form Layout ===== */
.update-profile form {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 25px;
}

.update-profile img {
    width: 130px;
    height: 130px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #ddd;
    margin-bottom: 15px;
    transition: 0.3s ease;
}
.update-profile img:hover {
    border-color: #2ecc71;
}

/* ===== Flex Input Fields ===== */
.flex {
    display: flex;
    flex-wrap: wrap;
    gap: 25px;
    justify-content: center;
    width: 100%;
}

.inputBox {
    flex: 1 1 320px;
    text-align: left;
}

.inputBox span {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: #444;
    font-size: 14px;
}

.inputBox .box {
    width: 100%;
    padding: 12px 15px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 15px;
    transition: 0.3s ease;
}

.inputBox .box:focus {
    border-color: #2ecc71;
    box-shadow: 0 0 8px rgba(46, 204, 113, 0.2);
    outline: none;
}

/* ===== Buttons ===== */
.flex-btn {
    display: flex;
    gap: 15px;
    justify-content: center;
    margin-top: 10px;
}

.btn,
.option-btn {
    padding: 12px 25px;
    border-radius: 8px;
    font-size: 15px;
    font-weight: 500;
    cursor: pointer;
    border: none;
    transition: 0.3s ease;
    text-decoration: none;
    display: inline-block;
}

/* Primary Button */
.btn {
    background: #2ecc71;
    color: #fff;
}
.btn:hover {
    background: #27ae60;
}

/* Secondary Button */
.option-btn {
    background: #3498db;
    color: #fff;
}
.option-btn:hover {
    background: #2980b9;
}

/* ===== Responsive ===== */
@media (max-width: 768px) {
    .update-profile {
        margin: 20px;
        padding: 20px;
    }
    .flex {
        flex-direction: column;
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
                <a href="orderS" class="nav-link">
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
    
    <section class="update-profile">
        <h1 class="tilte">update profile</h1>

        <form method="POST" action="{{ route('pro-update-profile.submit') }}">
            @csrf

            
            <img src="images/2.jpg" alt="polo" />
            <div class="flex">
                <div class="inputBox">
                    <span>username :</span>
                <input type="text" name="name" value="" placeholder="update username" required class="box">
                <span>email :</span>
                <input type="email" name="email" value="" placeholder="update email" required class="box">
                <span>updata pic :</span>
                <input type="file" name="image" accept="images/jpg, image/jpeg, image/png" required class="box">
                </div>
                <div class="inputBox">
                    <input type="hidden" name="old_pass" value="">
                    <input type="hidden" name="old_image" value>
                    <span>old password :</span>
                    <input type="password" name="update_pass" value="" placeholder="enter previous password" class="box">
                    <span>new password :</span>
                    <input type="password" name="new_pass" value="" placeholder="enter new password" class="box">
                    <span>confirm password :</span>
                    <input type="password" name="confirm_pass" value="" placeholder="confirm new password" class="box">
            
                </div>
            </div>
            <div class="flex-btn">
                <input type="submit" class="btn" value="update profile" name="update_profile">
                <a href="projectR" class="option-btn">go back</a>
            </div>
        </form>


    </section><!-- Footer Section -->
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