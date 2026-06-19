<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight print:hidden">
            {{ __('Laporan Produksi') }}
        </h2>
    </x-slot>

    <div class="py-12 print:py-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 print:hidden">
                <div class="p-6 text-gray-900 border-b border-gray-200">
                    <form action="{{ route('laporan.produksi') }}" method="GET" class="flex flex-wrap space-x-4 items-end">
                        <div>
                            <label for="bulan" class="block text-sm font-medium text-gray-700">Bulan</label>
                            <select name="bulan" id="bulan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 sm:text-sm">
                                @for($i=1; $i<=12; $i++)
                                    <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}" {{ $bulan == str_pad($i, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                                        {{ \Carbon\Carbon::create()->month($i)->translatedFormat('F') }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div>
                            <label for="tahun" class="block text-sm font-medium text-gray-700">Tahun</label>
                            <select name="tahun" id="tahun" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 sm:text-sm">
                                @for($i=date('Y'); $i>=date('Y')-5; $i--)
                                    <option value="{{ $i }}" {{ $tahun == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded shadow">
                                Filter Laporan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg print:shadow-none">
                <div class="p-8 text-gray-900">
                    <div class="text-center mb-8 border-b-2 border-gray-800 pb-4">
                        <h3 class="text-3xl font-bold uppercase tracking-wider text-gray-800">Laporan Produksi Telur</h3>
                        <p class="text-gray-500 text-lg mt-2">Periode: {{ \Carbon\Carbon::create()->month((int)$bulan)->translatedFormat('F') }} {{ $tahun }}</p>
                    </div>

                    <div class="overflow-x-auto mb-8">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-100 border-b-2 border-gray-300">
                                    <th class="py-3 px-4 font-semibold text-gray-700 w-16">No</th>
                                    <th class="py-3 px-4 font-semibold text-gray-700">Tanggal</th>
                                    <th class="py-3 px-4 font-semibold text-gray-700 text-right">Telur Baik</th>
                                    <th class="py-3 px-4 font-semibold text-gray-700 text-right">Telur Rusak</th>
                                    <th class="py-3 px-4 font-semibold text-gray-700">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($produksis as $index => $item)
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="py-3 px-4 text-gray-600">{{ $index + 1 }}</td>
                                    <td class="py-3 px-4 text-gray-600">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                                    <td class="py-3 px-4 text-right font-medium text-green-600">
                                        {{ number_format($item->jumlah_baik, 0, ',', '.') }} 
                                    </td>
                                    <td class="py-3 px-4 text-right font-medium text-red-500">
                                        {{ number_format($item->jumlah_rusak, 0, ',', '.') }} 
                                    </td>
                                    <td class="py-3 px-4 text-gray-600">{{ $item->keterangan ?: '-' }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="py-6 px-4 text-center text-gray-500 italic">Tidak ada data produksi pada periode ini.</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr class="bg-amber-50 border-t-2 border-amber-300">
                                    <td colspan="2" class="py-4 px-4 font-bold text-gray-800 text-right uppercase tracking-wider">Total Telur Baik:</td>
                                    <td class="py-4 px-4 font-extrabold text-amber-600 text-right text-xl">
                                        {{ number_format($total_produksi, 0, ',', '.') }}
                                    </td>
                                    <td colspan="2"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="text-center mt-8 print:hidden">
                        <button onclick="window.print()" class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded shadow flex items-center justify-center mx-auto transition">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                            Cetak Laporan
                        </button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>