<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SIM Telur') }} - Login</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased overflow-hidden">
        <div class="min-h-screen flex flex-col sm:flex-row">
            
            <div class="hidden sm:flex sm:w-1/2 relative bg-gray-900 justify-center items-center overflow-hidden">
                <img src="{{ asset('images/login-cover2.jpeg') }}" 
                     alt="Login Cover Peternakan" 
                     class="absolute inset-0 w-full h-full object-cover object-center">
            </div>

            <div class="w-full sm:w-1/2 flex justify-center items-center bg-gray-50 p-6">
                <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
                    <div class="sm:hidden flex justify-center mb-6">
                        <svg class="w-16 h-16 text-primary-500" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C8.13401 2 5 6.47715 5 12C5 17.5228 8.13401 22 12 22C15.866 22 19 17.5228 19 12C19 6.47715 15.866 2 12 2Z" />
                        </svg>
                    </div>
                    <div class="text-center mb-8 sm:text-left">
                        <h2 class="text-2xl font-bold text-gray-800">Selamat Datang! 👋</h2>
                        <p class="text-gray-500 mt-2 text-sm">Silakan login untuk mengakses sistem</p>
                    </div>

                    {{ $slot }}

                </div>
            </div>
        </div>
    </body>
</html>