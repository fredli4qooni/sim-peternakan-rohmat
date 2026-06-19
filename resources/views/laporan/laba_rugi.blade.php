<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight print:hidden">
            {{ __('Laporan Laba/Rugi') }}
        </h2>
    </x-slot>

    <div class="py-12 print:py-0">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 print:hidden">
                <div class="p-6 text-gray-900 border-b border-gray-200">
                    <form action="{{ route('laporan.laba_rugi') }}" method="GET" class="flex flex-wrap space-x-4 items-end">
                        <div>
                            <label for="bulan" class="block text-sm font-medium text-gray-700">Bulan</label>
                            <select name="bulan" id="bulan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm">
                                @for($i=1; $i<=12; $i++)
                                    <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}" {{ $bulan == str_pad($i, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                                        {{ \Carbon\Carbon::create()->month($i)->translatedFormat('F') }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <div>
                            <label for="tahun" class="block text-sm font-medium text-gray-700">Tahun</label>
                            <select name="tahun" id="tahun" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm">
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
                        <h3 class="text-3xl font-bold uppercase tracking-wider text-gray-800">Laporan Laba / Rugi</h3>
                        <p class="text-gray-500 text-lg mt-2">Periode: {{ \Carbon\Carbon::create()->month((int)$bulan)->translatedFormat('F') }} {{ $tahun }}</p>
                    </div>

                    <table class="w-full text-left text-lg mb-8">
                        <tbody>
                            <tr>
                                <td class="py-3 font-semibold text-gray-700">Total Pendapatan (Penjualan)</td>
                                <td class="py-3 text-right font-bold text-green-600">
                                    Rp {{ number_format($total_penjualan, 0, ',', '.') }}
                                </td>
                            </tr>
                            <tr class="border-b-2 border-gray-300">
                                <td class="py-3 font-semibold text-gray-700">Total Pengeluaran Operasional</td>
                                <td class="py-3 text-right font-bold text-red-500">
                                    - Rp {{ number_format($total_pengeluaran, 0, ',', '.') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="py-4 font-extrabold text-xl text-gray-800">
                                    {{ $laba_bersih >= 0 ? 'Laba Bersih' : 'Rugi Bersih' }}
                                </td>
                                <td class="py-4 text-right font-extrabold text-2xl {{ $laba_bersih >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $laba_bersih < 0 ? '- ' : '' }}Rp {{ number_format(abs($laba_bersih), 0, ',', '.') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="text-center mt-8 print:hidden">
                        <button onclick="window.print()" class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded shadow flex items-center justify-center mx-auto">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                            Cetak Dokumen
                        </button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>