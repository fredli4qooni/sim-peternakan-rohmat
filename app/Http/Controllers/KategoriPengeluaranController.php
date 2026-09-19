<?php

namespace App\Http\Controllers;

use App\Models\KategoriPengeluaran;
use Illuminate\Http\Request;

class KategoriPengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kategoris = KategoriPengeluaran::orderBy('nama')->get();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'data' => $kategoris,
            ]);
        }

        return redirect()->route('pengeluarans.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100|unique:kategori_pengeluarans,nama',
        ], [
            'nama.required' => 'Nama pengeluaran wajib diisi.',
            'nama.unique' => 'Nama pengeluaran ini sudah terdaftar.',
            'nama.max' => 'Nama pengeluaran maksimal 100 karakter.',
        ]);

        $kategori = KategoriPengeluaran::create([
            'nama' => trim($request->nama),
        ]);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Nama pengeluaran baru berhasil ditambahkan.',
                'data' => $kategori,
            ], 201);
        }

        return redirect()->back()->with('success', 'Nama pengeluaran berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, KategoriPengeluaran $kategoriPengeluaran)
    {
        $kategoriPengeluaran->delete();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Nama pengeluaran berhasil dihapus.',
            ]);
        }

        return redirect()->back()->with('success', 'Nama pengeluaran berhasil dihapus.');
    }
}
