<?php

namespace App\Observers;

use App\Models\Penjualan;
use App\Models\Stok;

class PenjualanObserver
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

    public function created(Penjualan $penjualan): void
    {
        $this->getStok()->decrement('total_stok', $penjualan->jumlah);
    }

    public function updated(Penjualan $penjualan): void
    {
        $selisih = $penjualan->jumlah - $penjualan->getOriginal('jumlah');
        
        if ($selisih > 0) {
            $this->getStok()->decrement('total_stok', $selisih);
        } elseif ($selisih < 0) {
            $this->getStok()->increment('total_stok', abs($selisih));
        }
    }

    public function deleted(Penjualan $penjualan): void
    {
        $this->getStok()->increment('total_stok', $penjualan->jumlah);
    }

}