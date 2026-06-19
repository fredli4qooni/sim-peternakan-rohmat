<?php

namespace App\Observers;

use App\Models\Produksi;
use App\Models\Stok;

class ProduksiObserver
{
    /**
     * Helper untuk memastikan record stok selalu ada
     */
    private function getStok()
    {
        return Stok::firstOrCreate(
            ['id' => 1],
            ['total_stok' => 0]
        );
    }

    public function created(Produksi $produksi): void
    {
        $this->getStok()->increment('total_stok', $produksi->jumlah_baik);
    }

    public function updated(Produksi $produksi): void
    {
        $selisih = $produksi->jumlah_baik - $produksi->getOriginal('jumlah_baik');
        
        if ($selisih > 0) {
            $this->getStok()->increment('total_stok', $selisih);
        } elseif ($selisih < 0) {
            $this->getStok()->decrement('total_stok', abs($selisih));
        }
    }

    public function deleted(Produksi $produksi): void
    {
        $this->getStok()->decrement('total_stok', $produksi->jumlah_baik);
    }

}