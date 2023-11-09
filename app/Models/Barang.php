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
}
