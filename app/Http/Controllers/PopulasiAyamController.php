<?php

namespace App\Http\Controllers;

use App\Models\PopulasiAyam;
use App\Models\StokAyam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PopulasiAyamController extends Controller
{
    public function index()
    {
        $populasi_ayams = PopulasiAyam::with('user')->orderBy('tanggal', 'desc')->paginate(10);
        $stok_ayam = StokAyam::first();
        $total_aktif = $stok_ayam ? $stok_ayam->total_aktif : 0;
        
        $masuk_bulan_ini = PopulasiAyam::where('jenis', 'masuk')->whereMonth('tanggal', date('m'))->whereYear('tanggal', date('Y'))->sum('jumlah');
        $mati_bulan_ini = PopulasiAyam::where('jenis', 'mati')->whereMonth('tanggal', date('m'))->whereYear('tanggal', date('Y'))->sum('jumlah');
        $terjual_bulan_ini = PopulasiAyam::where('jenis', 'terjual')->whereMonth('tanggal', date('m'))->whereYear('tanggal', date('Y'))->sum('jumlah');

        return view('populasi_ayams.index', compact('populasi_ayams', 'total_aktif', 'masuk_bulan_ini', 'mati_bulan_ini', 'terjual_bulan_ini'));
    }

    public function create()
    {
        if (Auth::user()->role === 'pemilik') abort(403);
        return view('populasi_ayams.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()->role === 'pemilik') abort(403);

        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jenis' => 'required|in:masuk,mati,terjual',
            'jumlah' => 'required|integer|min:1',
            'harga_satuan' => 'nullable|numeric|min:0',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $validated['user_id'] = Auth::id();

        if ($validated['jenis'] === 'terjual') {
            $validated['total_harga'] = ($validated['harga_satuan'] ?? 0) * $validated['jumlah'];
        }

        PopulasiAyam::create($validated);

        return redirect()->route('populasi_ayams.index')->with('success', 'Catatan populasi ayam berhasil ditambahkan.');
    }

    public function edit(PopulasiAyam $populasiAyam)
    {
        if (Auth::user()->role === 'pemilik') abort(403);
        return view('populasi_ayams.edit', compact('populasiAyam'));
    }

    public function update(Request $request, PopulasiAyam $populasiAyam)
    {
        if (Auth::user()->role === 'pemilik') abort(403);

        $validated = $request->validate([
            'tanggal' => 'required|date',
            'jenis' => 'required|in:masuk,mati,terjual',
            'jumlah' => 'required|integer|min:1',
            'harga_satuan' => 'nullable|numeric|min:0',
            'keterangan' => 'nullable|string|max:255',
        ]);

        if ($validated['jenis'] === 'terjual') {
            $validated['total_harga'] = ($validated['harga_satuan'] ?? 0) * $validated['jumlah'];
        } else {
            $validated['harga_satuan'] = null;
            $validated['total_harga'] = null;
        }

        $populasiAyam->update($validated);

        return redirect()->route('populasi_ayams.index')->with('success', 'Catatan populasi ayam berhasil diperbarui.');
    }

    public function destroy(PopulasiAyam $populasiAyam)
    {
        if (Auth::user()->role === 'pemilik') abort(403);
        $populasiAyam->delete();
        return redirect()->route('populasi_ayams.index')->with('success', 'Catatan populasi ayam berhasil dihapus.');
    }
}
