<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory()->create([
            'name' => 'Pemilik',
            'email' => 'pemilik@peternakan-rohmat.com',
            'role' => 'pemilik',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Karyawan',
            'email' => 'karyawan@peternakan-rohmat.com',
            'role' => 'karyawan',
        ]);

        \App\Models\Stok::create([
            'total_stok' => 0,
        ]);

        $defaultKategori = ['Pakan', 'Listrik', 'Obat', 'Vaksin', 'Gaji Karyawan'];
        foreach ($defaultKategori as $kat) {
            \App\Models\KategoriPengeluaran::firstOrCreate(['nama' => $kat]);
        }
    }
}