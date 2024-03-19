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
        $barang = Barang::select('BarangId','KodeBarang', 'NamaBarang', 'SatuanBarang','KategoriBarang', 'StokBarang', 'HargaJual','TanggalBeli')->get();
        $search = $request->search;
        $jumlahbaris = 4;

        if(strlen($search)){
            $data = Transaksi::where('NamaBarang', 'like', "%$search%")
                        ->orWhere('KategoriBarang', 'like', "%$search%")
                        ->paginate($jumlahbaris);
        }else{
            $data = Transaksi::orderBy('transaksiId', 'asc')->paginate($jumlahbaris);
        }
        return view('superAdmin/transaksi',compact('barang'))->with('data', $data);
    }

    public function indexAdmin(Request $request)
    {
        $barang = Barang::select('BarangId','KodeBarang', 'NamaBarang', 'SatuanBarang','KategoriBarang', 'StokBarang', 'HargaJual','TanggalBeli')->get();
        $search = $request->search;
        $jumlahbaris = 4;

        if(strlen($search)){
            $data = Transaksi::where('NamaBarang', 'like', "%$search%")
                        ->orWhere('KategoriBarang', 'like', "%$search%")
                        ->paginate($jumlahbaris);
        }else{
            $data = Transaksi::orderBy('transaksiId', 'asc')->paginate($jumlahbaris);
        }
        return view('admin/transaksiAdmin'
        ,compact('barang')
        )
        ->with('data', $data)
        ;
    }

    public function create()
    {
        $kode=Barang::all();
        return view('superAdmin/tambahTransaksi', compact('kode'));
    }

    public function createAdmin()
    {
        $kode=Barang::all();
        return view('admin/tambahBarangAdmin', compact('kode'));
    }

    public function store(Request $request)
    {
        $data = Barang::where('KodeBarang', '=', $request->KodeBarang)->first();
        // dd($request);
        $request->validate([
            'KodeBarang' => 'required',
            'StokBarang' => 'required|numeric|lt:'.$data->StokBarang,
            'HargaJual' => 'required|numeric',
            // 'tanggal'=>'required'
        ],
        [
            'KodeBarang.required' => 'Kode Barang wajib diisi',
            'KodeBarang.unique' => 'Kode Barang sudah digunakan',
            'StokBarang.required' => 'Jumlah Barang wajib diisi',
            'StokBarang.lt' => 'Jumlah Barang lebih banyak dari stock yang tersedia',
            'HargaJual.required' => 'Harga Barang wajib diisi',
        ]);

        // dd($data->StokBarang); // 189
        $newData = [
            'TransaksiId' => Transaksi::getTransactionId(),
            'KodeBarang' => $request->KodeBarang,

            'NamaBarang' => $data->NamaBarang,
            'KategoriBarang' => $data->KategoriBarang,
            'SatuanBarang' => $data->SatuanBarang,

            'StokBarang' => $request->StokBarang,
            'HargaJual' => $request->HargaJual,
            'tanggal' => Carbon::now()->toDateString(),
        ];
        $data->StokBarang = $data->StokBarang - $request->StokBarang;
        $data->save();

        // dd($data->StokBarang);
        Transaksi::create($newData);

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
            $dataBarang = Barang::where('KodeBarang', '=', $transaksi->KodeBarang)->first();
                            $dataBarang->StokBarang = $dataBarang->StokBarang + $transaksi->StokBarang;
            $transaksi->update($data);
                            $dataBarang->StokBarang = $dataBarang->StokBarang - $transaksi->StokBarang;
            $dataBarang->save();

        return redirect()->route('transaksi')->with('success', 'Data berhasil diubah');
    }


            public function destroy(string $id)
                {
                            $transaksi = transaksi::findOrFail($id);
                            $data = Barang::where('KodeBarang', '=', $transaksi->KodeBarang)->first();
                            $data->StokBarang = $data->StokBarang + $transaksi->StokBarang;
                            $data->save();
                            $transaksi->delete();


                        return redirect()->route('transaksi')->with('success', 'Data berhasil dihapus');
                }


            public function ajax_dependentdropdown($BarangId)

                {
                    $barangData = DB::table('barang')->where('KodeBarang', $BarangId)->select([
                        'KodeBarang',
                        'NamaBarang',
                        'KategoriBarang',
                        'SatuanBarang',
                        'StokBarang',
                        'HargaJual'
                    ])->first();

                    if ($barangData) {
                        return response()->json($barangData); // Mengirim respons JSON
                    } else {
                        return response()->json(['error' => 'Barang not found'], 404);
                    }
                }
}
