<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#062e3f">
    <meta name="Description" content="Login Page">

    <!-- Google Font: Work Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/corner.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}" > <!-- Custom login page styles -->

    <title>Login - Just Do It</title>
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

<div id="login-form" class="form-container">
    <form class="form-container-login">
        <h2>Login</h2>
        <div class="input-container">
            <label for="username"><i class="fas fa-user"></i> Username or Email</label>
            <input class="login-input" type="text" id="username" name="email" placeholder="Enter your username or email">
        </div>
        <div class="input-container">
            <label for="password"><i class="fas fa-lock"></i> Password</label>
            <input class="login-input" type="password" id="password" name="password" placeholder="Enter your password">
        </div>
        <button class="login-btn" type="submit">Login</button>
        @error('email')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </form>
</div>

<!-- JavaScript files -->
<script src="JS/time.js"></script>
<script src="JS/main.js" type="text/javascript"></script>
</body>
</html>
