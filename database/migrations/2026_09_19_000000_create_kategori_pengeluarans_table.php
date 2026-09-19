<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kategori_pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->unique();
            $table->timestamps();
        });

        // Seed initial default options
        $defaultOptions = [
            'Pakan',
            'Listrik',
            'Obat',
            'Vaksin',
            'Gaji Karyawan',
        ];

        $now = now();
        $insertData = array_map(function ($nama) use ($now) {
            return [
                'nama' => $nama,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }, $defaultOptions);

        DB::table('kategori_pengeluarans')->insert($insertData);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_pengeluarans');
    }
};
