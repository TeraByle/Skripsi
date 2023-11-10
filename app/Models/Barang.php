<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    public function followers(){
        return $this -> belongsToMany(Barang::class, 'BarangId');
    }
    protected $primaryKey = 'barangId';
    protected $table = 'barang';
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
        'gambar'
    ];

    public $timestamps = false;

    public static function getTransactionId()
    {

        $datePart = date("dmY");
        $lastBarang = Barang::orderBy('BarangId', 'desc')->first();
        $transaksiId = ($lastBarang) ? $lastBarang->TransaksiId : '01';
        $numberPart = str_pad(($lastBarang ? $lastBarang->BarangId : 0) % 10 + 1, 2, '0', STR_PAD_LEFT);
        $autoNumber = 'TRSCTSN ' . $datePart . '00' . $numberPart;

        return $autoNumber;

    }
}
