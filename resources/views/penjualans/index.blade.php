<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Penjualan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold text-gray-700">Riwayat Penjualan</h3>
                        
                        @if(auth()->user()->role !== 'pemilik')
                        <a href="{{ route('penjualans.create') }}" class="bg-primary-500 hover:bg-primary-600 text-white font-bold py-2 px-4 rounded">
                            Catat Penjualan
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
                                    <th class="py-3 px-4 border-b">Pelanggan</th>
                                    <th class="py-3 px-4 border-b text-right">Jumlah (Kg)</th>
                                    <th class="py-3 px-4 border-b text-right">Harga per Kg (Rp)</th>
                                    <th class="py-3 px-4 border-b text-right">Total (Rp)</th>
                                    <th class="py-3 px-4 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($penjualans as $penjualan)
                                <tr class="hover:bg-gray-50 border-b">
                                    <td class="py-3 px-4">{{ \Carbon\Carbon::parse($penjualan->tanggal)->format('d M Y') }}</td>
                                    <td class="py-3 px-4">
                                        @if($penjualan->pelanggan_id)
                                            <span class="text-primary-600 font-semibold">{{ $penjualan->pelanggan->nama }}</span> <span class="text-xs text-gray-500">(Agen)</span>
                                        @else
                                            {{ $penjualan->nama_pelanggan ?: 'Umum/Eceran' }}
                                        @endif
                                    </td>
                                    @if($penjualan->pelanggan_id)
                                        <td class="py-3 px-4 text-right font-bold text-primary-600">{{ number_format($penjualan->jumlah / 15, 0, ',', '.') }} Kotak</td>
                                        <td class="py-3 px-4 text-right">{{ number_format($penjualan->harga_satuan * 15, 0, ',', '.') }}</td>
                                    @else
                                        <td class="py-3 px-4 text-right font-bold text-primary-600">{{ number_format($penjualan->jumlah, 2, ',', '.') }} Kg</td>
                                        <td class="py-3 px-4 text-right">{{ number_format($penjualan->harga_satuan, 0, ',', '.') }}</td>
                                    @endif
                                    <td class="py-3 px-4 text-right font-bold">{{ number_format($penjualan->total_harga, 0, ',', '.') }}</td>
                                    <td class="py-3 px-4 flex space-x-2 justify-center items-center">
                                        <a href="{{ route('penjualans.print', $penjualan->id) }}" target="_blank" class="text-green-500 hover:text-green-700 font-semibold border border-green-500 px-2 rounded">Cetak Nota</a>
                                        
                                        @if(auth()->user()->role !== 'pemilik')
                                        <form action="{{ route('penjualans.destroy', $penjualan->id) }}" method="POST" onsubmit="return confirm('Yakin menghapus transaksi ini? (Stok akan dikembalikan)')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 px-2">Hapus</button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                @if($penjualans->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-gray-500">Belum ada data penjualan.</td>
                                </tr>
                                @endif
                            </tbody>
                            @if($penjualans->isNotEmpty())
                            <tfoot>
                                <tr class="bg-gray-100 border-t-2 border-gray-300">
                                    <td colspan="2" class="py-3 px-4 font-bold text-right text-gray-800 uppercase tracking-wider text-sm">Total Keseluruhan:</td>
                                    <td class="py-3 px-4 text-right font-bold text-primary-600">
                                        {{ number_format($total_history_penjualan, 2, ',', '.') }} Kg
                                        <div class="text-xs text-gray-500 font-normal mt-1">(~{{ number_format($total_history_penjualan / 15, 1, ',', '.') }} Kotak)</div>
                                    </td>
                                    <td class="py-3 px-4 text-center font-bold text-gray-800">-</td>
                                    <td class="py-3 px-4 text-right font-bold text-gray-800">
                                        Rp {{ number_format($total_pendapatan, 0, ',', '.') }}
                                    </td>
                                    <td></td>
                                </tr>
                            </tfoot>
                            @endif
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $penjualans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>