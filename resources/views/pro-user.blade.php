<?php
include 'connect.php';

// Get current admin ID from session (if you have a login system)
$admin_id = $_SESSION['admin_id'] ?? null;

if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $delete_id = (int) $_GET['delete'];

    if ($delete_id === $admin_id) {
        echo "You cannot delete your own account!";
    } else {
        $delete_users = $conn->prepare("DELETE FROM users WHERE id = ?");
        if ($delete_users) {
            $delete_users->execute([$delete_id]);
            header('Location: admin_users.php');
            exit;
        } else {
            echo "Error preparing statement.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- head content -->
 <style>
 /* ===== General Reset ===== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    background: #f5f7fa;
    color: #333;
    font-size: 16px;
    line-height: 1.6;
}

/* ===== Section Styling ===== */
.user-accounts {
    max-width: 1200px;
    margin: 50px auto;
    padding: 30px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
}

.user-accounts .title {
    font-size: 28px;
    font-weight: 600;
    text-align: center;
    margin-bottom: 35px;
    text-transform: capitalize;
    color: #444;
}

/* ===== Box Container ===== */
.box-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 25px;
}

/* ===== Individual User Card ===== */
.box {
    background: #fafafa;
    border-radius: 12px;
    padding: 20px;
    text-align: center;
    border: 1px solid #eee;
    transition: 0.3s ease;
    position: relative;
}

.box:hover {
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    transform: translateY(-3px);
}

/* User Profile Image */
.box img {
    width: 90px;
    height: 90px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #ddd;
    margin-bottom: 15px;
    transition: 0.3s ease;
}
.box img:hover {
    border-color: #3498db;
}

/* User Info */
.box p {
    margin: 8px 0;
    font-size: 15px;
    color: #555;
}

.box p span {
    font-weight: 600;
    color: #222;
}

/* ===== Delete Button ===== */
.delete-btn {
    display: inline-block;
    margin-top: 15px;
    padding: 10px 20px;
    border-radius: 8px;
    background: #e74c3c;
    color: #fff;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    transition: 0.3s ease;
}

.delete-btn:hover {
    background: #c0392b;
}

/* ===== Responsive ===== */
@media (max-width: 768px) {
    .user-accounts {
        margin: 20px;
        padding: 20px;
    }
    .box-container {
        grid-template-columns: 1fr;
    }
}
</style>
</head>
<body>
<?php include('header.php'); ?>

<section class="user-accounts">
    <h1 class="title">user accounts</h1>
    <div class="box-container">
        <?php
        $select_users = $conn->prepare("SELECT * FROM users");
        $select_users->execute();

        while($fetch_users = $select_users->fetch(PDO::FETCH_ASSOC)){
            // Skip admin user if needed
            if ($fetch_users['id'] == $admin_id) continue;
        ?>
            <div class="box">
                <img src="uploaded_img/<?= htmlspecialchars($fetch_users['image']); ?>" alt="">
                <p> user id : <span><?= htmlspecialchars($fetch_users['id']); ?></span></p>
                <p> username : <span><?= htmlspecialchars($fetch_users['name']); ?></span></p>
                <p> email : <span><?= htmlspecialchars($fetch_users['email']); ?></span></p>
                <p> user type : <span><?= isset($fetch_users['user_type']) ? htmlspecialchars($fetch_users['user_type']) : 'N/A'; ?></span></p>
                <a href="pro-user.php?delete=<?= htmlspecialchars($fetch_users['id']); ?>" onclick="return confirm('delete this user?');" class="delete-btn">delete</a>
            </div>
        <?php } ?>
    </div>
</section>

<?php include('footer.php'); ?>
</body>
</html>

    