<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/act.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <!-- Sign In Form -->
    <div class="container" id="signin">
        <h1 class="form-title">Sign In</h1>
        <form method="POST" action="#">
            @csrf
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="signin_email" placeholder="Email" required>
                <label for="signin_email">Email</label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="signin_password" placeholder="Password" required>
                <label for="signin_password">Password</label>
            </div>
            <p class="recover">
                <a href="#">Recover password</a>
            </p>
            <input type="submit" class="btn" value="Sign In">
        </form>

        <p class="or">------- or -------</p>
        <div class="icos">
            <i class="fab fa-google"></i>
            <i class="fab fa-facebook"></i>
        </div>
        <div class="links">
            <p>Don't have an account yet?</p>
            <button onclick="switchForm('signup')">Sign up</button>
        </div>
    </div>

    <script>
        function switchForm(formId) {
            document.getElementById('signup').classList.remove('active');
            document.getElementById('signin').classList.remove('active');
            document.getElementById(formId).classList.add('active');
        }
    </script>
</body>
</html>