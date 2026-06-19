<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Pengeluaran Operasional') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold text-gray-700">Daftar Pengeluaran</h3>
                        
                        <a href="{{ route('pengeluarans.create') }}" class="bg-primary-500 hover:bg-primary-600 text-white font-bold py-2 px-4 rounded">
                            Catat Pengeluaran
                        </a>
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
                                    <th class="py-3 px-4 border-b">Nama Pengeluaran</th>
                                    <th class="py-3 px-4 border-b text-right">Nominal (Rp)</th>
                                    <th class="py-3 px-4 border-b">Keterangan</th>
                                    <th class="py-3 px-4 border-b">Dicatat Oleh</th>
                                    <th class="py-3 px-4 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pengeluarans as $pengeluaran)
                                <tr class="hover:bg-gray-50 border-b">
                                    <td class="py-3 px-4">{{ \Carbon\Carbon::parse($pengeluaran->tanggal)->format('d M Y') }}</td>
                                    <td class="py-3 px-4 font-bold">{{ $pengeluaran->nama_pengeluaran }}</td>
                                    <td class="py-3 px-4 text-right font-bold text-red-500">{{ number_format($pengeluaran->nominal, 0, ',', '.') }}</td>
                                    <td class="py-3 px-4">{{ $pengeluaran->keterangan ?? '-' }}</td>
                                    <td class="py-3 px-4">{{ $pengeluaran->user->name ?? '-' }}</td>
                                    <td class="py-3 px-4 flex space-x-2 justify-center items-center">
                                        
                                            <a href="{{ route('pengeluarans.edit', $pengeluaran->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                            <form action="{{ route('pengeluarans.destroy', $pengeluaran->id) }}" method="POST" onsubmit="return confirm('Yakin menghapus pengeluaran ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 px-2">Hapus</button>
                                            </form>

                                    </td>
                                </tr>
                                @endforeach
                                @if($pengeluarans->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-gray-500">Belum ada data pengeluaran.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $pengeluarans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>