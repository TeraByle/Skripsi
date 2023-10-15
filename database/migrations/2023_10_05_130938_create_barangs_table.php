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
        Schema::create('barang', function (Blueprint $table) {
            $table->bigIncrements('BarangId');
            $table->string('KodeBarang');
            $table->string('NamaBarang');
            $table->string('JenisBarang');
            $table->string('SatuanBarang');
            $table->string('KategoriBarang');
            $table->string('BrandBarang');
            $table->integer('StokBarang');
            $table->date('TanggalBeli');
            $table->integer('HargaBeli');
            $table->integer('HargaJual');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
