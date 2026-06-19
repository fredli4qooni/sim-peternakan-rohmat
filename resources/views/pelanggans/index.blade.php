<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Pelanggan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold text-primary-600">Daftar Pelanggan / Agen</h3>
                        <a href="{{ route('pelanggans.create') }}" class="bg-primary-500 hover:bg-primary-600 text-white font-bold py-2 px-4 rounded">
                            Tambah Pelanggan
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
                                    <th class="py-3 px-4 border-b">Nama</th>
                                    <th class="py-3 px-4 border-b">No Telp</th>
                                    <th class="py-3 px-4 border-b">Alamat</th>
                                    <th class="py-3 px-4 border-b">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pelanggans as $pelanggan)
                                <tr class="hover:bg-gray-50 border-b">
                                    <td class="py-3 px-4">{{ $pelanggan->nama }}</td>
                                    <td class="py-3 px-4">{{ $pelanggan->no_telp ?? '-' }}</td>
                                    <td class="py-3 px-4">{{ $pelanggan->alamat ?? '-' }}</td>
                                    <td class="py-3 px-4 flex space-x-2">
                                        <a href="{{ route('pelanggans.edit', $pelanggan->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                        <form action="{{ route('pelanggans.destroy', $pelanggan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @if($pelanggans->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-gray-500">Belum ada data pelanggan.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $pelanggans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
