<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'KodeBarang',
        'NamaBarang',
        'JenisBarang',
        'SatuanBarang',
        'KategoriBarang',
        'BrandBarang',
        'StokBarang',
        'TanggalBeli',
        'HargaBeli',
        'HargaJual',
        'gambar',
        'tanggal'
    ];

    protected $table = 'barang';
    public $timestamps = false;
    protected $primaryKey = 'BarangId';

    public static function getKodeBarang()
    {
        $datePart = date("dmY");
        $lastBarang = Barang::orderBy('KodeBarang', 'desc')->first();
        $numberPart = $lastBarang ? $lastBarang->BarangId % 100 + 1 : 1; // Menggunakan BarangId

        $kodeBarang = 'BR' . $datePart . str_pad($numberPart, 2, '0', STR_PAD_LEFT);

        // if ($lastBarang) {
        //     $lastBarang->update(['BarangId' => $lastBarang->BarangId + 1]);
        // } else {
        //     // Jika tidak ada barang sebelumnya, membuat barang baru dengan BarangId 1
        //     Barang::create(['KodeBarang' => $kodeBarang, 'BarangId' => 1]);
        // }
    
        return $kodeBarang;
    }


    public function transaksi()
    {
        return $this->hasOne(Transaksi::class, 'BarangId');
    }
}
