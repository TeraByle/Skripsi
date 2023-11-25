<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'TransaksiId',
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
    protected $primaryKey = 'KodeBarang';

    public static function getTransactionId()
    {

        $datePart = date("dmY");
        $lastBarang = Barang::orderBy('BarangId', 'desc')->first();
        $transaksiId = ($lastBarang) ? $lastBarang->TransaksiId : '01';
        $numberPart = str_pad(($lastBarang ? $lastBarang->BarangId : 0) % 10 + 1, 2, '0', STR_PAD_LEFT);
        $autoNumber = 'TRSCTSN ' . $datePart . '101' . $numberPart;

        return $autoNumber;

    }

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class, 'BarangId');
    }
}
