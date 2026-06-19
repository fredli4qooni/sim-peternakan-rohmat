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

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="pelanggan_id">Pelanggan / Agen</label>
                            <select name="pelanggan_id" id="pelanggan_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">-- Pembeli Umum (Bukan Agen) --</option>
                                @foreach($pelanggans as $pelanggan)
                                    <option value="{{ $pelanggan->id }}" {{ old('pelanggan_id', $penjualan->pelanggan_id) == $pelanggan->id ? 'selected' : '' }}>
                                        {{ $pelanggan->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4 flex space-x-4">
                            <div class="w-1/2">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="jumlah">Jumlah (butir/kg)</label>
                                <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', $penjualan->jumlah) }}" min="1" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            </div>
                            <div class="w-1/2">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="harga_satuan">Harga Satuan (Rp)</label>
                                <input type="number" name="harga_satuan" id="harga_satuan" value="{{ old('harga_satuan', $penjualan->harga_satuan) }}" min="0" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
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
</x-app-layout>