<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produksi extends Model
{
    protected $fillable = ['tanggal', 'jumlah_baik', 'jumlah_rusak', 'keterangan', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
