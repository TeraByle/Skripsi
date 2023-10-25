<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class transaksiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $jumlahbaris = 4;
        if(strlen($search)){
            $data = Transaksi::where('NamaBarang', 'like', "%$search%")
                        ->orWhere('KategoriBarang', 'like', "%$search%")
                        ->paginate($jumlahbaris);
        }else{
            $data = Transaksi::orderBy('TransaksiId', 'asc')->paginate($jumlahbaris);
        }
        return view('superAdmin/transaksi')->with('data', $data);
    }

    public function create()
    {
        return view('superAdmin/tambahTransaksi');
    }

    public function store(Request $request)
    {
        //mengeluarkan isian yang sudah dimasukkan
        Session::flash('KodeBarang',$request->KodeBarang);
        Session::flash('NamaBarang',$request->NamaBarang);
        Session::flash('KategoriBarang',$request->KategoriBarang);
        Session::flash('SatuaniBarang',$request->SatuaniBarang);
        Session::flash('JumlahBarang',$request->JumlahBarang);
        Session::flash('HargaBarang',$request->HargaBarang);

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
        Transaksi::create($data);
        return redirect()->to('superAdmin/transaksi')->with('success', 'Data berhasil ditambah');
    }

    public function show(string $id)
    {
        //
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
