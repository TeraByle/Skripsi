<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Models\Barang;


class CetakLaporanController extends Controller
{
    public function index( Request $request){

        // $request->validate([
        //     'tanggal_awal' => 'required|date',
        //     'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
        // ]);

        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $transaksiData = Transaksi::whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])->get();

        $barangData = Barang::whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])->get();

        return view('superAdmin/cetakLaporan');
    }

    public function fetch_data(){
    }
}
