<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Pengeluaran;
use App\Models\Produksi;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function labaRugi(Request $request)
    {
        $bulan = $request->input('bulan', date('m'));
        $tahun = $request->input('tahun', date('Y'));

        $total_penjualan_telur = Penjualan::whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->sum('total_harga');

        $total_penjualan_ayam = \App\Models\PopulasiAyam::where('jenis', 'terjual')
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->sum('total_harga');

        $total_pendapatan = $total_penjualan_telur + $total_penjualan_ayam;

        $total_pengeluaran = Pengeluaran::whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->sum('nominal');

        $laba_bersih = $total_pendapatan - $total_pengeluaran;

        return view('laporan.laba_rugi', compact('bulan', 'tahun', 'total_penjualan_telur', 'total_penjualan_ayam', 'total_pendapatan', 'total_pengeluaran', 'laba_bersih'));
    }

    public function produksi(Request $request)
    {
        $bulan = $request->input('bulan', date('m'));
        $tahun = $request->input('tahun', date('Y'));

        $produksis = \App\Models\Produksi::whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->orderBy('tanggal', 'desc')
            ->get();
            
        $total_produksi = $produksis->sum('jumlah_baik'); 

        return view('laporan.produksi', compact('bulan', 'tahun', 'produksis', 'total_produksi'));
    }

    public function penjualan(Request $request)
    {
        $bulan = $request->input('bulan', date('m'));
        $tahun = $request->input('tahun', date('Y'));

        $penjualans = Penjualan::with('pelanggan')->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->orderBy('tanggal', 'desc')
            ->get();

        $total_penjualan = $penjualans->sum('total_harga');

        return view('laporan.penjualan', compact('bulan', 'tahun', 'penjualans', 'total_penjualan'));
    }
}