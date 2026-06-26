<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 font-semibold">
                    {{ __("Selamat Datang, ") }} {{ auth()->user()->name }} ({{ ucfirst(auth()->user()->role) }})!
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-blue-500">
                    <div class="p-6">
                        <div class="text-gray-500 text-sm font-bold uppercase tracking-wide mb-1">Total Stok Telur Terkini</div>
                        <div class="text-3xl font-extrabold text-blue-600">
                            {{ $stok ? number_format($stok->total_stok, 2, ',', '.') : 0 }} <span class="text-base font-normal text-gray-500">Kg</span>
                        </div>
                        <div class="text-sm font-semibold text-gray-500 mt-1">
                            &approx; {{ $stok ? number_format($stok->total_stok / 15, 1, ',', '.') : 0 }} Kotak
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-amber-500">
                    <div class="p-6">
                        <div class="text-gray-500 text-sm font-bold uppercase tracking-wide mb-1">Total Ayam Aktif</div>
                        <div class="text-3xl font-extrabold text-amber-600">
                            {{ $stok_ayam ? number_format($stok_ayam->total_aktif, 0, ',', '.') : 0 }} <span class="text-base font-normal text-gray-500">Ekor</span>
                        </div>
                    </div>
                </div>

                @if(auth()->user()->role === 'pemilik')
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-green-500">
                    <div class="p-6">
                        <div class="text-gray-500 text-sm font-bold uppercase tracking-wide mb-1">Penjualan Bulan Ini</div>
                        <div class="text-3xl font-extrabold text-green-600">
                            <span class="text-base font-normal text-gray-500">Rp</span> {{ number_format($penjualan_bulan_ini, 0, ',', '.') }}
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-l-4 border-red-500">
                    <div class="p-6">
                        <div class="text-gray-500 text-sm font-bold uppercase tracking-wide mb-1">Pengeluaran Bulan Ini</div>
                        <div class="text-3xl font-extrabold text-red-600">
                            <span class="text-base font-normal text-gray-500">Rp</span> {{ number_format($pengeluaran_bulan_ini, 0, ',', '.') }}
                        </div>
                    </div>
                </div>
                @endif
            </div>

            @if(auth()->user()->role === 'pemilik')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-700 mb-4">Grafik Penjualan Bulan Ini</h3>
                    <div id="grafik-container" data-grafik="{{ json_encode($grafik_penjualan) }}">
                        <canvas id="grafikPenjualan" height="100"></canvas>
                    </div>
                </div>
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold text-gray-700 mb-4">Akses Cepat</h3>
                    <div class="flex flex-wrap gap-4">
                        @if(in_array(auth()->user()->role, ['pemilik', 'karyawan']))
                        <a href="{{ route('penjualans.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded shadow">
                            + Catat Penjualan
                        </a>
                        <a href="{{ route('produksis.create') }}" class="bg-primary-500 hover:bg-primary-600 text-white font-bold py-2 px-4 rounded shadow">
                            + Catat Produksi
                        </a>
                        @endif

                        @if(in_array(auth()->user()->role, ['karyawan']))
                        <a href="{{ route('populasi_ayams.create') }}" class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-2 px-4 rounded shadow">
                            + Catat Populasi Ayam
                        </a>
                        @endif

                        @if(in_array(auth()->user()->role, ['pemilik']))
                        <a href="{{ route('pengeluarans.create') }}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded shadow">
                            + Catat Pengeluaran
                        </a>
                        
                        <a href="{{ route('laporan.laba_rugi') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded shadow">
                            Lihat Laporan Laba/Rugi
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(auth()->user()->role === 'pemilik')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('grafikPenjualan').getContext('2d');

            const container = document.getElementById('grafik-container');
            const rawData = container.getAttribute('data-grafik');
            const dataGrafik = JSON.parse(rawData);

            const labels = dataGrafik.map(item => 'Tgl ' + item.tanggal);
            const dataTotals = dataGrafik.map(item => item.total);

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Total Pendapatan (Rp)',
                        data: dataTotals,
                        borderColor: '#10B981',
                        backgroundColor: 'rgba(16, 185, 129, 0.2)',
                        borderWidth: 2,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
    @endif
</x-app-layout>