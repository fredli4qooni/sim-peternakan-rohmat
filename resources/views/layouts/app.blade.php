<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SIM Telur') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @media print {
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            @page {
                margin: 1cm;
            }
        }
    </style>
</head>

<body class="font-sans antialiased text-gray-900 bg-gray-100 flex h-screen overflow-hidden print:h-auto print:overflow-visible print:bg-white print:block" x-data="{ sidebarOpen: false }">

    @include('layouts.sidebar')

    <div class="flex-1 flex flex-col overflow-hidden print:overflow-visible print:block relative">

        <header class="bg-white shadow-sm z-10 print:hidden">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <div class="flex items-center">
                    @isset($header)
                    {{ $header }}
                    @endisset
                </div>

                <div class="flex items-center">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none transition duration-150 ease-in-out">
                                <div class="mr-2 hidden sm:block">{{ Auth::user()->name }}</div>
                                <div class="w-8 h-8 rounded-full bg-primary-500 text-white flex items-center justify-center font-bold">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <svg class="ml-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </header>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 print:overflow-visible print:bg-white print:p-0 pb-16 lg:pb-0">
            {{ $slot }}
        </main>

        <nav class="lg:hidden fixed bottom-0 w-full bg-white border-t border-gray-200 flex justify-between shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)] z-30 print:hidden pb-safe">
            <a href="{{ route('dashboard') }}" class="flex flex-col items-center flex-1 py-2 {{ request()->routeIs('dashboard') ? 'text-amber-600' : 'text-gray-400 hover:text-amber-600' }}">
                <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                </svg>
                <span class="text-[10px] font-bold">Home</span>
            </a>

            <a href="{{ route('produksis.index') }}" class="flex flex-col items-center flex-1 py-2 {{ request()->routeIs('produksis.*') ? 'text-amber-600' : 'text-gray-400 hover:text-amber-600' }}">
                <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
                <span class="text-[10px] font-bold">Produksi</span>
            </a>

            <a href="{{ route('penjualans.index') }}" class="flex flex-col items-center flex-1 py-2 {{ request()->routeIs('penjualans.*') ? 'text-amber-600' : 'text-gray-400 hover:text-amber-600' }}">
                <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <span class="text-[10px] font-bold">Jual</span>
            </a>

            <a href="{{ route('pelanggans.index') }}" class="flex flex-col items-center flex-1 py-2 {{ request()->routeIs('pelanggans.*') ? 'text-amber-600' : 'text-gray-400 hover:text-amber-600' }}">
                <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <span class="text-[10px] font-bold">Agen</span>
            </a>

            @if(Auth::user()->role === 'karyawan')
            <a href="{{ route('pengeluarans.index') }}" class="flex flex-col items-center flex-1 py-2 {{ request()->routeIs('pengeluarans.*') ? 'text-amber-600' : 'text-gray-400 hover:text-amber-600' }}">
                <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z"></path>
                </svg>
                <span class="text-[10px] font-bold">Biaya</span>
            </a>
            @endif

            @if(Auth::user()->role === 'pemilik')
            <button @click="sidebarOpen = !sidebarOpen" class="flex flex-col items-center flex-1 py-2 text-gray-400 hover:text-amber-600 focus:outline-none">
                <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <span class="text-[10px] font-bold">Menu</span>
            </button>
            @endif

        </nav>
    </div>
</body>

</html>