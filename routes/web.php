<?php

use App\Http\Controllers\Auth\AdminsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\Barang\produkController;
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
// home
Route::get('/', [produkController::class, 'index'])->name('home');



Route::prefix('superAdmin')->group(function(){
    // Route::get('/produk', [produkController::class, 'index'])->name('produk');
    Route::get('/inputBarang', [produkController::class, 'create'])->name('input_barang');
    Route::post('/produk_store',[produkController::class,'store'])->name('store_produk');
    Route::get('/updateBarang/{BarangId}/edit', [produkController::class, 'edit']);
    Route::put('/updateBarang/{BarangId}', [produkController::class, 'update']);
    Route::delete('/produk/{BarangId}',[produkController::class,'destroy']);

    Route::get('/transaksi', [transaksiController::class, 'index'])->name('transaksi');
    Route::post('/transaksi',[transaksiController::class,'store']);
    Route::get('/tambahTransaksi', [transaksiController::class, 'create']);
    Route::get('/updateTransaksi/{TransaksiId}/edit', [transaksiController::class, 'edit']);
    Route::put('/updateTransaksi/{TransaksiId}', [transaksiController::class, 'update']);
    Route::delete('/transaksi/{TransaksiId}',[transaksiController::class,'destroy']);


    Route::get('/akun', [AdminsController::class, 'index'])->name('account_manangement');
    Route::get('/tambah-akun', [AdminsController::class, 'create'])->name('create_account');



    Route::get('/cetakLaporan', function () {
        return view('superAdmin/cetakLaporan');
    });

    // Route::get('/akun', function () {
    //     return view('superAdmin/akun');
    // });

    Route::get('/tambahAkun', function () {
        return view('tambahAkun');
    });

    Route::get('/updateakun', function () {
        return view('/superAdmin/updateAkun');
    });

    Route::get('/produkAdmin', function () {
        return view('/admin/produkAdmin');
    });
});

Route::prefix('admin')->group(function(){
    Route::get('/produk', [produkController::class, 'index']);
    Route::post('/produk',[produkController::class,'store']);
    Route::get('/inputBarang', [produkController::class, 'create']);
    Route::get('/updateBarang/{BarangId}/edit', [produkController::class, 'edit']);
    Route::put('/updateBarang/{BarangId}', [produkController::class, 'update']);
    Route::delete('/produk/{BarangId}',[produkController::class,'destroy']);

    Route::get('/transaksi', function () {
        return view('/admin/transaksi');
    });

    Route::get('/tambahTransaksi', function () {
        return view('/admin/Transaksi');
    });

    Route::get('/produkAdmin', function () {
        return view('/admin/produkAdmin');
    });
});



Route::get('/listBarang',[SessionController::class,'listBarang']);
