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
        return view('superAdmin/cetakLaporan');
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


        if ($validator->fails()) {
            return redirect()->route('cetakdata')
            ->withErrors($validator)
            ->withInput();
        }

        $validasiTransaksi = $this->validateTransactionDates($tanggalAwal, $tanggalAkhir);
        dd($validasiTransaksi);
        if (!$validasiTransaksi) {
            return redirect('cetak-laporan')
                ->withErrors(['tanggal_awal' => 'Tanggal transaksi tidak valid.'])
                ->withInput();
        }
        return redirect()->route('cetak-laporan', compact('tanggalAwal', 'tanggalAkhir'));

    }

    private function validateTransactionDates($tanggalAwal, $tanggalAkhir)
    {
        $transaksiCount = Transaksi::whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])->count();
        $barangCount = Barang::whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])->count();
        return $transaksiCount > 0 && $barangCount > 0;
    }
}

