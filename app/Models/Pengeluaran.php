<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $fillable = ['tanggal', 'nama_pengeluaran', 'nominal', 'keterangan', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
