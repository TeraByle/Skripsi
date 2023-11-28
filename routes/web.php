<?php

use App\Http\Controllers\Auth\AdminsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\Barang\produkController;
use App\Http\Controllers\Laporan\CetakLaporanController;
use App\Http\Controllers\transaksiController;
use App\Models\transaksi;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//  Auth
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/loging_in', [LoginController::class, 'store'])->name('login_store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// home Admin
Route::get('/', [produkController::class, 'index'])->name('home');


Route::prefix('superAdmin')->group(function(){
    // produk
    Route::get('/inputBarang', [produkController::class, 'create'])->name('input_barang');
    Route::post('/produk_store',[produkController::class,'store'])->name('store_produk');
    Route::get('/updateBarang/{BarangId}/edit', [produkController::class, 'edit']);
    Route::put('/updateBarang/{BarangId}', [produkController::class, 'update']);
    Route::delete('/produk/{BarangId}',[produkController::class,'destroy']);

    // transaksi
    Route::get('/transaksi', [transaksiController::class, 'index'])->name('transaksi');
    Route::post('/transaksi',[transaksiController::class,'store']);
    Route::get('/tambahTransaksi', [transaksiController::class, 'create']);
    Route::get('/updateTransaksi/{TransaksiId}/edit', [transaksiController::class, 'edit']);
    Route::put('/updateTransaksi/{TransaksiId}', [transaksiController::class, 'update']);
    Route::delete('/transaksi/{TransaksiId}',[transaksiController::class,'destroy']);

    // cetak laporan
    Route::get('/cetak-laporan', [CetakLaporanController::class, 'index'])->name('cetakdata');

    // akun manajemen
    Route::get('/akun', [AdminsController::class, 'index'])->name('account_management');
    Route::get('/tambah-akun', [AdminsController::class, 'create'])->name('create_account');
    Route::post('/store-akun', [AdminsController::class, 'store'])->name('store_akun');

    Route::get('/updateakun', function () {
        return view('/superAdmin/updateAkun');
    });
});

Route::prefix('admin')->group(function(){
    Route::get('/homepage', [produkController::class, 'index2'])->name('homepage.admin');
    Route::get('/inputBarang', [produkController::class, 'create'])->name('input_barang');
    Route::post('/produk_store',[produkController::class,'store'])->name('store_produk');
    Route::get('/uProdukAdmin/{BarangId}/edit', [produkController::class, 'edit']);
    Route::put('/uProdukAdmin/{BarangId}', [produkController::class, 'update']);
    Route::delete('/produkAdmin/{BarangId}',[produkController::class,'destroy']);

    // transaksi
    Route::get('/transaksiAdmin', [transaksiController::class, 'index'])->name('transaksi');
    Route::post('/transaksiAdmin',[transaksiController::class,'store']);
    Route::get('/tTransaksiAdmin', [transaksiController::class, 'create']);
    Route::get('/uTransaksiAdmin/{TransaksiId}/edit', [transaksiController::class, 'edit']);
    Route::put('/uTransaksiAdmin/{TransaksiId}', [transaksiController::class, 'update']);
    Route::delete('/transaksiAdmin/{TransaksiId}',[transaksiController::class,'destroy']);

});

Route::get('/homepage', function () {
    return view('/user/homepage');
});

