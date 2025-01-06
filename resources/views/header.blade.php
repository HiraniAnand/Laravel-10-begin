<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Commerce</title>

    <!-- Styles -->
    {{-- <link href="./css/app.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('./css/app.css') }}">

    <!-- Scripts -->
    <script src="../js/app.js" defer></script>
</head>
<body>
    <header>
        <div class="container">
            <h1>E-Commerce</h1>
            <nav>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/about') }}">About Us</a></li>
                    <li><a href="{{ url('/contact') }}">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>