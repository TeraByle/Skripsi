<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\transaksi;
use App\Models\Barang;


class CetakLaporanController extends Controller
{
    public function index()
    {
        $dataTransaksi  = Transaksi::select('TransaksiId','KodeBarang', 'NamaBarang', 'SatuanBarang','KategoriBarang', 'StokBarang', 'HargaJual','tanggal')->get();
        $dataBarang  =  Barang::select('TransaksiId','KodeBarang', 'NamaBarang', 'SatuanBarang','KategoriBarang', 'StokBarang', 'HargaJual','tanggal')->get();
        return view('superAdmin/cetakLaporan' ,compact( 'dataTransaksi', 'dataBarang'));
    }

    public function fetch_data(Request $request)
    {
        $tanggalAwalFromBarang = Barang::oldest('tanggal')->value('tanggal');
        $tanggalAwalFromTransaksi = Transaksi::oldest('tanggal')->value('tanggal');
        $tanggalAwalDefault = max($tanggalAwalFromBarang, $tanggalAwalFromTransaksi);

        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $validator = Validator::make($request->all(), [
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'required|date',
        ]);
        // dd($validasiTransaksi);


        if ($validator->fails()) {
            return redirect()->route('cetakdata')
            ->withErrors($validator)
            ->withInput();
        }

        $validasiTransaksi = $this->validateTransactionDates($tanggalAwal, $tanggalAkhir);
        if (!$validasiTransaksi) {
            return redirect('cetak-laporan')
                ->withErrors(['tanggal_awal' => 'Tanggal transaksi tidak valid.'])
                ->withInput();
        }
        $dataTransaksi  = Transaksi::whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])->count();
        $dataBarang  = Barang::whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])->count();

        return redirect()->route('cetakdatasemua', compact('dataBarang', 'dataTransaksi', 'tanggalAwal', 'tanggalAkhir'));

    }

    // private function validateTransactionDates($tanggalAwal, $tanggalAkhir)
    // {
    //     $transaksiCount = Transaksi::whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])->count();
    //     $barangCount = Barang::whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])->count();
    //     return $transaksiCount > 0 && $barangCount > 0;
    // }
}

