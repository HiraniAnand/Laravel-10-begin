<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Commerce</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('resources/css/form-style.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Scripts -->
    <script type="text/javascript" src="{{ URL::asset('resources/js/app.js') }}" ></script>

    <!-- Styles -->
</head>
<body>
    <header>
        <div class="container">
            <h1>Student Corner</h1>
            <nav class="navbar-part">
                <ul class="navbar-menu">
                    <li><a class="menu-link" href="{{ url('/') }}">Home</a></li>
                    <li><a class="menu-link" href="{{ url('/about') }}">About Us</a></li>
                    <li><a class="menu-link" href="{{ url('/contact') }}">Contact</a></li>
                    <li><a class="menu-link" href="{{ url('/products') }}">Products</a></li>
                    <li><a class="menu-link user-btn" href="{{ url('/login') }}"> <i class="fa fa-user" aria-hidden="true"></i> </a></li>
                </ul>
            </nav>
            <div class="sub-navbar navbar-part">
                <ul class="navbar-menu">
                    <li><a class="menu-link" href="{{ url('/login') }}">Login</a></li>
                    <li><a class="menu-link" href="{{ url('/register') }}">Register</a></li>
                </ul>
            </div>
        </div>
    </header>