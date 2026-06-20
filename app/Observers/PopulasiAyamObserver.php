<?php

namespace App\Observers;

use App\Models\PopulasiAyam;
use App\Models\StokAyam;

class PopulasiAyamObserver
{
    private function getStokAyam()
    {
        return StokAyam::firstOrCreate(
            ['id' => 1],
            ['total_aktif' => 0]
        );
    }

    public function created(PopulasiAyam $populasi): void
    {
        $stok = $this->getStokAyam();
        if ($populasi->jenis === 'masuk') {
            $stok->increment('total_aktif', $populasi->jumlah);
        } else {
            // mati atau terjual mengurangi stok
            $stok->decrement('total_aktif', $populasi->jumlah);
        }
    }

    public function updated(PopulasiAyam $populasi): void
    {
        $stok = $this->getStokAyam();
        $selisih = $populasi->jumlah - $populasi->getOriginal('jumlah');
        $jenisLama = $populasi->getOriginal('jenis');
        
        // Simplifikasi: kembalikan stok lama, lalu hitung ulang dengan data baru
        if ($jenisLama === 'masuk') {
            $stok->decrement('total_aktif', $populasi->getOriginal('jumlah'));
        } else {
            $stok->increment('total_aktif', $populasi->getOriginal('jumlah'));
        }

        if ($populasi->jenis === 'masuk') {
            $stok->increment('total_aktif', $populasi->jumlah);
        } else {
            $stok->decrement('total_aktif', $populasi->jumlah);
        }
    }

    public function deleted(PopulasiAyam $populasi): void
    {
        $stok = $this->getStokAyam();
        if ($populasi->jenis === 'masuk') {
            $stok->decrement('total_aktif', $populasi->jumlah);
        } else {
            $stok->increment('total_aktif', $populasi->jumlah);
        }
    }
}
