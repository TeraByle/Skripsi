<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\transaksi;
use App\Models\Barang;
use Illuminate\Support\Carbon;


class CetakLaporanController extends Controller
{
    public function index()
{
    $dataTransaksi = collect();
    $dataBarang = collect();
    $tanggalAwal = now()->subDays(7);
    $tanggalAkhir = now();

    return view('superAdmin/cetakLaporan', compact('dataTransaksi', 'dataBarang', 'tanggalAwal', 'tanggalAkhir'));
}

public function fetch_data(Request $request)
{
    // Validasi: Pastikan format tanggal benar dan tanggal awal tidak lebih besar daripada tanggal akhir
    $request->validate([
        'tanggal_awal' => 'required|date',
        'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
    ]);

    $tanggalAwal = $request->input('tanggal_awal');
    $tanggalAkhir = $request->input('tanggal_akhir');

    // Validasi: Pastikan rentang tanggal sesuai dengan kebutuhan
    $tanggalPembuatanData = Transaksi::latest('tanggal')->value('tanggal');
    $tanggalPembuatanData = Carbon::parse($tanggalPembuatanData);

    $batasTanggalAwal = now()->subMonths(2)->startOfMonth();
    $batasTanggalAkhir = now()->addMonths(2)->endOfMonth();

    if ($tanggalAwal < $batasTanggalAwal || $tanggalAkhir > $batasTanggalAkhir) {
        return redirect()->route('cetakdata')
            ->withErrors(['tanggal_awal' => 'Rentang tanggal harus dalam batas yang diinginkan.'])
            ->withInput();
    }

    // Jika validasi berhasil, lanjutkan dengan memproses data dan menampilkan hasil
    $dataTransaksi = Transaksi::whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])->get();
    $dataBarang = Barang::whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])->get();

    return view('superAdmin/cetakLaporan', compact('dataTransaksi', 'dataBarang', 'tanggalAwal', 'tanggalAkhir'));
}

private function validateTransactionDates($tanggalAwal, $tanggalAkhir)
{
    $transaksiCount = Transaksi::whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])->count();
    $barangCount = Barang::whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])->count();

    return $transaksiCount > 0 && $barangCount > 0;
}


}

