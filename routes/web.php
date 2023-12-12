<?php

use App\Http\Controllers\Auth\AdminsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Barang\produkAdminController;
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

Route::get('/homepage', function () {
    return view('/user/homepage');
});

//  Auth
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/loging_in', [LoginController::class, 'store'])->name('login_store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function(){
    Route::prefix('superAdmin')->group(function(){
        Route::get('/home', [produkController::class, 'index'])->name('home');
        // produk
        Route::get('/inputBarang', [produkController::class, 'create'])->name('input_barang');
        Route::post('/store_produk',[produkController::class, 'store'])->name('store_produk');
        Route::get('/updateBarang/{BarangId}/edit', [produkController::class, 'edit'])->name('edit_barang');
        Route::put('/updateBarang/{BarangId}', [produkController::class, 'update'])->name('update_barang');
        Route::delete('/produk/{BarangId}',[produkController::class,'destroy'])->name('delete_barang');

        // transaksi
        Route::get('/transaksi', [transaksiController::class, 'index'])->name('transaksi');
        Route::get('/tambahTransaksi', [transaksiController::class, 'create'])->name('create_transaksi');
        Route::post('/transaksi',[transaksiController::class,'store'])->name('store_transaksi');
        Route::get('/updateTransaksi/{id}/edit', [transaksiController::class, 'edit'])->name('edit_transaksi');
        Route::put('/updateTransaksi/{id}', [transaksiController::class, 'update'])->name('update_transaksi');
        Route::delete('/transaksi/{id}',[transaksiController::class,'destroy'])->name('delete_transaksi');
        // tranasksi barang
        Route::get('/ajax/barang/{BarangId}', [transaksiController::class, 'ajax_dependentdropdown'])->name('ajax_barang');

        // cetak laporan
        Route::get('/cetak-laporan', [CetakLaporanController::class, 'index'])->name('cetakdata');
        Route::post('/cetak-laporans-semua', [CetakLaporanController::class, 'fetch_data'])->name('cetakdatasemua');
        Route::get('/unduh-pdf', [CetakLaporanController::class, 'cetakLaporan'])->name('unduhPDF');

        // akun manajemen
        Route::get('/akun', [AdminsController::class, 'index'])->name('account_management');
        Route::get('/tambah-akun', [AdminsController::class, 'create'])->name('create_account');
        Route::post('/store-akun', [AdminsController::class, 'store'])->name('store_akun');
        Route::get('/update-user-edit/{id}', [AdminsController::class, 'edit'])->name('edit_account');
        Route::put('/update-user/{id}', [AdminsController::class, 'update'])->name('update_account');
        Route::delete('/account-destroy/{id}',[AdminsController::class,'destroy'])->name('delete_account');

    });

    Route::prefix('admin')->group(function(){
        Route::get('/homepage', [produkAdminController::class, 'index'])->name('homepage');
        Route::get('/tambahBarangAdmin', [produkAdminController::class, 'create'])->name('tambah_barang');
        Route::post('/produk_store',[produkAdminController::class,'store'])->name('store_admin');
        Route::get('/updateBarangAdmin/{BarangId}/edit', [produkAdminController::class, 'edit']);
        Route::put('/updateBarangAdmin/{BarangId}', [produkAdminController::class, 'update']);
        Route::delete('/barangAdmin/{BarangId}',[produkAdminController::class,'destroy']);

        // transaksi
        Route::get('/transaksiAdmin', [transaksiController::class, 'index'])->name('transaksiAdmin');
        Route::post('/transaksiAdmin',[transaksiController::class,'store']);
        Route::get('/tambahTransaksiAdmin', [transaksiController::class, 'create']);
        Route::get('/updateTransaksiAdmin/{TransaksiId}/edit', [transaksiController::class, 'edit']);
        Route::put('/updateTransaksiAdmin/{TransaksiId}', [transaksiController::class, 'update']);
        Route::delete('/transaksiAdmin/{TransaksiId}',[transaksiController::class,'destroy']);

    });
});
