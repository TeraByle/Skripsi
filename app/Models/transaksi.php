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
        'KodeBarang',
        'NamaBarang',
        'KategoriBarang',
        'SatuanBarang',
        'JumlahBarang',
        'HargaBarang',
    ];
    protected $table = 'transaksi';
    public $timestamps = false;
}
