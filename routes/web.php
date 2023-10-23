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
    return view('/user/homepage');
});
//Route::resource('barang', produkController::class);
Route::prefix('superAdmin')->group(function(){

    Route::get('/produk', [produkController::class, 'index']);
    Route::post('/produk',[produkController::class,'store']);
    Route::get('/inputBarang', [produkController::class, 'create']);
    Route::get('/updateBarang/{BarangId}/edit', [produkController::class, 'edit']);
    Route::put('/updateBarang/{BarangId}', [produkController::class, 'update']);
    Route::delete('/produk/{BarangId}',[produkController::class,'destroy']);

    Route::get('/transaksi', function () {
        return view('/superAdmin/transaksi');
    });

    Route::get('/tambahTransaksi', function () {
        return view('tambahTransaksi');
    });

    Route::get('/cetakLaporan', function () {
        return view('superAdmin/cetakLaporan');
    });

    Route::get('/akun', function () {
        return view('superAdmin/akun');
    });

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



<<<<<<< HEAD
=======
Route::get('/cetakLaporan', function () {
    return view('superAdmin/cetakLaporan');
});

Route::get('/akun', function () {
    return view('superAdmin/akun');
});

Route::get('/tambahAkun', function () {
    return view('tambahAkun');
});

Route::get('/updateakun', function () {
    return view('/superAdmin/updateAkun');
});

Route::get('/produkAdmin', function () {
    return view('/admin/produkAdmin');
});

// Backend API

Route::middleware('auth:api')->get('/user', function (Request $request){
    return $request->user();
});

Route::post('/login', [SessionController::class, 'login']);

Route::get('/listBarang',[SessionController::class,'listBarang']);
>>>>>>> 77fb79102c84f98bf1a1f7212387824ae21d0bbf
