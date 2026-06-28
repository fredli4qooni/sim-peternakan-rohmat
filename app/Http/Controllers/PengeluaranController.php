<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluarans = Pengeluaran::with('user')->orderBy('tanggal', 'desc')->latest()->paginate(10);
        return view('pengeluarans.index', compact('pengeluarans'));
    }

    public function create()
    {
        return view('pengeluarans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nama_pengeluaran' => 'required|string|max:255',
            'nominal' => 'required|integer|min:0',
            'keterangan' => 'nullable|string',
        ]);

        Pengeluaran::create([
            'tanggal' => $request->tanggal,
            'nama_pengeluaran' => $request->nama_pengeluaran,
            'nominal' => $request->nominal,
            'keterangan' => $request->keterangan,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('pengeluarans.index')->with('success', 'Data pengeluaran berhasil dicatat.');
    }

    public function edit(Pengeluaran $pengeluaran)
    {
        return view('pengeluarans.edit', compact('pengeluaran'));
    }

    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nama_pengeluaran' => 'required|string|max:255',
            'nominal' => 'required|integer|min:0',
            'keterangan' => 'nullable|string',
        ]);

        $pengeluaran->update([
            'tanggal' => $request->tanggal,
            'nama_pengeluaran' => $request->nama_pengeluaran,
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