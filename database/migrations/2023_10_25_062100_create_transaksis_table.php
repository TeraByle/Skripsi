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
            $table->bigIncrements('TransaksiId');
            $table->string('KodeBarang');
            $table->string('NamaBarang');
            $table->string('KategoriBarang');
            $table->string('SatuanBarang');
            $table->integer('JumlahBarang');
            $table->integer('HargaBarang');
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
