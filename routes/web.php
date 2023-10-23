<?php

use App\Http\Controllers\SessionController;
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
Route::get('/sesi', [SessionController::class, 'index']);

Route::get('/homepage', function () {
    return view('homepage');
});
//Route::resource('barang', produkController::class);
Route::get('/produk', [produkController::class, 'index']);
Route::post('/produk',[produkController::class,'store']);
Route::get('/updateBarang/{BarangId}/edit', [produkController::class, 'edit']);
Route::put('/updateBarang/{BarangId}', [produkController::class, 'update']);
Route::delete('/produk/{BarangId}',[produkController::class,'destroy']);

Route::get('/create', function () {
    return view('inputBarang');
});

Route::get('/updateBarang', function () {
    return view('updateBarang');
});

Route::get('/transaksi', function () {
    return view('transaksi');
});

Route::get('/tambahTransaksi', function () {
    return view('tambahTransaksi');
});

Route::get('/cetakLaporan', function () {
    return view('cetakLaporan');
});

Route::get('/akun', function () {
    return view('admin/akun');
});

Route::get('/tambahAkun', function () {
    return view('tambahAkun');
});

Route::get('/updateakun', function () {
    return view('updateAkun');
});

Route::get('/produkAdmin', function () {
    return view('produkAdmin');
});

// Backend API

Route::middleware('auth:api')->get('/user', function (Request $request){
    return $request->user();
});

Route::post('/login', [SessionController::class, 'login']);

Route::get('/listBarang',[SessionController::class,'listBarang']);
