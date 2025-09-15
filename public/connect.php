<?php
$host = 'localhost';         
$dbname = 'projectr';  
$username = 'root';          
$password = '';             

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    session_start();

    // Use null if not set, or provide a better fallback strategy
    $user_id = $_SESSION['user_id'] ?? null;

} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>




