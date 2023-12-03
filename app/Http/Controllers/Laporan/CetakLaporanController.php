<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\transaksi;
use App\Models\Barang;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;


class CetakLaporanController extends Controller{

public function index()
{
    $dataTransaksi = collect();
    $dataBarang = collect();
    $tanggalAwal = now()->subDays(7);
    $tanggalAkhir = now();
    $gabunganData = $dataBarang->concat($dataTransaksi)->sortBy(function ($item) {
        return Carbon::parse($item['tanggal']);
    })->values();


    return view('superAdmin.cetakLaporan', compact('dataTransaksi', 'dataBarang', 'tanggalAwal', 'tanggalAkhir','gabunganData'));
}


public function fetch_data(Request $request)
{

    $request->validate([
        'tanggal_awal' => 'required|date',
        'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
    ]);

    $tanggalAwal = $request->input('tanggal_awal');
    $tanggalAkhir = $request->input('tanggal_akhir');

    $dataTransaksi = Transaksi::whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])
        ->orderBy('tanggal', 'asc')
        ->get();

    $dataBarang = Barang::whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])
        ->orderBy('tanggal', 'asc')
        ->get();

    // Concatenate and sort the data
    $gabunganData = $dataBarang->concat($dataTransaksi)->sortBy(function ($item) {
        return Carbon::parse($item->tanggal);
    })->values();

    // dd($gabunganData); // Remove or comment this line

    return view('superAdmin.cetakLaporan', compact('dataTransaksi', 'dataBarang', 'tanggalAwal', 'tanggalAkhir', 'gabunganData'));
}
public function cetakLaporan(Request $request)
{
    $tanggalAwal = $request->input('tanggal_awal');
    $tanggalAkhir = $request->input('tanggal_akhir');
    $dataTransaksi = Transaksi::whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])->get();
    $dataBarang = Barang::whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])->get();

    $gabunganData = $dataBarang->concat($dataTransaksi)->sortBy(function ($item) {
        return Carbon::parse($item['tanggal']);
    })->values();

    if ($request->has('unduh_pdf')) {
        $pdf = PDF::loadView('superAdmin.cetak-laporan.tableLaporan', compact('gabunganData'));
        $pdf->setPaper('a4');

        // Mengatur opsi Dompdf
        $pdf->setOptions(['isHtml5ParserEnabled' => true, 'isPhpEnabled' => true]);

        // Mengunduh file PDF
        return $pdf->download('laporan.pdf');
    }

    return view('superAdmin.cetakLaporan', compact('gabunganData'));
}



}

