<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ideanaleh</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>

        
        <!-- font-awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- owl carousel theme.css link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
        <!-- owl carousel js file -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        @vite(['resources/css/project.css'])

        {{-- bootstrap 5 icon --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    </head>
    <body class="antialiased">
        
        @yield('content')
        
        <script src="https://accounts.google.com/gsi/client" async defer></script>
        <!-- Change background dynamically -->
        <script>let bg = document.getElementById('product');
            bg.setAttribute('style', 'background-image: linear-gradient(rgba(0, 0, 0, 0.25), rgba(0, 154, 156,0.9)), url("{{asset('storage/'.$project['banner']);}}")');</script>
        @vite(['resources/js/app.js'])
        @vite(['resources/js/project.js'])
    </body>
</html>
