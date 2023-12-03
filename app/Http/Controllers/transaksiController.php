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
        $barang = Barang::select('BarangId','TransaksiId','KodeBarang', 'NamaBarang', 'SatuanBarang','KategoriBarang', 'StokBarang', 'HargaJual','TanggalBeli')->get();
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
            // 'tanggal'=>'required'
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
    {
        $data = Transaksi::where('id', $id)->first();
        return view('superAdmin/updateTransaksi')->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'KodeBarang' => 'required',
            'NamaBarang' => 'required',
            'KategoriBarang' => 'required',
            'SatuanBarang' => 'required',
            'StokBarang' => 'required|numeric',
            'HargaJual' => 'required|numeric',
        ], [
            'KodeBarang.required' => 'Kode Barang wajib diisi',
            'NamaBarang.required' => 'Nama Barang wajib diisi',
            'KategoriBarang.required' => 'Kategori Barang wajib diisi',
            'SatuanBarang.required' => 'Satuan Barang wajib diisi',
            'StokBarang.required' => 'Jumlah Barang wajib diisi',
            'HargaJual.required' => 'Harga Barang wajib diisi',
        ]);

        $data = [
            'KodeBarang' => $request->KodeBarang,
            'NamaBarang' => $request->NamaBarang,
            'KategoriBarang' => $request->KategoriBarang,
            'SatuanBarang' => $request->SatuanBarang,
            'StokBarang' => $request->StokBarang,
            'HargaJual' => $request->HargaJual,
        ];


            $transaksi = Transaksi::findOrFail($id);
            $transaksi->update($data);
            // dd($data);


        return redirect()->route('transaksi')->with('success', 'Data berhasil diubah');
    }

        public function destroy(string $id)
        {
                    $transaksi = transaksi ::findOrFail($id);
                    $transaksi->delete();

                return redirect()->route('transaksi')->with('success', 'Data berhasil dihapus');
        }



    public function edit2(string $BarangId)
    {
        $data = Barang::where('BarangId', $BarangId)->first();
        return view('superAdmin.updatetransaksibarang')->with('data', $data);
    }

    public function update2(Request $request, string $id)
    //menyimpan update data
    {
        $request->validate([
            'KodeBarang' => 'required',
            'NamaBarang' => 'required',
            'JenisBarang' => 'required',
            'SatuanBarang' => 'required',
            'KategoriBarang' => 'required',
            'BrandBarang' => 'required',
            'StokBarang' => 'required | numeric',
            // 'TanggalBeli' => 'required',
            'HargaBeli' => 'required',
            'HargaJual' => 'required | numeric',
        ],[

            'KodeBarang.required'=>'Kode Barang wajib diisi',
            'NamaBarang.required'=>'Nama Barang wajib diisi',
            'JenisBarang.required'=>'Jenis Barang wajib diisi',
            'SatuanBarang.required'=>'Satuan Barang wajib diisi',
            'KategoriBarang.required'=>'Kategori Barang wajib diisi',
            'BrandBarang.required'=>'Brand Barang wajib diisi',
            'StokBarang.required'=>'Stok Barang wajib diisi',
            'TanggalBeli.required'=>'Tanggal Beli wajib diisi',
            'HargaBeli.required'=>'Harga Beli wajib diisi',
            'HargaJual.required'=>'Harga Jual wajib diisi',
        ]);

        $data = [
            'KodeBarang'=>$request->KodeBarang,
            'NamaBarang'=>$request->NamaBarang,
            // 'JenisBarang'=>$request->JenisBarang,
            'SatuanBarang'=>$request->SatuanBarang,
            'KategoriBarang'=>$request->KategoriBarang,
            'BrandBarang'=>$request->BrandBarang,
            'StokBarang'=>$request->StokBarang,
            'TanggalBeli'=>$request->TanggalBeli,
            'HargaBeli'=>$request->HargaBeli,
            'HargaJual'=>$request->HargaJual,
        ];
        // dd($data);
        Barang::where('BarangId', $id)->update($data);

        return redirect()->route('transaksi')->with('success', 'Data berhasil di ubah');
    }



    public function destroy2(string $BarangId)
    {
                $transaksi = Barang ::findOrFail($BarangId);
                $transaksi->delete();

            return redirect()->route('transaksi')->with('success', 'Data berhasil dihapus');
    }
}
