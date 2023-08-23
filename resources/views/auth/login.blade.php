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
                <div class="hero-content flex-col lg:flex-row-reverse">
                    <div class="text-center lg:text-left">
                        <h1 class="text-5xl font-bold">Login now!</h1>
                        <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
                    </div>
                    <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                            @csrf
                                <div class="form-control">
                                    <label class="label">
                                    <span class="label-text">Email</span>
                                    </label>
                                    <input placeholder="email" class="input input-bordered" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                </div>
                                <div class="form-control">
                                    <label class="label">
                                    <span class="label-text">Password</span>
                                    </label>
                                    <input placeholder="password" class="input input-bordered" type="password" name="password" required autocomplete="current-password"/>
                                </div>
                                <div class="form-control mt-6">
                                    <button class="btn btn-primary">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>