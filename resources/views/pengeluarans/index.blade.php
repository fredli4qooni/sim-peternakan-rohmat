<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Pengeluaran Operasional') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{
        modalOpen: false,
        newOpsiNama: '',
        loadingOpsi: false,
        errorMessage: '',
        successMessage: '',
        kategoriList: {{ Js::from($kategoris) }},
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
                    this.newOpsiNama = '';
                    this.successMessage = 'Opsi baru berhasil ditambahkan!';
                    setTimeout(() => {
                        window.location.reload();
                    }, 800);
                }
            } catch (err) {
                this.errorMessage = 'Terjadi kesalahan sistem saat menghubungi server.';
            } finally {
                this.loadingOpsi = false;
            }
        },
        async deleteOpsi(id, nama) {
            if (!confirm(`Hapus opsi '${nama}' dari daftar master opsi pengeluaran?`)) return;
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
                    window.location.reload();
                } else {
                    alert('Gagal menghapus opsi.');
                }
            } catch (err) {
                alert('Terjadi kesalahan saat menghapus opsi.');
            }
        }
    }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Card Filter Tanggal & Ringkasan Harian -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100 p-6">
                <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
                    
                    <!-- Date Picker & Quick Nav Buttons -->
                    <div>
                        <span class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-2">Pilih Tanggal Pengeluaran:</span>
                        <form action="{{ route('pengeluarans.index') }}" method="GET" class="flex flex-wrap items-center gap-2">
                            <a href="{{ route('pengeluarans.index', ['tanggal' => $tanggalKemarin]) }}" 
                               class="inline-flex items-center px-3 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-xs font-bold transition shadow-xs" 
                               title="Lihat hari kemarin ({{ \Carbon\Carbon::parse($tanggalKemarin)->format('d M') }})">
                                ◀ Kemarin
                            </a>

                            <div class="relative">
                                <input type="date" 
                                       name="tanggal" 
                                       id="tanggalPicker"
                                       value="{{ $tanggal }}" 
                                       onchange="this.form.submit()" 
                                       class="border border-gray-300 rounded-lg text-sm font-bold text-gray-800 shadow-sm focus:border-amber-500 focus:ring-amber-500 py-1.5 px-3 cursor-pointer">
                            </div>

                            <a href="{{ route('pengeluarans.index', ['tanggal' => $tanggalBesok]) }}" 
                               class="inline-flex items-center px-3 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg text-xs font-bold transition shadow-xs"
                               title="Lihat hari besok ({{ \Carbon\Carbon::parse($tanggalBesok)->format('d M') }})">
                                Besok ▶
                            </a>

                            @if($tanggal !== $tanggalHariIni)
                            <a href="{{ route('pengeluarans.index', ['tanggal' => $tanggalHariIni]) }}" 
                               class="inline-flex items-center px-3 py-2 bg-amber-50 hover:bg-amber-100 text-amber-700 border border-amber-300 rounded-lg text-xs font-bold transition shadow-xs">
                                Hari Ini
                            </a>
                            @endif
                        </form>

                        <div class="mt-2 text-xs font-semibold text-gray-600 flex items-center">
                            <svg class="w-4 h-4 mr-1 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>{{ \Carbon\Carbon::parse($tanggal)->translatedFormat('l, d F Y') }}</span>
                        </div>
                    </div>

                    <!-- Highlight Total Box & Tombol Aksi -->
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3 w-full lg:w-auto justify-between lg:justify-end">
                        
                        <!-- Box Total Harian -->
                        <div class="bg-gradient-to-br from-amber-500 to-amber-600 text-white px-5 py-3 rounded-xl shadow-md flex items-center space-x-4 min-w-[240px]">
                            <div class="w-10 h-10 rounded-lg bg-white/20 flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <span class="text-[10px] uppercase font-bold tracking-wider text-amber-100 block">Total Pengeluaran:</span>
                                <span class="text-xl font-black tracking-tight block">
                                    Rp {{ number_format($totalHarian, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-2 w-full sm:w-auto">
                            <button type="button" 
                                    @click="modalOpen = true; errorMessage = ''; successMessage = '';" 
                                    class="inline-flex items-center justify-center bg-white hover:bg-gray-50 text-gray-700 border border-gray-300 font-semibold py-2 px-3 rounded-lg shadow-xs text-xs transition">
                                <svg class="w-4 h-4 mr-1.5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Kelola Opsi Master
                            </button>
                            <a href="{{ route('pengeluarans.create', ['tanggal' => $tanggal]) }}" 
                               class="inline-flex items-center justify-center bg-amber-600 hover:bg-amber-700 text-white font-bold py-2 px-4 rounded-lg shadow-sm text-xs transition">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                + Catat Pengeluaran
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Flash Message -->
            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 text-green-800 p-4 rounded-lg shadow-xs flex items-center justify-between" role="alert">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm font-semibold">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <!-- Tabel Pengeluaran Berbasis Tanggal -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-base font-bold text-gray-800">
                                Rincian Pengeluaran Harian
                            </h3>
                            <p class="text-xs text-gray-500 mt-0.5">
                                Menampilkan seluruh jenis pengeluaran pada tanggal <strong>{{ \Carbon\Carbon::parse($tanggal)->format('d/m/Y') }}</strong>. Baris tanpa transaksi bernilai Rp 0.
                            </p>
                        </div>
                        <span class="text-xs font-semibold px-2.5 py-1 bg-gray-100 text-gray-700 rounded-full border border-gray-200">
                            {{ count($tableRows) }} Jenis Terdaftar
                        </span>
                    </div>

                    <div class="overflow-x-auto rounded-lg border border-gray-200">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-100/80 text-gray-700 text-xs font-bold uppercase tracking-wider">
                                    <th class="py-3 px-4 border-b text-center w-14">No</th>
                                    <th class="py-3 px-4 border-b">Nama / Jenis Pengeluaran</th>
                                    <th class="py-3 px-4 border-b text-right w-48">Nominal (Rp)</th>
                                    <th class="py-3 px-4 border-b">Keterangan</th>
                                    <th class="py-3 px-4 border-b text-center w-36">Dicatat Oleh</th>
                                    <th class="py-3 px-4 border-b text-center w-36">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-sm">
                                @forelse($tableRows as $index => $row)
                                <tr class="{{ $row['has_data'] ? 'hover:bg-amber-50/40 bg-white' : 'bg-gray-50/40 hover:bg-gray-50/80 text-gray-500' }} transition">
                                    <td class="py-3 px-4 text-center font-bold text-gray-400 text-xs">
                                        {{ $index + 1 }}
                                    </td>
                                    
                                    <!-- Nama Pengeluaran -->
                                    <td class="py-3 px-4 font-bold {{ $row['has_data'] ? 'text-gray-900' : 'text-gray-600' }}">
                                        {{ $row['nama'] }}
                                        @if($row['is_custom'])
                                            <span class="ml-1.5 inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-semibold bg-blue-50 text-blue-700 border border-blue-200">
                                                Kustom
                                            </span>
                                        @endif
                                    </td>

                                    <!-- Nominal -->
                                    <td class="py-3 px-4 text-right">
                                        @if($row['has_data'])
                                            <span class="font-black text-red-600 text-sm">
                                                Rp {{ number_format($row['nominal'], 0, ',', '.') }}
                                            </span>
                                        @else
                                            <span class="font-semibold text-gray-400 text-xs">
                                                Rp 0
                                            </span>
                                        @endif
                                    </td>

                                    <!-- Keterangan -->
                                    <td class="py-3 px-4 text-xs">
                                        @if($row['keterangan'])
                                            <span class="text-gray-700 font-medium">{{ $row['keterangan'] }}</span>
                                        @else
                                            <span class="text-gray-400 italic">
                                                {{ $row['has_data'] ? '-' : 'Tidak ada transaksi' }}
                                            </span>
                                        @endif
                                    </td>

                                    <!-- Dicatat Oleh -->
                                    <td class="py-3 px-4 text-center text-xs text-gray-600">
                                        {{ $row['dicatat_oleh'] ?: '-' }}
                                    </td>

                                    <!-- Aksi -->
                                    <td class="py-3 px-4 text-center">
                                        @if($row['has_data'])
                                            <div class="flex items-center justify-center space-x-2">
                                                <a href="{{ route('pengeluarans.edit', $row['id']) }}" 
                                                   class="text-blue-600 hover:text-blue-800 font-bold text-xs bg-blue-50 hover:bg-blue-100 border border-blue-200 px-2.5 py-1 rounded transition">
                                                    Edit
                                                </a>
                                                <form action="{{ route('pengeluarans.destroy', $row['id']) }}" 
                                                      method="POST" 
                                                      onsubmit="return confirm('Yakin ingin menghapus catatan pengeluaran {{ $row['nama'] }} pada tanggal ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="text-red-600 hover:text-red-800 font-bold text-xs bg-red-50 hover:bg-red-100 border border-red-200 px-2.5 py-1 rounded transition">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        @else
                                            <a href="{{ route('pengeluarans.create', ['tanggal' => $tanggal, 'kategori' => $row['nama']]) }}" 
                                               class="inline-flex items-center text-amber-700 hover:text-amber-900 font-semibold text-xs bg-amber-50 hover:bg-amber-100 border border-amber-300 px-2.5 py-1 rounded shadow-2xs transition">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                                </svg>
                                                + Catat
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-8 text-gray-400">
                                        Belum ada jenis pengeluaran yang terdaftar.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>

                            <!-- Footer Total Otomatis -->
                            <tfoot>
                                <tr class="bg-amber-50/80 border-t-2 border-amber-300">
                                    <td colspan="2" class="py-4 px-4 text-right font-black text-gray-800 text-sm uppercase tracking-wide">
                                        TOTAL PENGELUARAN TANGGAL INI:
                                    </td>
                                    <td class="py-4 px-4 text-right font-black text-red-600 text-base">
                                        Rp {{ number_format($totalHarian, 0, ',', '.') }}
                                    </td>
                                    <td colspan="3" class="py-4 px-4 text-xs font-semibold text-gray-600">
                                        Total kalkulasi otomatis seluruh pengeluaran pada tanggal {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Kelola & Tambah Opsi Pengeluaran Master -->
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
                        <h3 class="text-base font-bold">Kelola Jenis Pengeluaran Master</h3>
                    </div>
                    <button type="button" @click="modalOpen = false" class="text-amber-100 hover:text-white focus:outline-none">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <div class="p-6">
                    <p class="text-sm text-gray-600 mb-4">
                        Tambahkan jenis pengeluaran baru. Jenis ini akan otomatis muncul setiap hari di tabel pengeluaran harian dan pilihan dropdown.
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
                            <label class="block text-gray-700 text-xs font-bold uppercase mb-1" for="modal_nama_opsi_index">
                                Nama Pengeluaran Baru
                            </label>
                            <div class="flex space-x-2">
                                <input type="text" id="modal_nama_opsi_index" x-model="newOpsiNama" placeholder="Contoh: BBM Kendaraan, Konsumsi, dll..." class="shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500" :disabled="loadingOpsi">
                                <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-amber-600 hover:bg-amber-700 rounded-lg shadow transition whitespace-nowrap" :disabled="loadingOpsi">
                                    <svg x-show="loadingOpsi" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" style="display: none;">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                                    </svg>
                                    <span>+ Tambah</span>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Daftar Opsi Terdaftar -->
                    <div class="mt-6 pt-4 border-t border-gray-200">
                        <h4 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Daftar Jenis Tersedia (<span x-text="kategoriList.length"></span>)</h4>
                        <div class="max-h-48 overflow-y-auto space-y-1.5 pr-1">
                            <template x-for="item in kategoriList" :key="item.id">
                                <div class="flex items-center justify-between px-3 py-2 bg-gray-50 rounded text-sm text-gray-700 hover:bg-amber-50 transition">
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

                    <div class="mt-6 flex justify-end">
                        <button type="button" @click="modalOpen = false" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-800 bg-gray-100 hover:bg-gray-200 rounded-lg transition">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>