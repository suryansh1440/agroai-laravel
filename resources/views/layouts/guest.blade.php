<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'AgroAI') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body { font-family: 'Outfit', sans-serif; }
        </style>
    </head>
    <body class="antialiased bg-[#f5f3e7] text-stone-900 h-full overflow-hidden">
        
        <div class="h-full flex flex-col">
            <!-- Top Navbar -->
            <x-guest-navbar class="flex-shrink-0" />

            <!-- Main Split Content -->
            <div class="flex-grow flex items-stretch">
                <!-- Left Side: Illustration (Full Bleed) -->
                <div class="hidden lg:flex w-[48%] relative bg-[#d9f99d]/10 items-center justify-center overflow-hidden border-r border-stone-100">
                    <img src="{{ asset('auth_illustration.png') }}" alt="Agriculture Illustration" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent to-white/10"></div>
                </div>

                <!-- Right Side: Form (Optimized Spacing) -->
                <div class="w-full lg:w-[52%] bg-white flex items-center justify-center p-6 xl:p-12 overflow-y-auto">
                    <div class="w-full max-w-[440px] py-2">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
        
        <style>
            @keyframes bounce-slow {
                0%, 100% { transform: translateY(0); }
                50% { transform: translateY(-20px); }
            }
            .animate-bounce-slow { animation: bounce-slow 4s ease-in-out infinite; }
        </style>
    </body>
</html>
