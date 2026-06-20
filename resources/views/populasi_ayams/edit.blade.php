<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Populasi Ayam') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('populasi_ayams.update', $populasiAyam->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $populasiAyam->tanggal) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-amber-500" required>
                            @error('tanggal') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="jenis">Jenis Pencatatan</label>
                            <select name="jenis" id="jenis" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-amber-500" required onchange="toggleHarga(this.value)">
                                <option value="masuk" {{ old('jenis', $populasiAyam->jenis) == 'masuk' ? 'selected' : '' }}>Ayam Masuk (Bertambah)</option>
                                <option value="mati" {{ old('jenis', $populasiAyam->jenis) == 'mati' ? 'selected' : '' }}>Ayam Mati (Berkurang)</option>
                                <option value="terjual" {{ old('jenis', $populasiAyam->jenis) == 'terjual' ? 'selected' : '' }}>Ayam Terjual / Afkir (Berkurang & Pendapatan)</option>
                            </select>
                            @error('jenis') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="jumlah">Jumlah Ayam (Ekor)</label>
                            <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', $populasiAyam->jumlah) }}" min="1" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-amber-500" required>
                            @error('jumlah') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                        </div>
                        
                        <div class="mb-4" id="harga_container" style="display: {{ old('jenis', $populasiAyam->jenis) == 'terjual' ? 'block' : 'none' }};">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="harga_satuan">Harga per Ekor (Rp) - Khusus Ayam Terjual</label>
                            <input type="number" name="harga_satuan" id="harga_satuan" value="{{ old('harga_satuan', $populasiAyam->harga_satuan) }}" min="0" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-amber-500">
                            @error('harga_satuan') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="keterangan">Keterangan (Opsional)</label>
                            <textarea name="keterangan" id="keterangan" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-amber-500">{{ old('keterangan', $populasiAyam->keterangan) }}</textarea>
                            @error('keterangan') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div class="flex items-center justify-end">
                            <a href="{{ route('populasi_ayams.index') }}" class="inline-block align-baseline font-bold text-sm text-gray-500 hover:text-gray-800 mr-4">
                                Batal
                            </a>
                            <button type="submit" class="bg-amber-600 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleHarga(jenis) {
            var container = document.getElementById('harga_container');
            if (jenis === 'terjual') {
                container.style.display = 'block';
                document.getElementById('harga_satuan').required = true;
            } else {
                container.style.display = 'none';
                document.getElementById('harga_satuan').required = false;
                document.getElementById('harga_satuan').value = '';
            }
        }
    </script>
</x-app-layout>
