<?php
namespace App\Exports;

use App\Models\Barang;
use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PenjualanExport implements Fromview
{
    protected $tglawal;
    protected $tglakhir;
    public function __construct($tglawal,$tglakhir)
    {
        $this->tglawal = $tglawal;
        $this->tglakhir = $tglakhir;
    }
    public function view(): View
    {
        $data = [];
        $penjualan = Penjualan::whereBetween('tanggalPenjualan',[$this->tglawal,$this->tglakhir])->get();
        foreach($penjualan as $p){
            $details = PenjualanDetail::where('TransaksiId',$p->penjualanId)->get();
            foreach($details as $d){
                $Barang = Barang::where('BarangId',$d->BarangId)->first();
                $d->penjualan = $p;
                $d->barang = $Barang;
                array_push($data,$d);
            }
        }
        return view('superAdmin/cetakLaporan', [
            'data' => $data
        ]);
    }
}
