<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stok_ayams', function (Blueprint $table) {
            $table->id();
            $table->integer('total_aktif')->default(0);
            $table->timestamps();
        });

        Schema::create('populasi_ayams', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->enum('jenis', ['masuk', 'mati', 'terjual']);
            $table->integer('jumlah');
            $table->decimal('harga_satuan', 12, 2)->nullable();
            $table->decimal('total_harga', 15, 2)->nullable();
            $table->string('keterangan')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        Schema::table('produksis', function (Blueprint $table) {
            $table->decimal('jumlah_baik', 8, 2)->change();
        });

        Schema::table('stoks', function (Blueprint $table) {
            $table->decimal('total_stok', 10, 2)->change();
        });

        Schema::table('penjualans', function (Blueprint $table) {
            $table->decimal('jumlah', 8, 2)->change();
            $table->dropForeign(['pelanggan_id']);
            $table->dropColumn('pelanggan_id');
            $table->string('nama_pelanggan')->nullable()->after('tanggal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('populasi_ayams_and_alter_tables');
    }
};
