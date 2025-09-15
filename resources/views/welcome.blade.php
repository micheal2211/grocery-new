<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
	
</head>
<body>
    <header>
        <a href="#" class="logo"><img src="images/Cortouch-Media-logo-new.png" alt=""></a>

        <ul class="navmenu">
            <li><a href="#">home</a></li>
            <li><a href="http://localhost:8000/new#">page</a></li>
            <li><a href="http://127.0.0.1:5500/shop.html#">products</a></li>
            <li><a href="http://localhost:8000/act">Register</a></li>
            <li><a href="http://localhost:8000/login">Login</a></li>

        </ul>
        <div class="nav-icon">
            <a href="#"><i class='bx bx-search'></i></a>
            <a href="#"><i class='bx bx-user'></i></a>
            <a href="#"><i class='bx bx-cart'></i></a>

            <div class="bx bx-menu" id="menu-icon"></div>
        </div>

    </header>

    <section class="main-home">
        <style>
           background-image: url(public\images\banner-3.png);
         background-position: center;
         background-size: cover;
        display: grid;
         grid-template-columns:repeat(1, 1fr);
         align-items: center;
        </style>
        
        <div class="main-text">
            <h5>Winter Collection</h5>
            <h1>New Winter <br> Collection 2023</h1>
            <p>There's Nothing like Trend</p>
            
            <a href="#" class="main-btn">Show Now <i class='bx bx-right-arrow-alt' ></i></a>

        </div>
        
        <div class="down-arrow">
            <a href="#trending" class="down"><i class='bx bx-down-arrow-alt' ></i></a>
        </div>

    </section>

    <section class="trending-product" id="trending">
        <div class="center-text">
            <h2>Our Trending <span>Products</span></h2>
        </div>

        <div class="products">
            <div class="row">
                <img src="images/1.jpg" alt="">
                <div class="product-text">
                    <h5>Sale</h5>
                </div>
                <div class="heart-icon">
                    <i class='bx bx-heart' ></i>
                </div>
                <div class="ratting">
                    <i class='bx bx-star' ></i>
                    <i class='bx bx-star' ></i>
                    <i class='bx bx-star' ></i>
                    <i class='bx bx-star' ></i>
                    <i class='bx bxs-star-half'></i>
                </div>
                <div class="price">
                    <h4>Half Running Set</h4>
                    <p>$99 - $129</p>
                </div>
            </div>
            <div class="row">
                <img src="images/2.jpg" alt="">
                <div class="product-text">
                    <h5>Sale</h5>
                </div>
                <div class="heart-icon">
                    <i class='bx bx-heart' ></i>
                </div>
                <div class="ratting">
                    <i class='bx bx-star' ></i>
                    <i class='bx bx-star' ></i>
                    <i class='bx bx-star' ></i>
                    <i class='bx bx-star' ></i>
                    <i class='bx bxs-star-half'></i>
                </div>
                <div class="price">
                    <h4>Half Running Suit</h4>
                    <p>$99 - $129</p>
                </div>
            </div>
            <div class="row">
                <img src="images/3.jpg" alt="">
                <div class="product-text">
                    <h5>Sale</h5>
                </div>
                <div class="heart-icon">
                    <i class='bx bx-heart' ></i>
                </div>
                <div class="ratting">
                    <i class='bx bx-star' ></i>
                    <i class='bx bx-star' ></i>
                    <i class='bx bx-star' ></i>
                    <i class='bx bx-star' ></i>
                    <i class='bx bxs-star-half'></i>
                </div>
                <div class="price">
                    <h4>Half Running Lady</h4>
                    <p>$99 - $129</p>
                </div>
            </div>
            <div class="row">
                <img src="images/4.jpg" alt="">
                <div class="product-text">
                    <h5>Sale</h5>
                </div>
                <div class="heart-icon">
                    <i class='bx bx-heart' ></i>
                </div>
                <div class="ratting">
                    <i class='bx bx-star' ></i>
                    <i class='bx bx-star' ></i>
                    <i class='bx bx-star' ></i>
                    <i class='bx bx-star' ></i>
                    <i class='bx bxs-star-half'></i>
                </div>
                <div class="price">
                    <h4>Gown Wear</h4>
                    <p>$99 - $129</p>
                </div>
            </div>
            <div class="row">
                <img src="images/5.jpg" alt="">
                <div class="product-text">
                    <h5>Sale</h5>
                </div>
                <div class="heart-icon">
                    <i class='bx bx-heart' ></i>
                </div>
                <div class="ratting">
                    <i class='bx bx-star' ></i>
                    <i class='bx bx-star' ></i>
                    <i class='bx bx-star' ></i>
                    <i class='bx bx-star' ></i>
                    <i class='bx bxs-star-half'></i>
                </div>
                <div class="price">
                    <h4>Half Jump Shirt</h4>
                    <p>$99 - $129</p>
                </div>
            </div>
            <div class="row">
                <img src="images/6.jpg" alt="">
                <div class="product-text">
                    <h5>Hot</h5>
                </div>
                <div class="heart-icon">
                    <i class='bx bx-heart' ></i>
                </div>
                <div class="ratting">
                    <i class='bx bx-star' ></i>
                    <i class='bx bx-star' ></i>
                    <i class='bx bx-star' ></i>
                    <i class='bx bx-star' ></i>
                    <i class='bx bxs-star-half'></i>
                </div>
                <div class="price">
                    <h4>Fancy Salwar Suits</h4>
                    <p>$99 - $129</p>
                </div>
            </div>
            <div class="row">
                <img src="images/7.jpg" alt="">
                <div class="product-text">
                    <h5>Sale</h5>
                </div>
                <div class="heart-icon">
                    <i class='bx bx-heart' ></i>
                </div>
                <div class="ratting">
                    <i class='bx bx-star' ></i>
                    <i class='bx bx-star' ></i>
                    <i class='bx bx-star' ></i>
                    <i class='bx bx-star' ></i>
                    <i class='bx bxs-star-half'></i>
                </div>
                <div class="price">
                    <h4>Printer Straight Kurta</h4>
                    <p>$99 - $129</p>
                </div>
            </div>
            <div class="row">
                <img src="images/8.jpg" alt="">
                <div class="product-text">
                    <h5>Sale</h5>
                </div>
                <div class="heart-icon">
                    <i class='bx bx-heart' ></i>
                </div>
                <div class="ratting">
                    <i class='bx bx-star' ></i>
                    <i class='bx bx-star' ></i>
                    <i class='bx bx-star' ></i>
                    <i class='bx bx-star' ></i>
                    <i class='bx bxs-star-half'></i>
                </div>
                <div class="price">
                    <h4>Coll Full Dears</h4>
                    <p>$99 - $129</p>
                </div>
            </div>

        </div>

    </section>


<!--Client Review Section-->

<section class="client-reviews">
    <div class="reviews">
        <h3>Client Reviews</h3>
        <img src="images/team-1.jpg" alt="">
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat, asperiores eaque dolorem <br> 
            laboriosam dolores vel molestiae aut sapiente assumenda maiores qui esse nisi <br>
             praesentium quo facilis molestias officiis ratione vero magnam <br>
             necessitatibus at odio illum. Magnam molestiae dolorem nesciunt hic!</p>

        <h2>James Ola</h2>
        <p>Creative Director</p>
    </div>
</section>

<!--update-news-section-->
<section class="Update-news">
    <div class="up-center-text">
        <h2>New Updates</h2>
    </div>

    <div class="update-cart">

        <div class="cart">
        <img src="images/bl-1.png" alt="">
        <h5>30 April 2023</h5>
        <h4>Let's start bring sale on this summer vaction.</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A ullam in necessitatibus dolor perspiciatis earum distinctio libero magni. Unde, rerum!</p>
        <h6>Continue Reading...</h6>
         </div>

         <div class="cart">
            <img src="images/bl-2.png" alt="">
            <h5>30 April 2023</h5>
            <h4>Let's start bring sale on this summer vaction.</h4>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum ea voluptatem labore? Consequuntur, repellendus eaque itaque animi aliquam qui excepturi?</p>
            <h6>Continue Reading...</h6>
             </div>

             <div class="cart">
                <img src="images/bl-3.png" alt="">
                <h5>30 April 2023</h5>
                <h4>Let's start bring sale on this summer vaction.</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil eligendi ipsa esse nostrum culpa placeat illo voluptates eum, asperiores perferendis?</p>
                <h6>Continue Reading...</h6>
                 </div>
   
    </div>

</section>

<!--Contact Section-->
<section class="contact">
    <div class="contact-info">
        <div class="first-info">
            <img src="images/Cortouch-Media-logo-new.png" alt="">
            <p>6th Floor Lister Building <br> Ring Road, Ibadan Oyo State</p>
            <p>+2348067473244</p>
            <p>info@cortouchmedia.com.ng</p>

            <div class="social-icon">
                <a href=""><i class='bx bxl-facebook' ></i></a>
                <a href=""><i class='bx bxl-twitter' ></i></a>
                <a href=""><i class='bx bxl-instagram' ></i></a>
                <a href=""><i class='bx bxl-linkedin' ></i></a>
            </div>

        </div>
        <div class="second-info">
            <h4>Support</h4>
            <p>Contact us</p>
            <p>About page</p>
            <p>Size Guide</p>
            <p>Shopping & Returns</p>
            <p>Privacy</p>
        </div>

        <div class="third-info">
            <h4>Shop</h4>
            <p>Men's Shopping</p>
            <p>Women's Shopping</p>
            <p>Kid's Shopping</p>
            <p>Furniture</p>
            <p>Discount</p>
        </div>

        <div class="fourth-info">
            <h4>Compay</h4>
            <p>About</p>
            <p>Blog</p>
            <p>Affiliate</p>
            <p>Login</p>
        </div>

        <div class="five">
            <h4>Subscribe</h4>
            <p>Receive Updates, Hot Deals, Discount Sent Straight in Your inbox Daily</p>
            <form action="">
                <input type="email" placeholder="Obafemi.james@gmail.com" name="em" id='em' required>
                <button class="register" type="submit">Submit</button>
            </form>
        </div>
    </div>

</section>
<input type="text">

<div class="end-text">
<p>Copyright © @2023. All Rights Reserved. Developed by Obafemi James</p>
</div>


<script src="java.js"></script



</body>
</html>