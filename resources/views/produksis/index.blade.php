<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Produksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 border border-primary-200">
                <div class="p-6 text-gray-900 bg-blue-50 flex flex-col md:flex-row justify-between items-center rounded-lg">
                    <div class="mb-4 md:mb-0">
                        <h3 class="text-xl font-bold text-gray-800">Total Stok Telur Terkini</h3>
                        <p class="text-sm text-gray-600 mt-1">Stok dihitung otomatis dari selisih produksi dan penjualan.</p>
                        
                        <div class="mt-4 bg-white p-3 rounded shadow-sm inline-block border border-gray-100">
                            <span class="text-xs font-semibold text-gray-500 uppercase">Rumus Perhitungan:</span>
                            <div class="flex items-center space-x-2 mt-1 text-sm font-medium">
                                <span class="text-green-600" title="Total Seluruh Produksi">{{ number_format($total_history_produksi, 2, ',', '.') }} Kg</span>
                                <span class="text-gray-400">-</span>
                                <span class="text-red-500" title="Total Seluruh Penjualan">{{ number_format($total_history_penjualan, 2, ',', '.') }} Kg</span>
                                <span class="text-gray-400">=</span>
                                <span class="text-primary-600 font-bold">{{ number_format($stok->total_stok, 2, ',', '.') }} Kg</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-right bg-white p-4 rounded-lg shadow-sm border border-gray-100 min-w-[200px]">
                        <div class="text-sm text-gray-500 font-bold uppercase tracking-wide mb-1">Stok Saat Ini</div>
                        <div class="text-3xl font-extrabold text-primary-600 leading-none">
                            {{ $stok ? number_format($stok->total_stok, 2, ',', '.') : 0 }} <span class="text-base text-gray-500 font-normal">Kg</span>
                        </div>
                        <div class="text-sm font-semibold text-gray-400 mt-2">&approx; {{ $stok ? number_format($stok->total_stok / 15, 1, ',', '.') : 0 }} Kotak</div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold text-gray-700">Riwayat Produksi Harian</h3>
                        
                        @if(auth()->user()->role !== 'pemilik')
                        <a href="{{ route('produksis.create') }}" class="bg-primary-500 hover:bg-primary-600 text-white font-bold py-2 px-4 rounded">
                            Catat Produksi
                        </a>
                        @endif
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-100 text-gray-700">
                                    <th class="py-3 px-4 border-b">Tanggal</th>
                                    <th class="py-3 px-4 border-b text-right">Telur Baik (kg/kotak)</th>
                                    <th class="py-3 px-4 border-b text-right">Telur Rusak (Butir)</th>
                                    <th class="py-3 px-4 border-b">Keterangan</th>
                                    <th class="py-3 px-4 border-b">Dicatat Oleh</th>
                                    <th class="py-3 px-4 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($produksis as $produksi)
                                <tr class="hover:bg-gray-50 border-b">
                                    <td class="py-3 px-4">{{ \Carbon\Carbon::parse($produksi->tanggal)->format('d M Y') }}</td>
                                    <td class="py-3 px-4 text-right">
                                        <span class="font-bold text-primary-600">{{ number_format($produksi->jumlah_baik, 2, ',', '.') }}</span><br>
                                        <span class="text-xs text-gray-500">(~{{ number_format($produksi->jumlah_baik / 15, 1, ',', '.') }} Kotak)</span>
                                    </td>
                                    <td class="py-3 px-4 text-right text-red-500">{{ number_format($produksi->jumlah_rusak, 0, ',', '.') }}</td>
                                    <td class="py-3 px-4">{{ $produksi->keterangan ?? '-' }}</td>
                                    <td class="py-3 px-4">{{ $produksi->user->name }}</td>
                                    <td class="py-3 px-4 flex space-x-2 justify-center items-center">
                                        
                                        @if(auth()->user()->role !== 'pemilik')
                                            <a href="{{ route('produksis.edit', $produksi->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                            <form action="{{ route('produksis.destroy', $produksi->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus? (Stok akan otomatis berkurang!)')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                                            </form>
                                        @else
                                            <span class="text-gray-400 text-sm italic">Hanya Lihat</span>
                                        @endif

                                    </td>
                                </tr>
                                @endforeach
                                @if($produksis->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-gray-500">Belum ada data produksi.</td>
                                </tr>
                                @endif
                            </tbody>
                            @if($produksis->isNotEmpty())
                            <tfoot>
                                <tr class="bg-gray-100 border-t-2 border-gray-300">
                                    <td class="py-3 px-4 font-bold text-right text-gray-800 uppercase tracking-wider text-sm">Total Keseluruhan:</td>
                                    <td class="py-3 px-4 text-right font-bold text-primary-600">
                                        {{ number_format($total_history_produksi, 2, ',', '.') }} Kg
                                        <div class="text-xs text-gray-500 font-normal mt-1">(~{{ number_format($total_history_produksi / 15, 1, ',', '.') }} Kotak)</div>
                                    </td>
                                    <td class="py-3 px-4 text-right font-bold text-red-500">
                                        {{ number_format($total_history_rusak, 0, ',', '.') }} Butir
                                    </td>
                                    <td colspan="3"></td>
                                </tr>
                            </tfoot>
                            @endif
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $produksis->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>