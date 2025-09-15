<?php

if (isset($_POST['submit'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $pass = $_POST['pass'];
    $cpass = $_POST['cname'];

    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/' . $image;

    $check = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $check->execute([$email]);

    if ($check->rowCount() > 0) {
        $message[] = 'User email already exists!';
    } elseif ($pass !== $cpass) {
        $message[] = 'Passwords do not match!';
    } else {
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
        $insert = $conn->prepare("INSERT INTO users (name, email, password, image) VALUES (?, ?, ?, ?)");
        $insert->execute([$name, $email, $hashed_pass, $image]);

        if ($insert) {
            if ($image_size > 2000000) {
                $message[] = 'Image size is too large!';
            } else {
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = 'Registered successfully!';
                header('Location: pro-login');
                exit;
            }
        }
    }
}
?>

<!-- resources/views/projectr.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/projectR.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
    /* Registration / Form Container */
.form-container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 4rem 2rem;
    min-height: 80vh;
    background: #f9f9f9;
}

.form-container form {
    background: #fff;
    padding: 2rem 2.5rem;
    border-radius: 1rem;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    width: 100%;
    max-width: 450px;
    text-align: center;
}

/* Heading */
.form-container h3 {
    font-size: 2rem;
    color: var(--black);
    margin-bottom: 1.5rem;
    text-transform: capitalize;
    letter-spacing: .5px;
}

/* Labels */
.form-container label {
    display: block;
    text-align: left;
    font-size: 1rem;
    font-weight: 500;
    margin-bottom: .5rem;
    color: #333;
}

/* Inputs */
.form-container input[type="text"],
.form-container input[type="email"],
.form-container input[type="password"],
.form-container input[type="file"] {
    width: 100%;
    padding: 0.9rem 1rem;
    border-radius: .6rem;
    border: 1px solid #ddd;
    margin-bottom: 1.2rem;
    font-size: 1rem;
    outline: none;
    transition: border-color .3s ease, box-shadow .3s ease;
}

.form-container input:focus {
    border-color: var(--green);
    box-shadow: 0 0 0 3px rgba(0,128,0,0.15);
}

/* Submit Button */
.form-container button {
    width: 100%;
    padding: 1rem;
    font-size: 1.1rem;
    border: none;
    border-radius: .6rem;
    background: var(--green);
    color: #fff;
    cursor: pointer;
    transition: background .3s ease, transform .2s ease;
}

.form-container button:hover {
    background: #068946;
    transform: translateY(-2px);
}

/* Login link */
.form-container p {
    margin-top: 1.5rem;
    font-size: .95rem;
    color: #555;
}

.form-container a {
    color: var(--green);
    text-decoration: none;
    font-weight: 600;
    transition: color .3s ease;
}

.form-container a:hover {
    color: var(--orange);
}

/* Messages */
.form-container .message {
    margin-bottom: 1rem;
    padding: .8rem 1rem;
    border-radius: .5rem;
    font-size: .95rem;
    font-weight: 500;
}

.form-container .message.success {
    background: #e6f9f0;
    color: #0d8246;
    border: 1px solid #0d8246;
}

.form-container .message.error {
    background: #ffeaea;
    color: #cc1f1f;
    border: 1px solid #cc1f1f;
}

/* Responsive */
@media (max-width: 500px) {
    .form-container form {
        padding: 1.5rem;
    }
    .form-container h3 {
        font-size: 1.6rem;
    }
}
</style>
</head>
<body>
    
@if(session('message'))
    <p style="color: green">{{ session('message') }}</p>
@endif

@if($errors->any())
    <ul style="color: red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif


<section class="form-container">
    <form action="{{ route('projectR.submit') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="registration">
        <h3>registration Form</h3>
    <label>Name:</label>
    <input type="text" name="name" value="{{ old('name') }}" required><br><br>

    <label>Email:</label>
    <input type="email" name="email" value="{{ old('email') }}" required><br><br>

    <label>Password:</label>
    <input type="password" name="password" required><br><br>

    <label>Confirm Password:</label>
    <input type="password" name="confirm_password" required><br><br>

    <label>Upload Image:</label>
    <input type="file" name="image" accept="image/*" required><br><br>

    <button type="submit">Register</button>

    <p>already have an account? <a href="pro-login">login now</a></p>
   

</form>
 </div>
</section>








</body>
</html>
