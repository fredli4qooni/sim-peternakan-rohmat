<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Transaksi Penjualan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('penjualans.update', $penjualan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        @if($errors->any())
                            <div class="mb-4 bg-red-50 border border-red-200 text-red-600 p-3 rounded">
                                <ul class="list-disc list-inside">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-4 text-sm text-gray-600 bg-blue-50 p-3 rounded border border-blue-200">
                            <strong>Info:</strong> Menambah jumlah penjualan akan memotong stok gudang. Pastikan stok mencukupi.
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="tanggal">Tanggal Transaksi</label>
                            <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $penjualan->tanggal) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        @php
                            $jenis_default = old('jenis_pelanggan', $penjualan->pelanggan_id ? 'agen' : 'umum');
                            // Jika default agen, ubah konversi untuk UI Edit
                            $jumlah_display = $jenis_default == 'agen' ? ($penjualan->jumlah / 15) : $penjualan->jumlah;
                            $harga_display = $jenis_default == 'agen' ? ($penjualan->harga_satuan * 15) : $penjualan->harga_satuan;
                        @endphp
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Jenis Pembeli</label>
                            <div class="flex items-center space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="jenis_pelanggan" value="umum" class="form-radio text-primary-500" {{ $jenis_default == 'umum' ? 'checked' : '' }} onchange="togglePelanggan(this.value)">
                                    <span class="ml-2">Umum / Eceran</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="jenis_pelanggan" value="agen" class="form-radio text-primary-500" {{ $jenis_default == 'agen' ? 'checked' : '' }} onchange="togglePelanggan(this.value)">
                                    <span class="ml-2">Pelanggan Terdaftar / Agen</span>
                                </label>
                            </div>
                        </div>

                        <div class="mb-4" id="container_umum" style="display: {{ $jenis_default == 'umum' ? 'block' : 'none' }};">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="nama_pelanggan">Nama Pelanggan (Opsional)</label>
                            <input type="text" name="nama_pelanggan" id="nama_pelanggan" value="{{ old('nama_pelanggan', $penjualan->nama_pelanggan) }}" placeholder="Tulis nama pelanggan..." class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-primary-500 focus:ring-primary-500">
                        </div>

                        <div class="mb-4" id="container_agen" style="display: {{ $jenis_default == 'agen' ? 'block' : 'none' }};">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="pelanggan_id">Pilih Pelanggan / Agen</label>
                            <select name="pelanggan_id" id="pelanggan_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-primary-500 focus:ring-primary-500">
                                <option value="">-- Pilih Pelanggan --</option>
                                @foreach($pelanggans as $pelanggan)
                                    <option value="{{ $pelanggan->id }}" {{ old('pelanggan_id', $penjualan->pelanggan_id) == $pelanggan->id ? 'selected' : '' }}>
                                        {{ $pelanggan->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4 flex space-x-4">
                            <div class="w-1/2">
                                <label class="block text-gray-700 text-sm font-bold mb-2" id="label_jumlah" for="jumlah">Jumlah (kg)</label>
                                <input type="number" step="0.01" name="jumlah" id="jumlah" value="{{ old('jumlah', $jumlah_display) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-primary-500 focus:ring-primary-500" required>
                            </div>
                            <div class="w-1/2">
                                <label class="block text-gray-700 text-sm font-bold mb-2" id="label_harga" for="harga_satuan">Harga per Kg (Rp)</label>
                                <input type="number" name="harga_satuan" id="harga_satuan" value="{{ old('harga_satuan', $harga_display) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-primary-500 focus:ring-primary-500" required>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('penjualans.index') }}" class="inline-block align-baseline font-bold text-sm text-gray-500 hover:text-gray-800 mr-4">
                                Batal
                            </a>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline">
                                Update Transaksi
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
                document.getElementById('label_jumlah').innerText = 'Jumlah (Kotak) - 15 Kg/Kotak';
                document.getElementById('label_harga').innerText = 'Harga per Kg (Rp)';
            } else {
                document.getElementById('container_agen').style.display = 'none';
                document.getElementById('container_umum').style.display = 'block';
                document.getElementById('label_jumlah').innerText = 'Jumlah (kg/kotak)';
                document.getElementById('label_harga').innerText = 'Harga per Kg (Rp)';
            }
        }

        window.onload = function() {
            const checkedRadio = document.querySelector('input[name="jenis_pelanggan"]:checked');
            if(checkedRadio) {
                togglePelanggan(checkedRadio.value);
            }
        };
    </script>
</x-app-layout>