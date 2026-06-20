<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Populasi Ayam') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <div class="bg-white rounded-lg shadow p-6 border-l-4 border-amber-500">
                    <div class="text-sm font-bold text-gray-500 uppercase">Total Ayam Aktif</div>
                    <div class="mt-2 text-3xl font-bold text-amber-600">{{ number_format($total_aktif, 0, ',', '.') }} <span class="text-lg">Ekor</span></div>
                </div>
                <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-500">
                    <div class="text-sm font-bold text-gray-500 uppercase">Ayam Masuk (Bulan Ini)</div>
                    <div class="mt-2 text-3xl font-bold text-blue-600">{{ number_format($masuk_bulan_ini, 0, ',', '.') }}</div>
                </div>
                <div class="bg-white rounded-lg shadow p-6 border-l-4 border-red-500">
                    <div class="text-sm font-bold text-gray-500 uppercase">Ayam Mati (Bulan Ini)</div>
                    <div class="mt-2 text-3xl font-bold text-red-600">{{ number_format($mati_bulan_ini, 0, ',', '.') }}</div>
                </div>
                <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
                    <div class="text-sm font-bold text-gray-500 uppercase">Ayam Terjual (Bulan Ini)</div>
                    <div class="mt-2 text-3xl font-bold text-green-600">{{ number_format($terjual_bulan_ini, 0, ',', '.') }}</div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold text-gray-700">Riwayat Pergerakan Ayam</h3>
                        
                        @if(auth()->user()->role !== 'pemilik')
                        <a href="{{ route('populasi_ayams.create') }}" class="bg-amber-600 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded shadow">
                            + Catat Populasi
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
                                <tr class="bg-gray-100 text-gray-700 border-b">
                                    <th class="py-3 px-4">Tanggal</th>
                                    <th class="py-3 px-4">Jenis</th>
                                    <th class="py-3 px-4 text-right">Jumlah (Ekor)</th>
                                    <th class="py-3 px-4 text-right">Pendapatan (Rp)</th>
                                    <th class="py-3 px-4">Keterangan</th>
                                    <th class="py-3 px-4">Pencatat</th>
                                    @if(auth()->user()->role !== 'pemilik')
                                    <th class="py-3 px-4 text-center">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($populasi_ayams as $populasi)
                                <tr class="hover:bg-gray-50 border-b">
                                    <td class="py-3 px-4">{{ \Carbon\Carbon::parse($populasi->tanggal)->format('d M Y') }}</td>
                                    <td class="py-3 px-4 font-bold uppercase
                                        @if($populasi->jenis == 'masuk') text-blue-600
                                        @elseif($populasi->jenis == 'mati') text-red-600
                                        @elseif($populasi->jenis == 'terjual') text-green-600
                                        @endif
                                    ">
                                        {{ $populasi->jenis }}
                                    </td>
                                    <td class="py-3 px-4 text-right font-bold">{{ number_format($populasi->jumlah, 0, ',', '.') }}</td>
                                    <td class="py-3 px-4 text-right">
                                        @if($populasi->jenis == 'terjual' && $populasi->total_harga)
                                            <span class="text-green-600 font-bold">+ {{ number_format($populasi->total_harga, 0, ',', '.') }}</span>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="py-3 px-4">{{ $populasi->keterangan ?: '-' }}</td>
                                    <td class="py-3 px-4">{{ $populasi->user->name ?? '-' }}</td>
                                    
                                    @if(auth()->user()->role !== 'pemilik')
                                    <td class="py-3 px-4 flex justify-center space-x-2">
                                        <a href="{{ route('populasi_ayams.edit', $populasi->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                        <form action="{{ route('populasi_ayams.destroy', $populasi->id) }}" method="POST" onsubmit="return confirm('Hapus riwayat ini? Stok akan dikalkulasi ulang.')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                                @if($populasi_ayams->isEmpty())
                                <tr>
                                    <td colspan="{{ auth()->user()->role !== 'pemilik' ? 7 : 6 }}" class="text-center py-4 text-gray-500">Belum ada catatan populasi ayam.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $populasi_ayams->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
