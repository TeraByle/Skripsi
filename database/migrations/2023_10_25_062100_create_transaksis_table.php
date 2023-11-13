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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('TransaksiId');
            $table->string('NamaBarang'); // Kolom untuk NamaBarang
            $table->string('KodeBarang'); // Kolom untuk KodeBarang
            $table->string('SatuanBarang'); // Kolom untuk SatuanBarang
            $table->integer('StokBarang'); // Kolom untuk StokBarang
            $table->string('KategoriBarang'); // Kolom untuk KategoriBarang
            $table->integer('HargaJual');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
