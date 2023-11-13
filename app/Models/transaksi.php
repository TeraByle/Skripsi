<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    public function followers(){
        return $this -> belongsToMany(Barang::class, 'TransaksiId');
    }

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

  
        $transaction2 = date("dmy");
        $lastBarang = Barang::orderBy('BarangId', 'desc')->first();
        $nextId = ($lastBarang) ? $lastBarang->BarangId + 1 : 1;
        $paddedId = str_pad($nextId, 3, '0', STR_PAD_LEFT);
        return $transaction2 . '' . $paddedId;

    }

    protected $table = 'transaksi';
    public $timestamps = false;
}
