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
        'HargaBarang',
        'StokBarang',
        'TanggalBeli',
        'HargaBeli',
        'HargaJual',
    ];
    protected $table = 'barang';
    public $timestamps = false;
}
