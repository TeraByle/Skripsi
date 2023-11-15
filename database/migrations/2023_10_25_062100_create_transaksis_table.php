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
            $table->id();
            $table->string('TransaksiId')->default('');;
            $table->string('NamaBarang');
            $table->string('KodeBarang');
            $table->string('SatuanBarang');
            $table->integer('StokBarang');
            $table->string('KategoriBarang');
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
