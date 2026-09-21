<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\KategoriPengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PengeluaranController extends Controller
{
    public function index(Request $request)
    {
        // Ambil tanggal terpilih (default: hari ini)
        $tanggal = $request->input('tanggal', date('Y-m-d'));
        try {
            $parsedDate = Carbon::parse($tanggal);
            $tanggal = $parsedDate->format('Y-m-d');
        } catch (\Exception $e) {
            $tanggal = date('Y-m-d');
            $parsedDate = Carbon::parse($tanggal);
        }

        $tanggalKemarin = $parsedDate->copy()->subDay()->format('Y-m-d');
        $tanggalBesok = $parsedDate->copy()->addDay()->format('Y-m-d');
        $tanggalHariIni = date('Y-m-d');

        // Ambil semua master kategori pengeluaran
        $kategoris = KategoriPengeluaran::orderBy('nama')->get();

        // Ambil transaksi pengeluaran pada tanggal tersebut
        $pengeluaransHariIni = Pengeluaran::with('user')
            ->whereDate('tanggal', $tanggal)
            ->get();

        // Susun baris tabel untuk setiap kategori master
        $tableRows = [];
        $matchedExpenseIds = [];

        foreach ($kategoris as $kategori) {
            $matches = $pengeluaransHariIni->filter(function ($item) use ($kategori) {
                return strtolower(trim($item->nama_pengeluaran)) === strtolower(trim($kategori->nama));
            });

            if ($matches->isNotEmpty()) {
                $totalNominal = $matches->sum('nominal');
                $keterangan = $matches->pluck('keterangan')->filter()->implode('; ');
                $dicatatOleh = $matches->map(fn($m) => $m->user->name ?? '-')->unique()->implode(', ');
                $primaryItem = $matches->first();

                foreach ($matches as $m) {
                    $matchedExpenseIds[] = $m->id;
                }

                $tableRows[] = [
                    'id' => $primaryItem->id,
                    'nama' => $kategori->nama,
                    'nominal' => $totalNominal,
                    'keterangan' => $keterangan,
                    'dicatat_oleh' => $dicatatOleh,
                    'has_data' => true,
                    'is_custom' => false,
                ];
            } else {
                $tableRows[] = [
                    'id' => null,
                    'nama' => $kategori->nama,
                    'nominal' => 0,
                    'keterangan' => null,
                    'dicatat_oleh' => '-',
                    'has_data' => false,
                    'is_custom' => false,
                ];
            }
        }

        // Tambahkan pengeluaran kustom di tanggal ini jika ada yang di luar kategori master
        $customExpenses = $pengeluaransHariIni->reject(function ($item) use ($matchedExpenseIds) {
            return in_array($item->id, $matchedExpenseIds);
        });

        if ($customExpenses->isNotEmpty()) {
            $groupedCustom = $customExpenses->groupBy(fn($item) => strtolower(trim($item->nama_pengeluaran)));
            foreach ($groupedCustom as $nameGroup => $items) {
                $tableRows[] = [
                    'id' => $items->first()->id,
                    'nama' => $items->first()->nama_pengeluaran,
                    'nominal' => $items->sum('nominal'),
                    'keterangan' => $items->pluck('keterangan')->filter()->implode('; '),
                    'dicatat_oleh' => $items->map(fn($m) => $m->user->name ?? '-')->unique()->implode(', '),
                    'has_data' => true,
                    'is_custom' => true,
                ];
            }
        }

        // Total pengeluaran pada tanggal tersebut
        $totalHarian = collect($tableRows)->sum('nominal');

        return view('pengeluarans.index', compact(
            'tanggal',
            'parsedDate',
            'tanggalKemarin',
            'tanggalBesok',
            'tanggalHariIni',
            'tableRows',
            'totalHarian',
            'kategoris'
        ));
    }

    public function create(Request $request)
    {
        $kategoris = KategoriPengeluaran::orderBy('nama')->get();
        $defaultTanggal = $request->input('tanggal', date('Y-m-d'));
        $defaultKategori = $request->input('kategori', '');

        return view('pengeluarans.create', compact('kategoris', 'defaultTanggal', 'defaultKategori'));
    }

    public function store(Request $request)
    {
        $namaPengeluaran = $request->input('nama_pengeluaran_select') === 'Lainnya'
            ? trim($request->input('nama_pengeluaran_manual'))
            : trim($request->input('nama_pengeluaran_select') ?: $request->input('nama_pengeluaran'));

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

        // Cek apakah sudah ada pengeluaran dengan nama yang sama di tanggal yang sama (akumulasi tanpa duplikasi)
        $existing = Pengeluaran::whereDate('tanggal', $request->tanggal)
            ->whereRaw('LOWER(TRIM(nama_pengeluaran)) = ?', [strtolower($namaPengeluaran)])
            ->first();

        if ($existing) {
            $nominalLama = $existing->nominal;
            $existing->nominal += $request->nominal;

            if ($request->filled('keterangan')) {
                $existing->keterangan = $existing->keterangan
                    ? ($existing->keterangan . '; ' . trim($request->keterangan))
                    : trim($request->keterangan);
            }

            $existing->save();

            return redirect()->route('pengeluarans.index', ['tanggal' => $request->tanggal])
                ->with('success', "Pengeluaran '{$existing->nama_pengeluaran}' pada tanggal ini berhasil dijumlahkan (Rp " . number_format($nominalLama, 0, ',', '.') . " + Rp " . number_format($request->nominal, 0, ',', '.') . " = Rp " . number_format($existing->nominal, 0, ',', '.') . ").");
        }

        Pengeluaran::create([
            'tanggal' => $request->tanggal,
            'nama_pengeluaran' => $namaPengeluaran,
            'nominal' => $request->nominal,
            'keterangan' => $request->keterangan,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('pengeluarans.index', ['tanggal' => $request->tanggal])
            ->with('success', "Data pengeluaran '{$namaPengeluaran}' berhasil dicatat.");
    }

    public function edit(Pengeluaran $pengeluaran)
    {
        $kategoris = KategoriPengeluaran::orderBy('nama')->get();
        return view('pengeluarans.edit', compact('pengeluaran', 'kategoris'));
    }

    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $namaPengeluaran = $request->input('nama_pengeluaran_select') === 'Lainnya'
            ? trim($request->input('nama_pengeluaran_manual'))
            : trim($request->input('nama_pengeluaran_select') ?: $request->input('nama_pengeluaran'));

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

        return redirect()->route('pengeluarans.index', ['tanggal' => $request->tanggal])
            ->with('success', 'Data pengeluaran berhasil diupdate.');
    }

    public function destroy(Pengeluaran $pengeluaran)
    {
        $tanggal = $pengeluaran->tanggal;
        $pengeluaran->delete();

        return redirect()->route('pengeluarans.index', ['tanggal' => $tanggal])
            ->with('success', 'Data pengeluaran berhasil dihapus.');
    }
}