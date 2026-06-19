<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Pelanggan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('pelanggans.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">Nama Pelanggan/Agen</label>
                            <input type="text" name="nama" id="nama" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-primary-500 focus:ring-primary-500" required>
                            @error('nama') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="no_telp">No. HP / Telepon</label>
                            <input type="text" name="no_telp" id="no_telp" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-primary-500 focus:ring-primary-500">
                            @error('no_telp') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-primary-500 focus:ring-primary-500"></textarea>
                            @error('alamat') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                        </div>
                        <div class="flex items-center justify-end">
                            <a href="{{ route('pelanggans.index') }}" class="inline-block align-baseline font-bold text-sm text-gray-500 hover:text-gray-800 mr-4">
                                Batal
                            </a>
                            <button type="submit" class="bg-primary-500 hover:bg-primary-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
