<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catat Transaksi Penjualan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('penjualans.store') }}" method="POST">
                        @csrf
                        @if($errors->any())
                            <div class="mb-4 bg-red-50 border border-red-200 text-red-600 p-3 rounded">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="tanggal">Tanggal Transaksi</label>
                            <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-primary-500 focus:ring-primary-500" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Jenis Pembeli</label>
                            <div class="flex items-center space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="jenis_pelanggan" value="umum" class="form-radio text-primary-500" {{ old('jenis_pelanggan', 'umum') == 'umum' ? 'checked' : '' }} onchange="togglePelanggan(this.value)">
                                    <span class="ml-2">Umum / Eceran</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="jenis_pelanggan" value="agen" class="form-radio text-primary-500" {{ old('jenis_pelanggan') == 'agen' ? 'checked' : '' }} onchange="togglePelanggan(this.value)">
                                    <span class="ml-2">Pelanggan Terdaftar / Agen</span>
                                </label>
                            </div>
                        </div>

                        <div class="mb-4" id="container_umum" style="display: {{ old('jenis_pelanggan', 'umum') == 'umum' ? 'block' : 'none' }};">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_pelanggan">Nama Pelanggan (Opsional)</label>
                            <input type="text" name="nama_pelanggan" id="nama_pelanggan" value="{{ old('nama_pelanggan') }}" placeholder="Tulis nama pelanggan..." class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-primary-500 focus:ring-primary-500">
                        </div>

                        <div class="mb-4" id="container_agen" style="display: {{ old('jenis_pelanggan') == 'agen' ? 'block' : 'none' }};">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="pelanggan_id">Pilih Pelanggan / Agen</label>
                            <select name="pelanggan_id" id="pelanggan_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-primary-500 focus:ring-primary-500">
                                <option value="">-- Pilih Pelanggan --</option>
                                @foreach($pelanggans as $pelanggan)
                                    <option value="{{ $pelanggan->id }}" {{ old('pelanggan_id') == $pelanggan->id ? 'selected' : '' }}>
                                        {{ $pelanggan->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4 flex space-x-4">
                            <div class="w-1/2">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="jumlah">Jumlah (Kg)</label>
                                <input type="number" step="0.01" name="jumlah" id="jumlah" value="{{ old('jumlah') }}" min="0.01" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-primary-500 focus:ring-primary-500" required>
                            </div>
                            <div class="w-1/2">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="harga_satuan">Harga per Kg (Rp)</label>
                                <input type="number" name="harga_satuan" id="harga_satuan" value="{{ old('harga_satuan') }}" min="0" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-primary-500 focus:ring-primary-500" required>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('penjualans.index') }}" class="inline-block align-baseline font-bold text-sm text-gray-500 hover:text-gray-800 mr-4">
                                Batal
                            </a>
                            <button type="submit" class="bg-primary-500 hover:bg-primary-600 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline">
                                Simpan & Cetak Nota
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePelanggan(jenis) {
            if (jenis === 'agen') {
                document.getElementById('container_agen').style.display = 'block';
                document.getElementById('container_umum').style.display = 'none';
            } else {
                document.getElementById('container_agen').style.display = 'none';
                document.getElementById('container_umum').style.display = 'block';
            }
        }
    </script>
</x-app-layout>
