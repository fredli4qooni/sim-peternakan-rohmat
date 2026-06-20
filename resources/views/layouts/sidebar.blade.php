<div x-show="sidebarOpen" class="fixed inset-0 z-40 transition-opacity bg-black opacity-50 lg:hidden print:hidden" @click="sidebarOpen = false" style="display: none;"></div>

<div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed inset-y-0 left-0 z-50 w-64 overflow-y-auto transition duration-300 transform bg-amber-600 lg:translate-x-0 lg:static lg:inset-0 shadow-xl border-r border-amber-700 print:hidden">

    <button @click="sidebarOpen = false" class="absolute top-4 right-4 text-white hover:text-amber-200 lg:hidden focus:outline-none z-50">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>

    <div class="flex items-center justify-center mt-6 mb-6 px-4">
        <div class="flex items-center w-full">
            <img src="{{ asset('images/logo/chicken2.png') }}"
                alt="Logo Ayam"
                class="w-12 h-12 drop-shadow-md flex-shrink-0 object-contain">

            <span class="ml-3 text-[15px] font-extrabold text-white leading-tight tracking-wide drop-shadow-md">
                SIM Produksi & <br /> Penjualan Telur
            </span>
        </div>
    </div>

    <div class="flex flex-col px-4 mt-2">
        <div class="mb-2 px-4 text-xs font-bold tracking-wider text-amber-200 uppercase hidden lg:block">Menu Utama</div>

        <a class="hidden lg:flex items-center px-4 py-3 mt-1 text-white rounded-lg hover:bg-amber-700 hover:shadow-inner transition-colors {{ request()->routeIs('dashboard') ? 'bg-amber-700 font-bold border-l-4 border-white shadow-inner' : 'font-medium' }}" href="{{ route('dashboard') }}">
            <svg class="w-5 h-5 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
            </svg>
            <span class="mx-3">Dashboard</span>
        </a>

        <a class="hidden lg:flex items-center px-4 py-3 mt-2 text-white rounded-lg hover:bg-amber-700 hover:shadow-inner transition-colors {{ request()->routeIs('pelanggans.*') ? 'bg-amber-700 font-bold border-l-4 border-white shadow-inner' : 'font-medium' }}" href="{{ route('pelanggans.index') }}">
            <svg class="w-5 h-5 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
            <span class="mx-3">Pelanggan/Agen</span>
        </a>

        <a class="hidden lg:flex items-center px-4 py-3 mt-2 text-white rounded-lg hover:bg-amber-700 hover:shadow-inner transition-colors {{ request()->routeIs('produksis.*') ? 'bg-amber-700 font-bold border-l-4 border-white shadow-inner' : 'font-medium' }}" href="{{ route('produksis.index') }}">
            <svg class="w-5 h-5 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
            </svg>
            <span class="mx-3">Produksi Telur</span>
        </a>

        <a class="hidden lg:flex items-center px-4 py-3 mt-2 text-white rounded-lg hover:bg-amber-700 hover:shadow-inner transition-colors {{ request()->routeIs('populasi_ayams.*') ? 'bg-amber-700 font-bold border-l-4 border-white shadow-inner' : 'font-medium' }}" href="{{ route('populasi_ayams.index') }}">
            <svg class="w-5 h-5 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
            </svg>
            <span class="mx-3">Populasi Ayam</span>
        </a>

        <a class="hidden lg:flex items-center px-4 py-3 mt-2 text-white rounded-lg hover:bg-amber-700 hover:shadow-inner transition-colors {{ request()->routeIs('penjualans.*') ? 'bg-amber-700 font-bold border-l-4 border-white shadow-inner' : 'font-medium' }}" href="{{ route('penjualans.index') }}">
            <svg class="w-5 h-5 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
            <span class="mx-3">Penjualan</span>
        </a>

        @if(Auth::user()->role === 'pemilik')
        <div class="mt-8 mb-2 px-4 text-xs font-bold tracking-wider text-amber-200 uppercase">Master Data & Ops</div>

        <a class="flex items-center px-4 py-3 mt-2 text-white rounded-lg hover:bg-amber-700 hover:shadow-inner transition-colors {{ request()->routeIs('pengeluarans.*') ? 'bg-amber-700 font-bold border-l-4 border-white shadow-inner' : 'font-medium' }}" href="{{ route('pengeluarans.index') }}">
            <svg class="w-5 h-5 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z"></path>
            </svg>
            <span class="mx-3">Pengeluaran Ops</span>
        </a>

        <a class="flex items-center px-4 py-3 mt-2 text-white rounded-lg hover:bg-amber-700 hover:shadow-inner transition-colors {{ request()->routeIs('users.*') ? 'bg-amber-700 font-bold border-l-4 border-white shadow-inner' : 'font-medium' }}" href="{{ route('users.index') }}">
            <svg class="w-5 h-5 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
            </svg>
            <span class="mx-3">Manajemen User</span>
        </a>

        <div class="mt-8 mb-2 px-4 text-xs font-bold tracking-wider text-amber-200 uppercase">Laporan</div>

        <a class="flex items-center px-4 py-3 mt-1 text-white rounded-lg hover:bg-amber-700 hover:shadow-inner transition-colors {{ request()->routeIs('laporan.laba_rugi') ? 'bg-amber-700 font-bold border-l-4 border-white shadow-inner' : 'font-medium' }}" href="{{ route('laporan.laba_rugi') }}">
            <svg class="w-5 h-5 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <span class="mx-3">Laba / Rugi</span>
        </a>

        <a class="flex items-center px-4 py-3 mt-1 text-white rounded-lg hover:bg-amber-700 hover:shadow-inner transition-colors {{ request()->routeIs('laporan.produksi') ? 'bg-amber-700 font-bold border-l-4 border-white shadow-inner' : 'font-medium' }}" href="{{ route('laporan.produksi') }}">
            <svg class="w-5 h-5 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <span class="mx-3">Laporan Produksi</span>
        </a>

        <a class="flex items-center px-4 py-3 mt-1 text-white rounded-lg hover:bg-amber-700 hover:shadow-inner transition-colors {{ request()->routeIs('laporan.penjualan') ? 'bg-amber-700 font-bold border-l-4 border-white shadow-inner' : 'font-medium' }}" href="{{ route('laporan.penjualan') }}">
            <svg class="w-5 h-5 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <span class="mx-3">Laporan Penjualan</span>
        </a>
        @endif

        <div class="mt-10 pt-4 border-t border-amber-700 mb-6">
            <div class="px-4 text-xs text-amber-100">
                Login sebagai: <br />
                <span class="text-white font-extrabold uppercase tracking-wide text-sm">{{ Auth::user()->role }}</span>
            </div>
        </div>
    </div>
</div>