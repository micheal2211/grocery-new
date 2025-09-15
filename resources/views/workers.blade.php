z<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/workers.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body>

    <div class="container active" id="signup">
        <h1 class="form-title">Register</h1>
        <form method="POST" action="{{ route('workers.submit') }}">
            @csrf

            <div class="input-group">
                <i class="fas fa-user"></i>
                <input
                    type="text"
                    name="first_name"
                    id="first_name"
                    placeholder="First Name"
                    value="{{ old('first_name') }}"
                    required
                />
                <label for="first_name">First Name</label>
            </div>

            <div class="input-group">
                <i class="fas fa-user"></i>
                <input
                    type="text"
                    name="last_name"
                    id="last_name"
                    placeholder="Last Name"
                    value="{{ old('last_name') }}"
                    required
                />
                <label for="last_name">Last Name</label>
            </div>

            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Email"
                    value="{{ old('email') }}"
                    required
                />
                <label for="email">Email</label>
            </div>

            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Password"
                    required
                />
                <label for="password">Password</label>
            </div>

            <div class="input-group">
                <i class="fas fa-globe"></i>
                <input
                    type="text"
                    name="country"
                    id="country"
                    placeholder="Country"
                    value="{{ old('country') }}"
                    required
                />
                <label for="country">Country</label>
            </div>

            <div class="input-group">
                <i class="fas fa-venus-mars"></i>
                <input
                    type="text"
                    name="sex"
                    id="sex"
                    placeholder="Sex"
                    value="{{ old('sex') }}"
                    required
                />
                <label for="sex">Sex</label>
            </div>

            <div class="input-group">
                <i class="fas fa-calendar"></i>
                <input
                    type="text"
                    name="age"
                    id="age"
                    placeholder="Age"
                    value="{{ old('age') }}"
                    required
                />
                <label for="age">Age</label>
            </div>

            <p class="recover">
                <a href="#">Recover password</a>
            </p>

            <input type="submit" class="btn" value="Sign In" />
        </form>
    </div>

</body>
</html>
