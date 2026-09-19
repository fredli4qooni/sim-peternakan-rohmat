<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Produksi dan Penjualan - Peternakan Ayam Rohmat') }} - Login</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased overflow-hidden">
        <div class="min-h-screen flex flex-col sm:flex-row">
            
            <div class="hidden sm:flex sm:w-1/2 relative bg-gray-900 justify-center items-center overflow-hidden">
                <img src="{{ asset('images/login-cover-4.png') }}" 
                     alt="Login Cover Peternakan Ayam Rohmat" 
                     class="absolute inset-0 w-full h-full object-cover object-left-top">
            </div>

            <div class="w-full sm:w-1/2 flex justify-center items-center bg-gray-50 p-6">
                <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
                    <div class="text-center sm:text-left mb-8">
                        <h2 class="text-2xl font-bold text-gray-800">Selamat Datang! 👋</h2>
                        <p class="text-gray-500 mt-2 text-sm">Silakan login untuk mengakses sistem</p>
                    </div>

                    {{ $slot }}

                </div>
            </div>
        </div>
    </body>
</html>