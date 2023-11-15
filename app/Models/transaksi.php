<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'TransaksiId',
        'KodeBarang' ,
        'NamaBarang' ,
        'SatuanBarang' ,
        'KategoriBarang' ,
        'StokBarang' ,
        'HargaJual' ,
    ];

    public static function getTransactionId()
    {
        $date = date("dmy");
        $lastBarang = Barang::orderBy('BarangId', 'desc')->first();
        $transaksiId = ($lastBarang) ? $lastBarang->TransaksiId : '01';
        $numberPart = str_pad(($lastBarang ? $lastBarang->BarangId : 0) % 10 + 1, 2, '0', STR_PAD_LEFT);
        $autoNumber = 'TRSCTSN ' . $date . '0' . $numberPart;
        return $autoNumber;
        // dd($autoNumber,$datePart,$numberPart);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'BarangId');
    }


    protected $table = 'transaksi';
    public $timestamps = false;
}
