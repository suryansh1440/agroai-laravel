<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') - AgroAI</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body { font-family: 'Outfit', sans-serif; background-color: #f5f3e7; }
            .premium-card { background: white; border: 1px border-stone-200/50; transition: all 0.3s ease; }
            .premium-card:hover { transform: translateY(-5px); box-shadow: 0 20px 40px rgba(0,0,0,0.05); }
        </style>
    </head>
    <body class="antialiased text-stone-900">
        <x-guest-navbar />

        <main class="pt-12 pb-24">
            @yield('content')
        </main>

        <x-footer />
    </body>
</html>
