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
        'tanggal'
    ];

    public static function getTransactionId()
    {

        $datePart = date("dmY");
        $lastTransaksi = Transaksi::orderBy('TransaksiId', 'desc')->first();
        $numberPart = $lastTransaksi ? ($lastDatePart = substr($lastTransaksi->TransaksiId, 5, 8)) == $datePart ? (int)substr($lastTransaksi->TransaksiId, -2) + 1 : 1 : 1;
        $transaksi = 'TRSCN' . $datePart . str_pad($numberPart, 2, '0', STR_PAD_LEFT);

        return $transaksi;

    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'BarangId');
    }


    protected $table = 'transaksi';
    public $timestamps = false;
}
