<?php
include 'connect.php';


if (isset($_POST['add_to_wishlist'])) {
    $pid     = filter_var($_POST['pid'], FILTER_SANITIZE_STRING);
    $p_name  = filter_var($_POST['p_name'], FILTER_SANITIZE_STRING);
    $p_price = filter_var($_POST['p_price'], FILTER_SANITIZE_STRING);
    $p_image = filter_var($_POST['p_image'], FILTER_SANITIZE_STRING);

    $check_wishlist = $conn->prepare("SELECT * FROM wishlist WHERE name = ? AND user_id = ?");
    $check_wishlist->execute([$p_name, $user_id]);

    $check_cart = $conn->prepare("SELECT * FROM cart WHERE name = ? AND user_id = ?");
    $check_cart->execute([$p_name, $user_id]);

    if ($check_wishlist->rowCount() > 0) {
        $message[] = 'Already added to wishlist!';
    } elseif ($check_cart->rowCount() > 0) {
        $message[] = 'Already added to cart!';
    } else {
        $insert_wishlist = $conn->prepare("INSERT INTO wishlist(user_id, pid, name, price, image) VALUES(?, ?, ?, ?, ?)");
        $insert_wishlist->execute([$user_id, $pid, $p_name, $p_price, $p_image]);
        $message[] = 'Added to wishlist!';
    }
}

if (isset($_POST['add_to_cart'])) {
    $pid     = filter_var($_POST['pid'], FILTER_SANITIZE_STRING);
    $p_name  = filter_var($_POST['p_name'], FILTER_SANITIZE_STRING);
    $p_price = filter_var($_POST['p_price'], FILTER_SANITIZE_STRING);
    $p_image = filter_var($_POST['p_image'], FILTER_SANITIZE_STRING);
    $p_qty   = filter_var($_POST['p_qty'], FILTER_SANITIZE_STRING);

    $check_cart = $conn->prepare("SELECT * FROM cart WHERE name = ? AND user_id = ?");
    $check_cart->execute([$p_name, $user_id]);

    if ($check_cart->rowCount() > 0) {
        $message[] = 'Already added to cart!';
    } else {
        // Optional: Remove from wishlist if present
        $check_wishlist = $conn->prepare("SELECT * FROM wishlist WHERE name = ? AND user_id = ?");
        $check_wishlist->execute([$p_name, $user_id]);

        if ($check_wishlist->rowCount() > 0) {
            $delete_wishlist = $conn->prepare("DELETE FROM wishlist WHERE name = ? AND user_id = ?");
            $delete_wishlist->execute([$p_name, $user_id]);
        }

        $insert_cart = $conn->prepare("INSERT INTO cart(user_id, pid, name, price, quantity, image) VALUES(?, ?, ?, ?, ?, ?)");
        $insert_cart->execute([$user_id, $pid, $p_name, $p_price, $p_qty, $p_image]);
        $message[] = 'Added to cart!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/projectR.css') }}">
    <style>
    /* ============ QUICK VIEW PAGE ============ */

.quick-view {
  padding: 2rem;
}

.quick-view .title {
  text-align: center;
  font-size: 2.5rem;
  color: var(--black);
  margin-bottom: 2rem;
  text-transform: capitalize;
}

.quick-view .box {
  max-width: 600px;
  margin: 0 auto;
  background: #fff;
  border: var(--border);
  border-radius: .5rem;
  padding: 2rem;
  text-align: center;
  box-shadow: var(--box-shadow);
  transition: transform 0.2s ease;
}

.quick-view .box:hover {
  transform: translateY(-4px);
}

.quick-view .box img {
  height: 250px;
  width: 100%;
  object-fit: contain;
  margin-bottom: 1rem;
}

.quick-view .box .price {
  font-size: 2rem;
  font-weight: bold;
  color: var(--orange);
  margin-bottom: 1rem;
}

.quick-view .box .name {
  font-size: 2rem;
  font-weight: 600;
  color: var(--black);
  margin-bottom: .5rem;
}

.quick-view .box .details {
  font-size: 1.5rem;
  color: var(--light-color);
  line-height: 1.6;
  margin-bottom: 1.5rem;
}

.quick-view .box .qty {
  width: 80px;
  padding: .8rem;
  border: var(--border);
  border-radius: .5rem;
  font-size: 1.5rem;
  margin: 1rem 0;
  text-align: center;
}

.quick-view .box .option-btn {
  display: inline-block;
  margin: .5rem;
  padding: 1rem 2rem;
  border-radius: .5rem;
  font-size: 1.6rem;
  cursor: pointer;
  transition: background .2s ease;
}

.quick-view .box .option-btn[name="add_to_wishlist"] {
  background: var(--green);
  color: #fff;
}

.quick-view .box .option-btn[name="add_to_cart"] {
  background: var(--orange);
  color: #fff;
}

.quick-view .box .option-btn:hover {
  opacity: .9;
}

/* Responsive */
@media (max-width: 768px) {
  .quick-view .box {
    padding: 1.5rem;
  }
  .quick-view .box img {
    height: 200px;
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
    <?php include('header.php'); ?>
    <section class="quick-view">
    <h1 class="title">quick view</h1>

    <?php
    $pid = isset($_GET['pid']) ? $_GET['pid'] : null;

    if ($pid) {
        $select_products = $conn->prepare("SELECT * FROM products WHERE ID = ?");
        $select_products->execute([$pid]);

        if ($select_products->rowCount() > 0) {
            while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <form action="" class="box" method="POST">
        <div class="price">$<span><?= $fetch_products['price']; ?></span>/-</div>
        <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
        <div class="name"><?= $fetch_products['name']; ?></div>
        <div class="details"><?= $fetch_products['details']; ?></div>

        <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
        <input type="hidden" name="p_name" value="<?= $fetch_products['name']; ?>">
        <input type="hidden" name="p_price" value="<?= $fetch_products['price']; ?>">
        <input type="hidden" name="p_image" value="<?= $fetch_products['image']; ?>">   
        
        <input type="number" min="1" value="1" name="p_qty" class="qty">
        <input type="submit" value="add to wishlist" class="option-btn" name="add_to_wishlist"> 
        <input type="submit" value="add to cart" class="option-btn" name="add_to_cart">     
    </form>
    <?php
            }
        } else {
            echo '<p class="empty">Product not found.</p>';
        }
    } else {
        echo '<p class="empty">No product selected.</p>';
    }
    ?>
</section>

    <?php include('footer.php'); ?>
</body>
</html>