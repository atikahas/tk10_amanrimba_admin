<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="https://www.nicepng.com/png/full/450-4506999_tea-leaf-logo-clip-art-tea-leaves.png" type="image/png">

        <title>{{ config('app.name', 'AR Admin') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="w-full mx-auto">
            <div class="hero min-h-screen bg-base-200">
                <div class="hero-content text-center">
                    <div class="max-w-md">
                        {{-- <p><span class="loading loading-infinity loading-lg"></span></p> --}}
                        <div class="flex justify-center">
                            <img src="{{ asset('img/ARAdminLogo.png') }}" style="height: 120px">
                        </div>
                        
                        <p class="pb-6">Admin Aman Rimba Private Estate.</p>
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-outline">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>

                                {{-- @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-primary btn-outline">Register</a>
                                @endif --}}
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>