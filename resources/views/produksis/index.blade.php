<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Produksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 border-l-4 border-primary-500">
                <div class="p-6 text-gray-900 flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-bold text-gray-700">Total Stok Telur Terkini</h3>
                        <p class="text-sm text-gray-500">Stok ini akan otomatis bertambah dari produksi dan berkurang saat penjualan.</p>
                    </div>
                    <div class="text-3xl font-extrabold text-primary-600">
                        {{ $stok ? number_format($stok->total_stok, 0, ',', '.') : 0 }} <span class="text-base text-gray-600 font-normal">butir/kg</span>
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
                                    <th class="py-3 px-4 border-b text-right">Jumlah Baik</th>
                                    <th class="py-3 px-4 border-b text-right">Jumlah Rusak</th>
                                    <th class="py-3 px-4 border-b">Keterangan</th>
                                    <th class="py-3 px-4 border-b">Dicatat Oleh</th>
                                    <th class="py-3 px-4 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($produksis as $produksi)
                                <tr class="hover:bg-gray-50 border-b">
                                    <td class="py-3 px-4">{{ \Carbon\Carbon::parse($produksi->tanggal)->format('d M Y') }}</td>
                                    <td class="py-3 px-4 text-right font-bold text-green-600">{{ number_format($produksi->jumlah_baik, 0, ',', '.') }}</td>
                                    <td class="py-3 px-4 text-right font-bold text-red-500">{{ number_format($produksi->jumlah_rusak, 0, ',', '.') }}</td>
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