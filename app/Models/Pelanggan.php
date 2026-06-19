<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = ['nama', 'alamat', 'no_telp'];

    public function penjualans()
    {
        return $this->hasMany(Penjualan::class);
    }
}
