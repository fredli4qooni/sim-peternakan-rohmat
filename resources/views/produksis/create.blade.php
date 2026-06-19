<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catat Produksi Harian') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('produksis.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="tanggal">Tanggal Produksi</label>
                            <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-primary-500 focus:ring-primary-500" required>
                            @error('tanggal') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="jumlah_baik">Jumlah Telur Baik (butir/kg)</label>
                            <input type="number" name="jumlah_baik" id="jumlah_baik" value="{{ old('jumlah_baik') }}" min="0" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-primary-500 focus:ring-primary-500" required>
                            @error('jumlah_baik') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="jumlah_rusak">Jumlah Telur Rusak (butir/kg)</label>
                            <input type="number" name="jumlah_rusak" id="jumlah_rusak" value="{{ old('jumlah_rusak', 0) }}" min="0" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-primary-500 focus:ring-primary-500" required>
                            @error('jumlah_rusak') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="keterangan">Keterangan (Opsional)</label>
                            <textarea name="keterangan" id="keterangan" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-primary-500 focus:ring-primary-500">{{ old('keterangan') }}</textarea>
                            @error('keterangan') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                        </div>
                        <div class="flex items-center justify-end">
                            <a href="{{ route('produksis.index') }}" class="inline-block align-baseline font-bold text-sm text-gray-500 hover:text-gray-800 mr-4">
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
