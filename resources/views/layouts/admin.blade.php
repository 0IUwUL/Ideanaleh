<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ideanaleh</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css'>
        @vite(['resources/css/app.css'])
        
    </head>
    <body style = "overflow-y: hidden">

        <div class="load">
            <div class="ring"></div>
            <span>Loading...</span>
        </div>
        <div class="content">
            @yield('content')
        </div>
        
        @vite(['resources/js/app.js'])
        @vite(['resources/js/chart.js'])
    </body>
</html>
