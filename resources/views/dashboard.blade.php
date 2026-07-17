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
                    <form action="{{ route('dashboard') }}" method="GET" class="flex flex-wrap space-x-4 items-end mb-6">
                        <div>
                            <label for="bulan" class="block text-sm font-medium text-gray-700">Bulan</label>
                            <select name="bulan" id="bulan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 sm:text-sm">
                                @for($i=1; $i<=12; $i++)
                                    <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}" {{ $bulan == str_pad($i, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                                        {{ \Carbon\Carbon::create()->month($i)->translatedFormat('F') }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div>
                            <label for="tahun" class="block text-sm font-medium text-gray-700">Tahun</label>
                            <select name="tahun" id="tahun" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 sm:text-sm">
                                @for($i=date('Y'); $i>=date('Y')-5; $i--)
                                    <option value="{{ $i }}" {{ $tahun == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded shadow">
                                Filter
                            </button>
                        </div>
                    </form>

                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold text-gray-700">Grafik Keuangan</h3>
                        <div>
                            <select id="chartTypeToggle" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 sm:text-sm">
                                <option value="penjualan">Lihat Grafik Penjualan</option>
                                <option value="pengeluaran">Lihat Grafik Pengeluaran</option>
                            </select>
                        </div>
                    </div>
                    
                    <div id="grafik-container" data-penjualan="{{ json_encode($grafik_penjualan) }}" data-pengeluaran="{{ json_encode($grafik_pengeluaran) }}">
                        <canvas id="grafikCanvas" height="100"></canvas>
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
            const ctx = document.getElementById('grafikCanvas').getContext('2d');
            const container = document.getElementById('grafik-container');
            const dataPenjualan = JSON.parse(container.getAttribute('data-penjualan'));
            const dataPengeluaran = JSON.parse(container.getAttribute('data-pengeluaran'));
            const chartToggle = document.getElementById('chartTypeToggle');
            
            let currentChart = null;

            function renderChart(type) {
                if (currentChart) {
                    currentChart.destroy();
                }

                const isPenjualan = type === 'penjualan';
                const sourceData = isPenjualan ? dataPenjualan : dataPengeluaran;
                
                const labels = sourceData.map(item => 'Tgl ' + item.tanggal);
                const dataTotals = sourceData.map(item => item.total);
                
                const labelText = isPenjualan ? 'Total Pendapatan (Rp)' : 'Total Pengeluaran (Rp)';
                const borderColor = isPenjualan ? '#10B981' : '#EF4444';
                const bgColor = isPenjualan ? 'rgba(16, 185, 129, 0.2)' : 'rgba(239, 68, 68, 0.2)';

                currentChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: labelText,
                            data: dataTotals,
                            borderColor: borderColor,
                            backgroundColor: bgColor,
                            borderWidth: 2,
                            fill: true,
                            tension: 0.1
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
            }

            // Initial render
            renderChart(chartToggle.value);

            // Re-render on change
            chartToggle.addEventListener('change', function(e) {
                renderChart(e.target.value);
            });
        });
    </script>
    @endif
</x-app-layout>