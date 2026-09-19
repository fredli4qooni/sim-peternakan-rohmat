<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\KategoriPengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluarans = Pengeluaran::with('user')->orderBy('tanggal', 'desc')->latest()->paginate(10);
        $kategoris = KategoriPengeluaran::orderBy('nama')->get();
        return view('pengeluarans.index', compact('pengeluarans', 'kategoris'));
    }

    public function create()
    {
        $kategoris = KategoriPengeluaran::orderBy('nama')->get();
        return view('pengeluarans.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $namaPengeluaran = $request->input('nama_pengeluaran_select') === 'Lainnya'
            ? $request->input('nama_pengeluaran_manual')
            : ($request->input('nama_pengeluaran_select') ?: $request->input('nama_pengeluaran'));

        $request->merge(['nama_pengeluaran' => $namaPengeluaran]);

        $request->validate([
            'tanggal' => 'required|date',
            'nama_pengeluaran_select' => 'required|string',
            'nama_pengeluaran_manual' => 'required_if:nama_pengeluaran_select,Lainnya|nullable|string|max:255',
            'nama_pengeluaran' => 'required|string|max:255',
            'nominal' => 'required|integer|min:0',
            'keterangan' => 'nullable|string',
        ], [
            'nama_pengeluaran_select.required' => 'Pilih nama pengeluaran dari daftar opsi.',
            'nama_pengeluaran_manual.required_if' => 'Ketik nama pengeluaran jika memilih opsi Lainnya.',
            'nama_pengeluaran.required' => 'Nama pengeluaran wajib diisi.',
            'nominal.required' => 'Nominal pengeluaran wajib diisi.',
            'nominal.min' => 'Nominal tidak boleh bernilai negatif.',
        ]);

        Pengeluaran::create([
            'tanggal' => $request->tanggal,
            'nama_pengeluaran' => $namaPengeluaran,
            'nominal' => $request->nominal,
            'keterangan' => $request->keterangan,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('pengeluarans.index')->with('success', 'Data pengeluaran berhasil dicatat.');
    }

    public function edit(Pengeluaran $pengeluaran)
    {
        $kategoris = KategoriPengeluaran::orderBy('nama')->get();
        return view('pengeluarans.edit', compact('pengeluaran', 'kategoris'));
    }

    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $namaPengeluaran = $request->input('nama_pengeluaran_select') === 'Lainnya'
            ? $request->input('nama_pengeluaran_manual')
            : ($request->input('nama_pengeluaran_select') ?: $request->input('nama_pengeluaran'));

        $request->merge(['nama_pengeluaran' => $namaPengeluaran]);

        $request->validate([
            'tanggal' => 'required|date',
            'nama_pengeluaran_select' => 'required|string',
            'nama_pengeluaran_manual' => 'required_if:nama_pengeluaran_select,Lainnya|nullable|string|max:255',
            'nama_pengeluaran' => 'required|string|max:255',
            'nominal' => 'required|integer|min:0',
            'keterangan' => 'nullable|string',
        ], [
            'nama_pengeluaran_select.required' => 'Pilih nama pengeluaran dari daftar opsi.',
            'nama_pengeluaran_manual.required_if' => 'Ketik nama pengeluaran jika memilih opsi Lainnya.',
            'nama_pengeluaran.required' => 'Nama pengeluaran wajib diisi.',
            'nominal.required' => 'Nominal pengeluaran wajib diisi.',
            'nominal.min' => 'Nominal tidak boleh bernilai negatif.',
        ]);

        $pengeluaran->update([
            'tanggal' => $request->tanggal,
            'nama_pengeluaran' => $namaPengeluaran,
            'nominal' => $request->nominal,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('pengeluarans.index')->with('success', 'Data pengeluaran berhasil diupdate.');
    }

    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();
        return redirect()->route('pengeluarans.index')->with('success', 'Data pengeluaran berhasil dihapus.');
    }
}