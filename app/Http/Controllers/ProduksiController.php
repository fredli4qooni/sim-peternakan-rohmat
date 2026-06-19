<?php

namespace App\Http\Controllers;

use App\Models\Produksi;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProduksiController extends Controller
{
    public function index()
    {
        $produksis = Produksi::with('user')->latest()->paginate(10);
        
        $stok = Stok::firstOrCreate(['id' => 1], ['total_stok' => 0]);
        
        return view('produksis.index', compact('produksis', 'stok'));
    }

    public function create()
    {
        return view('produksis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jumlah_baik' => 'required|integer|min:0',
            'jumlah_rusak' => 'required|integer|min:0',
            'keterangan' => 'nullable|string',
        ]);

        Produksi::create([
            'tanggal' => $request->tanggal,
            'jumlah_baik' => $request->jumlah_baik,
            'jumlah_rusak' => $request->jumlah_rusak,
            'keterangan' => $request->keterangan,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('produksis.index')->with('success', 'Data produksi berhasil dicatat.');
    }

    public function edit(Produksi $produksi)
    {
        return view('produksis.edit', compact('produksi'));
    }

    public function update(Request $request, Produksi $produksi)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jumlah_baik' => 'required|integer|min:0',
            'jumlah_rusak' => 'required|integer|min:0',
            'keterangan' => 'nullable|string',
        ]);

        $stok = Stok::firstOrCreate(['id' => 1], ['total_stok' => 0]);
        $selisih = $request->jumlah_baik - $produksi->jumlah_baik;

        if ($selisih < 0 && $stok->total_stok < abs($selisih)) {
            return back()->withInput()->withErrors([
                'jumlah_baik' => 'Revisi gagal! Stok saat ini tidak cukup untuk dikurangi (telur mungkin sudah terjual). Stok tersedia: ' . $stok->total_stok
            ]);
        }

        $produksi->update([
            'tanggal' => $request->tanggal,
            'jumlah_baik' => $request->jumlah_baik,
            'jumlah_rusak' => $request->jumlah_rusak,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('produksis.index')->with('success', 'Data produksi berhasil diupdate.');
    }

    public function destroy(Produksi $produksi)
    {
        $stok = Stok::firstOrCreate(['id' => 1], ['total_stok' => 0]);
        
        if ($stok->total_stok < $produksi->jumlah_baik) {
            return back()->withErrors(['Hapus gagal! Stok telur dari produksi ini mungkin sudah terjual.']);
        }

        $produksi->delete();
        return redirect()->route('produksis.index')->with('success', 'Data produksi berhasil dihapus.');
    }
}