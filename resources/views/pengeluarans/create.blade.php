<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catat Pengeluaran Operasional') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{
        selectedOpsi: '{{ old('nama_pengeluaran_select', '') }}',
        manualInput: '{{ old('nama_pengeluaran_manual', '') }}',
        nominalInput: '{{ old('nominal', old('nama_pengeluaran_select') === 'Gaji Karyawan' ? 2100 : '') }}',
        modalOpen: false,
        newOpsiNama: '',
        loadingOpsi: false,
        errorMessage: '',
        successMessage: '',
        kategoriList: {{ Js::from($kategoris) }},
        init() {
            this.$watch('selectedOpsi', val => {
                if (val === 'Gaji Karyawan') {
                    this.nominalInput = 2100;
                }
            });
        },
        async addOpsi() {
            if (!this.newOpsiNama.trim()) {
                this.errorMessage = 'Nama pengeluaran tidak boleh kosong.';
                return;
            }
            this.loadingOpsi = true;
            this.errorMessage = '';
            this.successMessage = '';
            try {
                const res = await fetch('{{ route('kategori-pengeluarans.store') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ nama: this.newOpsiNama.trim() })
                });
                const data = await res.json();
                if (!res.ok) {
                    this.errorMessage = data.message || (data.errors && Object.values(data.errors)[0][0]) || 'Gagal menambahkan opsi.';
                } else {
                    this.kategoriList.push(data.data);
                    this.kategoriList.sort((a, b) => a.nama.localeCompare(b.nama));
                    this.selectedOpsi = data.data.nama;
                    this.newOpsiNama = '';
                    this.successMessage = 'Opsi baru berhasil ditambahkan!';
                    setTimeout(() => {
                        this.modalOpen = false;
                        this.successMessage = '';
                    }, 800);
                }
            } catch (err) {
                this.errorMessage = 'Terjadi kesalahan sistem saat menghubungi server.';
            } finally {
                this.loadingOpsi = false;
            }
        },
        async deleteOpsi(id, nama) {
            if (!confirm(`Hapus opsi '${nama}' dari daftar dropdown?`)) return;
            try {
                const res = await fetch(`/kategori-pengeluarans/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });
                if (res.ok) {
                    this.kategoriList = this.kategoriList.filter(item => item.id !== id);
                    if (this.selectedOpsi === nama) {
                        this.selectedOpsi = '';
                    }
                } else {
                    alert('Gagal menghapus opsi.');
                }
            } catch (err) {
                alert('Terjadi kesalahan saat menghapus opsi.');
            }
        }
    }">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('pengeluarans.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="tanggal">Tanggal Pengeluaran <span class="text-red-500">*</span></label>
                            <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-amber-500 focus:ring-amber-500" required>
                            @error('tanggal') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                        </div>

                        <!-- Dropdown Nama Pengeluaran & Tool Tambah Opsi -->
                        <div class="mb-4">
                            <div class="flex items-center justify-between mb-2">
                                <label class="block text-gray-700 text-sm font-bold" for="nama_pengeluaran_select">
                                    Nama Pengeluaran <span class="text-red-500">*</span>
                                </label>
                                <button type="button" @click="modalOpen = true; errorMessage = ''; successMessage = '';" class="inline-flex items-center text-xs font-semibold text-amber-700 hover:text-amber-900 bg-amber-100 hover:bg-amber-200 border border-amber-300 px-2.5 py-1 rounded shadow-sm transition">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Tambah Opsi Baru
                                </button>
                            </div>

                            <select name="nama_pengeluaran_select" id="nama_pengeluaran_select" x-model="selectedOpsi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-amber-500 focus:ring-amber-500" required>
                                <option value="" disabled>-- Pilih Nama Pengeluaran --</option>
                                <template x-for="kat in kategoriList" :key="kat.id">
                                    <option :value="kat.nama" x-text="kat.nama" :selected="selectedOpsi === kat.nama"></option>
                                </template>
                                <option value="Lainnya">Lainnya (Ketik Manual)</option>
                            </select>
                            @error('nama_pengeluaran_select') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror

                            <!-- Input Manual jika opsi Lainnya dipilih -->
                            <div x-show="selectedOpsi === 'Lainnya'" x-transition class="mt-3 p-3 bg-amber-50 border border-amber-200 rounded-lg">
                                <label class="block text-amber-900 text-xs font-bold mb-1" for="nama_pengeluaran_manual">
                                    Ketik Nama Pengeluaran (Manual) <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="nama_pengeluaran_manual" id="nama_pengeluaran_manual" x-model="manualInput" placeholder="Contoh: Perbaikan Atap Kandang, Sewa Truk, dll..." class="shadow appearance-none border border-amber-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-amber-500 bg-white">
                                <p class="text-gray-500 text-xs mt-1">Opsi ini hanya digunakan untuk transaksi ini. Jika ingin sering digunakan, tambahkan melalui tombol <strong>+ Tambah Opsi Baru</strong> agar tersimpan permanen di dropdown.</p>
                                @error('nama_pengeluaran_manual') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                                @error('nama_pengeluaran') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="nominal">Nominal (Rp) <span class="text-red-500">*</span></label>
                            <input type="number" name="nominal" id="nominal" x-model="nominalInput" min="0" placeholder="0" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-amber-500 focus:ring-amber-500" required>
                            @error('nominal') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="keterangan">Keterangan (Opsional)</label>
                            <textarea name="keterangan" id="keterangan" rows="3" placeholder="Catatan tambahan mengenai pengeluaran ini..." class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-amber-500 focus:ring-amber-500">{{ old('keterangan') }}</textarea>
                            @error('keterangan') <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="flex items-center justify-end">
                            <a href="{{ route('pengeluarans.index') }}" class="inline-block align-baseline font-bold text-sm text-gray-500 hover:text-gray-800 mr-4">
                                Batal
                            </a>
                            <button type="submit" class="bg-amber-600 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline shadow">
                                Simpan Pengeluaran
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Tools Tambah & Kelola Opsi Pengeluaran -->
        <div x-show="modalOpen" class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto px-4 py-6" style="display: none;" @keydown.escape.window="modalOpen = false">
            <!-- Backdrop -->
            <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" @click="modalOpen = false"></div>

            <!-- Modal Content -->
            <div class="bg-white rounded-xl shadow-2xl transform transition-all sm:max-w-lg sm:w-full z-10 overflow-hidden" @click.stop>
                <div class="bg-amber-600 px-6 py-4 flex items-center justify-between text-white">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-amber-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <h3 class="text-base font-bold">Tools Tambah Nama Pengeluaran</h3>
                    </div>
                    <button type="button" @click="modalOpen = false" class="text-amber-100 hover:text-white focus:outline-none">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <div class="p-6">
                    <p class="text-sm text-gray-600 mb-4">
                        Tambahkan nama pengeluaran baru ke dalam sistem. Opsi yang ditambahkan akan otomatis tersimpan di database dan langsung muncul pada dropdown pilihan.
                    </p>

                    <!-- Alert Pesan Sukses -->
                    <div x-show="successMessage" class="mb-4 bg-green-50 border border-green-300 text-green-700 px-3 py-2 rounded text-sm flex items-center" style="display: none;">
                        <svg class="w-4 h-4 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span x-text="successMessage"></span>
                    </div>

                    <!-- Alert Pesan Error -->
                    <div x-show="errorMessage" class="mb-4 bg-red-50 border border-red-300 text-red-700 px-3 py-2 rounded text-sm flex items-center" style="display: none;">
                        <svg class="w-4 h-4 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        <span x-text="errorMessage"></span>
                    </div>

                    <form @submit.prevent="addOpsi()">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-xs font-bold uppercase mb-1" for="modal_nama_opsi">
                                Nama Pengeluaran Baru
                            </label>
                            <input type="text" id="modal_nama_opsi" x-model="newOpsiNama" placeholder="Contoh: BBM Kendaraan, Konsumsi, dll..." class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500" :disabled="loadingOpsi">
                        </div>

                        <div class="flex justify-end space-x-2">
                            <button type="button" @click="modalOpen = false" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-800 bg-gray-100 hover:bg-gray-200 rounded-lg transition" :disabled="loadingOpsi">
                                Tutup
                            </button>
                            <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-amber-600 hover:bg-amber-700 rounded-lg shadow transition" :disabled="loadingOpsi">
                                <svg x-show="loadingOpsi" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" style="display: none;">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                                </svg>
                                <span>Simpan ke Dropdown</span>
                            </button>
                        </div>
                    </form>

                    <!-- Daftar Opsi Terdaftar -->
                    <div class="mt-6 pt-4 border-t border-gray-200">
                        <h4 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Daftar Opsi Tersedia (<span x-text="kategoriList.length"></span>)</h4>
                        <div class="max-h-40 overflow-y-auto space-y-1.5 pr-1">
                            <template x-for="item in kategoriList" :key="item.id">
                                <div class="flex items-center justify-between px-3 py-1.5 bg-gray-50 rounded text-sm text-gray-700 hover:bg-amber-50 transition">
                                    <span class="font-medium" x-text="item.nama"></span>
                                    <button type="button" @click="deleteOpsi(item.id, item.nama)" class="text-red-400 hover:text-red-600 focus:outline-none p-1 rounded hover:bg-red-50" title="Hapus opsi ini">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
