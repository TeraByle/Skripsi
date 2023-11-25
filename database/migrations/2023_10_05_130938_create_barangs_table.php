<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id('BarangId');
            $table->string('TransaksiId');
            $table->string('KodeBarang');
            $table->string('NamaBarang');
            $table->string('JenisBarang');
            $table->string('SatuanBarang');
            $table->string('KategoriBarang');
            $table->string('BrandBarang');
            $table->integer('StokBarang');
            $table->date('TanggalBeli');
            $table->string('HargaBeli');
            $table->string('HargaJual');
            $table->date('tanggal');
            $table->text('gambar');
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
