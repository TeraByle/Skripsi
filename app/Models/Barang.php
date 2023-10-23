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

    protected $fillable = [
        'BarangId',
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
    ];
    protected $table = 'barang';
    public $timestamps = false;
}
