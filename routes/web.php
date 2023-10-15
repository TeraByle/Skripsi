<?php

use App\Http\Controllers\produkController;
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

Route::get('/login', function () {
    return view('login');
});

Route::get('/homepage', function () {
    return view('homepage');
});

Route::get('/produk', function () {
    return view('produk');
});
Route::post('/produk',[produkController::class,'store']);

Route::get('/create', function () {
    return view('inputBarang');
});

Route::get('/updateBarang', function () {
    return view('updateBarang');
});

Route::get('/transaksi', function () {
    return view('transaksi');
});

Route::get('/laporan', function () {
    return view('laporan');
});

Route::get('/cetakLaporan', function () {
    return view('cetakLaporan');
});

Route::get('/akun', function () {
    return view('akun');
});

Route::get('/tambahAkun', function () {
    return view('tambahAkun');
});

Route::get('/updateakun', function () {
    return view('updateAkun');
});
