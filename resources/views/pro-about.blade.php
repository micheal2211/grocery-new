<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/projectR.css') }}">

  <style>
    /* ✅ General Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background: #f9f9f9;
      color: #333;
      line-height: 1.6;
    }

    h1.title {
      text-align: center;
      font-size: 28px;
      margin-bottom: 30px;
      color: #2c3e50;
      text-transform: capitalize;
    }

    /* ✅ About Section */
    .about {
      padding: 50px 10%;
      background: #fff;
    }

    .about .row {
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
      justify-content: center;
    }

    .about .box {
      flex: 1 1 45%;
      background: #f4f6f9;
      border-radius: 10px;
      padding: 20px;
      text-align: center;
      box-shadow: 0 4px 10px rgba(0,0,0,0.08);
      transition: transform 0.3s ease;
    }

    .about .box:hover {
      transform: translateY(-8px);
    }

    .about .box img {
      width: 100%;
      height: 250px;
      object-fit: cover;
      border-radius: 8px;
      margin-bottom: 15px;
    }

    .about .box h3 {
      font-size: 20px;
      margin-bottom: 12px;
      color: #3498db;
      text-transform: capitalize;
    }

    .about .box p {
      font-size: 15px;
      color: #555;
      margin-bottom: 20px;
    }

    .about .btn {
      display: inline-block;
      background: #3498db;
      color: #fff;
      padding: 10px 20px;
      border-radius: 6px;
      text-decoration: none;
      transition: background 0.3s ease;
    }

    .about .btn:hover {
      background: #217dbb;
    }

    /* ✅ Reviews Section */
    .reviews {
      padding: 60px 10%;
      background: #ecf0f1;
    }

    .reviews .box-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 25px;
    }

    .reviews .box {
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      text-align: center;
      box-shadow: 0 4px 10px rgba(0,0,0,0.08);
      transition: transform 0.3s ease;
    }

    .reviews .box:hover {
      transform: translateY(-6px);
    }

    .reviews .box img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 15px;
      border: 3px solid #3498db;
    }

    .reviews .box p {
      font-size: 14px;
      color: #555;
      margin-bottom: 12px;
    }

    .reviews .stars {
      color: #f1c40f;
      margin-bottom: 10px;
    }

    .reviews .box h3 {
      font-size: 16px;
      font-weight: bold;
      color: #2c3e50;
    }

    /* ✅ Responsive */
    @media (max-width: 768px) {
      .about .row {
        flex-direction: column;
      }
      .about .box {
        flex: 1 1 100%;
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
    
  <section class="about">
    <div class="row">
      <div class="box">
        <img src="images/img2.jpg" alt="polo" />
        <h3>why choose</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
          Vero perspiciatis molestiae a aperiam sequi doloribus expedita dolor, 
          sapiente officia nobis aliquam explicabo corrupti
           hic, corporis iste. Possimus sunt ipsam laborum?</p>
        <a href="pro_contacts" class="btn">contact us</a>
      </div>
      <div class="box">
        <img src="images/img6.jpg" alt="polo" />
        <h3>what we provide</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
          Vero perspiciatis molestiae a aperiam sequi doloribus expedita dolor, 
          sapiente officia nobis aliquam explicabo corrupti
           hic, corporis iste. Possimus sunt ipsam laborum?</p>
        <a href="pro-shop" class="btn"> our shop</a>
      </div>
    </div>
  </section>

  <section class="reviews">
    <h1 class="title">clients reviews</h1>

    <div class="box-container">
      <div class="box">
        <img src="images/2.jpg" alt="polo" />
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt facilis magnam deleniti. Illum dolorem odit officiis. Cum recusandae soluta eaque!</p>
        <div class="stars">
          <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
        </div>
        <h3>John Deo</h3>
      </div>

      <div class="box">
        <img src="images/3.jpg" alt="polo" />
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
        <div class="stars">
          <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
        </div>
        <h3>Jane Smith</h3>
      </div>

      <div class="box">
        <img src="images/4.jpg" alt="polo" />
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
        <div class="stars">
          <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
        </div>
        <h3>Michael Lee</h3>
      </div>

      <div class="box">
        <img src="images/5.jpg" alt="polo" />
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
        <div class="stars">
          <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
        </div>
        <h3>Lisa Ray</h3>
      </div>

      <div class="box">
        <img src="images/6.jpg" alt="polo" />
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
        <div class="stars">
          <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
        </div>
        <h3>David Chen</h3>
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

</body>
</html>
