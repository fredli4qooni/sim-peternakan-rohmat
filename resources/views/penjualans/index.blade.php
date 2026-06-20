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
                                    <td class="py-3 px-4 text-right font-bold text-primary-600">{{ number_format($penjualan->jumlah, 0, ',', '.') }}</td>
                                    <td class="py-3 px-4 text-right">{{ number_format($penjualan->harga_satuan, 0, ',', '.') }}</td>
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