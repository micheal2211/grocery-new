<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/projectR.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    
</head>
<body>

    <div class="header">

        <div class="flex">
            <a href="admin_page.php" class="logo">Adimin <span>panel</span></a>

            <nav class="navbar">
                <a href="pro_home">home</a>
                <a href="pro-product">products</a>
                <a href="pro-orders">orders</a>
                <a href="pro-user">users</a>
                <a href="pro_contacts">messages</a>
            </nav>

            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
                <div id="user-btn" class="fas fa-users"></div>
                <a href="search_page.php" class="fas fa serch"></a>
               // <?php
                  //  $count_cart_items = $conn->prepare("SELECT * FROM 'cart' WHERE user_id = ?");
                  //  $count_cart_items->execute([$user_id]);
                  //  $count_wishlist_items = $conn->prepare("SELECT * FROM 'wishlist' WHERE user_id = ?");
                  //  $count_wishlist_items->rowCount([$user_id]);
                    
               // ?>
            

            </div>

            <div class="profile">
                <?php
                    //$select_profile = $conn->prepare("SELECT * FROM 'users' WHERE id = ?");
                   // $select_profile->execute([$admin_id])
                    //$fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                    //<?= $fetch_profile['name']; ?>//
                ?>
                <img src="images/2.jpg" alt=""> 
                <p>micheal</p>
                <a href="update-profile" class="btn">update profile</a>
                <a href="pro-logout" class="delete-btn">logout</a>
                <div class="flex-btn">
                    <a href="pro-login" class="option-btn">login</a>
                    <a href="projectR" class="option-btn">register now</a>
                </div>

            </div>

        </div>
    </div>
</body>
</html>
