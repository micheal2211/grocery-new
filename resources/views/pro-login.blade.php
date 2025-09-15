<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pro Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --green: #27ae60;
            --orange: #f39c12;
            --red: #e74c3c;
            --black: #333;
            --light-color: #666;
            --white: #fff;
            --light-bg: #f6f6f6;
            --border: 2px solid var(--black);
            --box-shadow: 0 .5rem 1rem rgba(0,0,0,.1);
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
        
        *::-webkit-scrollbar {
            height: 5px;
            width: 10px;
        }
        
        *::-webkit-scrollbar-track {
            background-color: transparent;
        }
        
        *::-webkit-scrollbar-thumb {
            background-color: var(--green);
            border-radius: 5px;
        }
        
        body {
            background-color: var(--light-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 2rem;
        }
        
        .form-container {
            background-color: var(--white);
            border-radius: 0.5rem;
            border: var(--border);
            box-shadow: var(--box-shadow);
            padding: 3rem;
            width: 100%;
            max-width: 50rem;
        }
        
        .form-container h3 {
            text-align: center;
            margin-bottom: 2rem;
            text-transform: uppercase;
            color: var(--black);
            font-size: 2.5rem;
        }
        
        .form-container form {
            margin: 0 auto;
            max-width: 40rem;
        }
        
        .form-container .box {
            width: 100%;
            margin: 1rem 0;
            padding: 1.2rem 1.4rem;
            font-size: 1.6rem;
            color: var(--black);
            border-radius: 0.5rem;
            background-color: var(--light-bg);
            border: var(--border);
            transition: all 0.3s ease;
        }
        
        .form-container .box:focus {
            border-color: var(--green);
            box-shadow: 0 0 0 0.2rem rgba(39, 174, 96, 0.25);
        }
        
        .form-container .btn {
            display: block;
            width: 100%;
            margin-top: 1.5rem;
            border-radius: 5rem;
            color: var(--white);
            font-size: 1.8rem;
            padding: 1.2rem 3rem;
            text-transform: capitalize;
            cursor: pointer;
            text-align: center;
            background-color: var(--green);
            transition: all 0.3s ease;
        }
        
        .form-container .btn:hover {
            background-color: var(--black);
            transform: translateY(-3px);
            box-shadow: 0 0.5rem 1.5rem rgba(0,0,0,0.2);
        }
        
        .form-container p {
            margin-top: 2rem;
            font-size: 1.6rem;
            color: var(--light-color);
            text-align: center;
        }
        
        .form-container p a {
            color: var(--green);
            text-decoration: underline;
            transition: all 0.3s ease;
        }
        
        .form-container p a:hover {
            color: var(--black);
        }
        
        /* Message Styles */
        .message {
            padding: 1.5rem;
            margin-bottom: 2rem;
            border-radius: 0.5rem;
            font-size: 1.6rem;
            text-align: center;
        }
        
        .message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .error-list {
            list-style: none;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border-radius: 0.5rem;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            font-size: 1.6rem;
        }
        
        .error-list li {
            margin: 0.5rem 0;
            display: flex;
            align-items: center;
        }
        
        .error-list li:before {
            content: "⚠";
            margin-right: 0.8rem;
            font-size: 1.8rem;
        }
        
        /* Responsive styles */
        @media (max-width: 768px) {
            .form-container {
                padding: 2rem;
            }
            
            .form-container h3 {
                font-size: 2.2rem;
            }
        }
        
        @media (max-width: 450px) {
            body {
                padding: 1.5rem;
            }
            
            .form-container {
                padding: 1.5rem;
            }
            
            .form-container h3 {
                font-size: 2rem;
            }
            
            .form-container .btn {
                font-size: 1.6rem;
                padding: 1rem 2rem;
            }
        }
        
        /* Decorative elements */
        .form-container::before {
            content: "";
            position: absolute;
            top: -0.5rem;
            left: -0.5rem;
            right: -0.5rem;
            bottom: -0.5rem;
            z-index: -1;
            background: linear-gradient(45deg, var(--green), var(--orange), var(--red), var(--green));
            background-size: 400% 400%;
            border-radius: 0.8rem;
            animation: gradientShift 15s ease infinite;
            opacity: 0.1;
            filter: blur(0.5rem);
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .logo {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .logo i {
            font-size: 3.5rem;
            color: var(--green);
            margin-bottom: 1rem;
        }
        
        .logo h1 {
            font-size: 2.4rem;
            color: var(--black);
            font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="logo">
            <i class="fas fa-store"></i>
            <h1>GroceryMate</h1>
        </div>
        
        <!-- Show session success message -->
        <div class="message success" style="display: {{ session('message') ? 'block' : 'none' }};">
            {{ session('message') }}
        </div>

        <!-- Show error messages -->
        @if($errors->any())
            <ul class="error-list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('pro-login.submit') }}">
            @csrf
            <h3>Login Now</h3>

            <input type="email" name="email" class="box" placeholder="Enter your email" required value="{{ old('email') }}">
            <input type="password" name="password" class="box" placeholder="Enter your password" required>
            
            <input type="submit" value="Login Now" class="btn">

            <p>Don't have an account? <a href="{{ route('projectR.form') }}">Sign up</a></p>
        </form>
    </div>

    <script>
        // Add some interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            const boxes = document.querySelectorAll('.box');
            const btn = document.querySelector('.btn');
            
            // Add focus effects to input boxes
            boxes.forEach(box => {
                box.addEventListener('focus', function() {
                    this.style.transform = 'translateY(-2px)';
                    this.style.boxShadow = '0 0.5rem 1rem rgba(0,0,0,0.1)';
                });
                
                box.addEventListener('blur', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = 'none';
                });
            });
            
            // Add animation to button on hover
            btn.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-3px)';
                this.style.boxShadow = '0 0.5rem 1.5rem rgba(0,0,0,0.2)';
            });
            
            btn.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = 'none';
            });
        });
    </script>
</body>
</html>