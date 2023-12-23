<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#062e3f">
    <meta name="Description" content="Registration Page">

    <!-- Google Font: Work Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/corner.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/register.css') }}"> <!-- Custom register page styles -->

    <title>Register - Just Do It</title>
</head>

<body class="standard"> <!-- Apply the standard theme by default -->

<div id="header">
    <div class="flexrow-container">
        <div class="standard-theme theme-selector"></div>
        <div class="light-theme theme-selector"></div>
        <div class="darker-theme theme-selector"></div>
    </div>
    <h1 id="title">Just do it.<div id="border"></div></h1>
</div>

<div id="register-form" class="form-container">
    <form class="form-container-register" method="POST" action="/user">
        @csrf
        <h2>Register</h2>
        <div class="input-container">
            <label for="name"><i class="fas fa-user"></i> Username</label>
            <input class="register-input" type="text" id="username" name="name" placeholder="Enter your username">
        </div>
        <div class="input-container">
            <label for="email"><i class="fas fa-envelope"></i> Email</label>
            <input class="register-input" type="email" id="email" name="email" placeholder="Enter your email">
        </div>
        <div class="input-container">
            <label for="password"><i class="fas fa-lock"></i> Password</label>
            <input class="register-input" type="password" id="password" name="password" placeholder="Enter your password">
        </div>
        <div class="input-container">
            <label for="password_confirmation"><i class="fas fa-lock"></i> Confirm Password</label>
            <input class="register-input" type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password">
        </div>
        <button class="register-btn" type="submit">Register</button>
        @error('username')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
        @error('email')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
        @error('password')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </form>
</div>

<!-- JavaScript files -->
<script src="JS/time.js"></script>
<script src="JS/main.js" type="text/javascript"></script>
<div class="register-link">
    <p>If you already have an account, please, <a href="/login">click here</a> to Login.</p>
</div>
</body>

</html>
