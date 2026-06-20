<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Pelanggan;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::with(['user', 'pelanggan'])->latest()->paginate(10);
        return view('penjualans.index', compact('penjualans'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::orderBy('nama')->get();
        return view('penjualans.create', compact('pelanggans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_pelanggan' => 'required|in:agen,umum',
            'pelanggan_id' => 'nullable|required_if:jenis_pelanggan,agen|exists:pelanggans,id',
            'nama_pelanggan' => 'nullable|string|max:255',
            'jumlah' => 'required|numeric|min:0.01',
            'harga_satuan' => 'required|numeric|min:0',
        ]);

        $stok = Stok::firstOrCreate(['id' => 1], ['total_stok' => 0]);
        
        if ($stok->total_stok < $request->jumlah) {
            return back()->withInput()->withErrors([
                'jumlah' => 'Stok tidak mencukupi! Stok saat ini: ' . $stok->total_stok
            ]);
        }

        $penjualan = Penjualan::create([
            'tanggal' => $request->tanggal,
            'pelanggan_id' => $request->jenis_pelanggan == 'agen' ? $request->pelanggan_id : null,
            'nama_pelanggan' => $request->jenis_pelanggan == 'umum' ? $request->nama_pelanggan : null,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'total_harga' => $request->jumlah * $request->harga_satuan,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('penjualans.print', $penjualan->id)
                         ->with('success', 'Transaksi penjualan berhasil dicatat.');
    }

    public function show(Penjualan $penjualan)
    {
        return view('penjualans.show', compact('penjualan'));
    }

    public function edit(Penjualan $penjualan)
    {
        $pelanggans = Pelanggan::orderBy('nama')->get();
        return view('penjualans.edit', compact('penjualan', 'pelanggans'));
    }

    public function update(Request $request, Penjualan $penjualan)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jenis_pelanggan' => 'required|in:agen,umum',
            'pelanggan_id' => 'nullable|required_if:jenis_pelanggan,agen|exists:pelanggans,id',
            'nama_pelanggan' => 'nullable|string|max:255',
            'jumlah' => 'required|numeric|min:0.01',
            'harga_satuan' => 'required|numeric|min:0',
        ]);

        $stok = Stok::firstOrCreate(['id' => 1], ['total_stok' => 0]);
        
        $selisih = $request->jumlah - $penjualan->jumlah;
        
        if ($selisih > 0 && $stok->total_stok < $selisih) {
            return back()->withInput()->withErrors([
                'jumlah' => 'Stok tidak mencukupi untuk tambahan ini! Stok tersedia: ' . $stok->total_stok
            ]);
        }

        $penjualan->update([
            'tanggal' => $request->tanggal,
            'pelanggan_id' => $request->jenis_pelanggan == 'agen' ? $request->pelanggan_id : null,
            'nama_pelanggan' => $request->jenis_pelanggan == 'umum' ? $request->nama_pelanggan : null,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'total_harga' => $request->jumlah * $request->harga_satuan,
        ]);

        return redirect()->route('penjualans.index')
                         ->with('success', 'Transaksi penjualan berhasil diupdate.');
    }

    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();
        return redirect()->route('penjualans.index')
                         ->with('success', 'Transaksi penjualan berhasil dihapus.');
    }

    public function print(Penjualan $penjualan)
    {
        return view('penjualans.print', compact('penjualan'));
    }
}