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
        $penjualans = Penjualan::with(['user', 'pelanggan'])->orderBy('tanggal', 'desc')->latest()->paginate(10);
        
        $total_history_penjualan = Penjualan::sum('jumlah');
        $total_pendapatan = Penjualan::sum('total_harga');
        
        return view('penjualans.index', compact('penjualans', 'total_history_penjualan', 'total_pendapatan'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::orderBy('nama')->get();
        return view('penjualans.create', compact('pelanggans'));
    }

    public function store(Request $request)
    {
        if ($request->has('jumlah')) {
            $request->merge(['jumlah' => str_replace(',', '.', $request->jumlah)]);
        }
        if ($request->has('harga_satuan')) {
            $request->merge(['harga_satuan' => str_replace(',', '.', $request->harga_satuan)]);
        }

        $request->validate([
            'tanggal' => 'required|date',
            'jenis_pelanggan' => 'required|in:agen,umum',
            'pelanggan_id' => 'nullable|required_if:jenis_pelanggan,agen|exists:pelanggans,id',
            'nama_pelanggan' => 'nullable|string|max:255',
            'jumlah' => 'required|numeric|min:0.01',
            'harga_satuan' => 'required|numeric|min:0',
        ]);

        $jumlah_input = $request->jumlah;
        $harga_input = $request->harga_satuan;

        if ($request->jenis_pelanggan === 'agen') {
            $jumlah_kg = $jumlah_input * 15;
            $harga_per_kg = $harga_input;
        } else {
            $jumlah_kg = $jumlah_input;
            $harga_per_kg = $harga_input;
        }

        $stok = Stok::firstOrCreate(['id' => 1], ['total_stok' => 0]);
        
        if ($stok->total_stok < $jumlah_kg) {
            return back()->withInput()->withErrors([
                'jumlah' => 'Stok tidak mencukupi! Stok saat ini: ' . $stok->total_stok . ' Kg'
            ]);
        }

        $penjualan = Penjualan::create([
            'tanggal' => $request->tanggal,
            'pelanggan_id' => $request->jenis_pelanggan == 'agen' ? $request->pelanggan_id : null,
            'nama_pelanggan' => $request->jenis_pelanggan == 'umum' ? $request->nama_pelanggan : null,
            'jumlah' => $jumlah_kg,
            'harga_satuan' => $harga_per_kg,
            'total_harga' => $jumlah_kg * $harga_per_kg,
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
        if ($request->has('jumlah')) {
            $request->merge(['jumlah' => str_replace(',', '.', $request->jumlah)]);
        }
        if ($request->has('harga_satuan')) {
            $request->merge(['harga_satuan' => str_replace(',', '.', $request->harga_satuan)]);
        }

        $request->validate([
            'tanggal' => 'required|date',
            'jenis_pelanggan' => 'required|in:agen,umum',
            'pelanggan_id' => 'nullable|required_if:jenis_pelanggan,agen|exists:pelanggans,id',
            'nama_pelanggan' => 'nullable|string|max:255',
            'jumlah' => 'required|numeric|min:0.01',
            'harga_satuan' => 'required|numeric|min:0',
        ]);

        $jumlah_input = $request->jumlah;
        $harga_input = $request->harga_satuan;

        if ($request->jenis_pelanggan === 'agen') {
            $jumlah_kg = $jumlah_input * 15;
            $harga_per_kg = $harga_input;
        } else {
            $jumlah_kg = $jumlah_input;
            $harga_per_kg = $harga_input;
        }

        $stok = Stok::firstOrCreate(['id' => 1], ['total_stok' => 0]);
        
        $selisih = $jumlah_kg - $penjualan->jumlah;
        
        if ($selisih > 0 && $stok->total_stok < $selisih) {
            return back()->withInput()->withErrors([
                'jumlah' => 'Stok tidak mencukupi untuk tambahan ini! Stok tersedia: ' . $stok->total_stok . ' Kg'
            ]);
        }

        $penjualan->update([
            'tanggal' => $request->tanggal,
            'pelanggan_id' => $request->jenis_pelanggan == 'agen' ? $request->pelanggan_id : null,
            'nama_pelanggan' => $request->jenis_pelanggan == 'umum' ? $request->nama_pelanggan : null,
            'jumlah' => $jumlah_kg,
            'harga_satuan' => $harga_per_kg,
            'total_harga' => $jumlah_kg * $harga_per_kg,
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