<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopulasiAyam extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'jenis',
        'jumlah',
        'harga_satuan',
        'total_harga',
        'keterangan',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
