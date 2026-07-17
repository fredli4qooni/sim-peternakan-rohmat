<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function (\Illuminate\Http\Request $request) {
    $bulan = $request->input('bulan', date('m'));
    $tahun = $request->input('tahun', date('Y'));

    $stok = \App\Models\Stok::first();
    $stok_ayam = \App\Models\StokAyam::first();
    $penjualan_bulan_ini = \App\Models\Penjualan::whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun)->sum('total_harga');
    $pengeluaran_bulan_ini = \App\Models\Pengeluaran::whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun)->sum('nominal');

    // Data dummy sederhana untuk grafik
    $grafik_penjualan = \App\Models\Penjualan::selectRaw('DAY(tanggal) as tanggal, SUM(total_harga) as total')
        ->whereMonth('tanggal', $bulan)
        ->whereYear('tanggal', $tahun)
        ->groupByRaw('DAY(tanggal)')
        ->orderByRaw('DAY(tanggal) ASC')
        ->get();

    $grafik_pengeluaran = \App\Models\Pengeluaran::selectRaw('DAY(tanggal) as tanggal, SUM(nominal) as total')
        ->whereMonth('tanggal', $bulan)
        ->whereYear('tanggal', $tahun)
        ->groupByRaw('DAY(tanggal)')
        ->orderByRaw('DAY(tanggal) ASC')
        ->get();

    return view('dashboard', compact('stok', 'stok_ayam', 'penjualan_bulan_ini', 'pengeluaran_bulan_ini', 'grafik_penjualan', 'grafik_pengeluaran', 'bulan', 'tahun'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// AKSES KHUSUS PEMILIK
Route::middleware(['auth', 'role:pemilik'])->group(function () {
    Route::resource('users', UserController::class);

    // Rute Laporan
    Route::get('/laporan/laba-rugi', [LaporanController::class, 'labaRugi'])->name('laporan.laba_rugi');
    Route::get('/laporan/produksi', [LaporanController::class, 'produksi'])->name('laporan.produksi');
    Route::get('/laporan/penjualan', [LaporanController::class, 'penjualan'])->name('laporan.penjualan');
    
    // Operasional Pemilik
    Route::resource('pengeluarans', PengeluaranController::class);
});

// AKSES BERSAMA (PEMILIK & KARYAWAN)
Route::middleware(['auth', 'role:pemilik,karyawan'])->group(function () {
    Route::resource('pelanggans', PelangganController::class);
    Route::resource('produksis', ProduksiController::class);
    Route::get('penjualans/{penjualan}/print', [PenjualanController::class, 'print'])->name('penjualans.print');
    Route::resource('penjualans', PenjualanController::class);
    Route::resource('populasi_ayams', \App\Http\Controllers\PopulasiAyamController::class);
});

require __DIR__ . '/auth.php';
