<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class transaksiController extends Controller
{
    public function index(Request $request)
    {
        $barang = Barang::select('TransaksiId','KodeBarang', 'NamaBarang', 'SatuanBarang','KategoriBarang', 'StokBarang', 'HargaJual','TanggalBeli')->get();
        // $barang = Barang::where('BarangId',$request->KodeBarang)->first();
        // dd($barang);

        // $data= Barang::max('BarangId');
        // DB::table('barang')->select('BarangId')->get();
        // dd($data);
        $search = $request->search;
        $jumlahbaris = 4;

        if(strlen($search)){
            $data = Transaksi::where('NamaBarang', 'like', "%$search%")
                        ->orWhere('KategoriBarang', 'like', "%$search%")
                        ->paginate($jumlahbaris);
        }else{
            $data = Transaksi::orderBy('transaksiId', 'asc')->paginate($jumlahbaris);
        }
        return view('superAdmin/transaksi'
        ,compact('barang')
        )
        ->with('data', $data)
        ;
    }

    public function create()
    {

        return view('superAdmin/tambahTransaksi');
    }
    public function store(Request $request)
    {
        $request->validate([
            'KodeBarang' => 'required|unique:transaksi,KodeBarang',
            'NamaBarang' => 'required',
            'KategoriBarang' => 'required',
            'SatuanBarang' => 'required',
            'StokBarang' => 'required|numeric',
            'HargaJual' => 'required|numeric',
            'tanggal'=>'required'
        ],
        [
            'KodeBarang.required' => 'Kode Barang wajib diisi',
            'KodeBarang.unique' => 'Kode Barang sudah digunakan',
            'NamaBarang.required' => 'Nama Barang wajib diisi',
            'KategoriBarang.required' => 'Kategori Barang wajib diisi',
            'SatuanBarang.required' => 'Satuan Barang wajib diisi',
            'StokBarang.required' => 'Jumlah Barang wajib diisi',
            'HargaJual.required' => 'Harga Barang wajib diisi',
        ]);

        $data = [
            'TransaksiId' => Transaksi::getTransactionId(),
            'KodeBarang' => $request->KodeBarang,
            'NamaBarang' => $request->NamaBarang,
            'KategoriBarang' => $request->KategoriBarang,
            'SatuanBarang' => $request->SatuanBarang,
            'StokBarang' => $request->StokBarang,
            'HargaJual' => $request->HargaJual,
            'tanggal' => Carbon::now()->toDateString(),
        ];

        Transaksi::create($data);

        return redirect()->to('superAdmin/transaksi')->with('success', 'Data berhasil ditambah');
    }

    public function show(string $id)
    {
        return 'HI' . $id;
    }

    public function edit(string $id)
    //menampilkan form untuk proses edit
    {
        $data = Transaksi::where('TransaksiId',$id)->first();
        return view('superAdmin/updateTransaksi')->with('data',$data);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            //validasi data yang harus dimasukkan
                'KodeBarang' => 'required',
                'NamaBarang' => 'required',
                'KategoriBarang' => 'required',
                'SatuanBarang' => 'required',
                'JumlahBarang' => 'required | numeric',
                'HargaBarang' => 'required | numeric',

            ],[
            //notif jika ada kolom yang tidak diisi
                'KodeBarang.required'=>'Kode Barang wajib diisi',
                'NamaBarang.required'=>'Nama Barang wajib diisi',
                'KategoriBarang.required'=>'Kategori Barang wajib diisi',
                'SatuanBarang.required'=>'Satuan Barang wajib diisi',
                'JumlahBarang.required'=>'Jumlah Barang wajib diisi',
                'HargaBarang.required'=>'Harga Barang wajib diisi',
            ]);
            $data = [
                'KodeBarang'=>$request->KodeBarang,
                'NamaBarang'=>$request->NamaBarang,
                'KategoriBarang'=>$request->KategoriBarang,
                'SatuanBarang'=>$request->SatuanBarang,
                'JumlahBarang'=>$request->JumlahBarang,
                'HargaBarang'=>$request->HargaBarang,
            ];
        Transaksi::where('TransaksiId', $id)->update($data);
        return redirect()->to('superAdmin/transaksi')->with('success', 'Data berhasil diubah');
    }

    public function destroy(string $id)
    {
        Transaksi::where('TransaksiId', $id)->delete();
        return redirect()->to('superAdmin/transaksi')->with('success', 'Data berhasil dihapus');
    }
}
