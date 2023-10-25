<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    //menampilkan semua data
    {
        $search = $request->search;
        $jumlahbaris = 4;
        if(strlen($search)){
            $data = Barang::where('NamaBarang', 'like', "%$search%")
                        ->orWhere('JenisBarang', 'like', "%$search%")
                        ->orWhere('KategoriBarang', 'like', "%$search%")
                        ->orWhere('BrandBarang', 'like', "%$search%")
                        ->paginate($jumlahbaris);
        }else{
            $data = Barang::orderBy('BarangId', 'asc')->paginate($jumlahbaris);
        }
        return view('superAdmin/produk')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    //menampilkan form data baru
    {
        return view('superAdmin/inputBarang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    //memasukkan data baru ke database
    {
    //mengeluarkan isian yang sudah dimasukkan
        Session::flash('KodeBarang',$request->KodeBarang);
        Session::flash('NamaBarang',$request->NamaBarang);
        Session::flash('JenisBarang',$request->JenisBarang);
        Session::flash('SatuanBarang',$request->SatuanBarang);
        Session::flash('KategoriBarang',$request->KategoriBarang);
        Session::flash('BrandBarang',$request->BrandBarang);
        Session::flash('StokBarang',$request->StokBarang);
        Session::flash('HargaBeli',$request->HargaBeli);
        Session::flash('HargaJual',$request->HargaJual);

        $request->validate([
        //validasi data yang harus dimasukkan
            'KodeBarang' => 'required',
            'NamaBarang' => 'required',
            'JenisBarang' => 'required',
            'SatuanBarang' => 'required',
            'KategoriBarang' => 'required',
            'BrandBarang' => 'required',
            'StokBarang' => 'required | numeric',
            'TanggalBeli' => 'required',
            'HargaBeli' => 'required | numeric',
            'HargaJual' => 'required | numeric',

        ],[
        //notif jika ada kolom yang tidak diisi
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
            'JenisBarang'=>$request->JenisBarang,
            'SatuanBarang'=>$request->SatuanBarang,
            'KategoriBarang'=>$request->KategoriBarang,
            'BrandBarang'=>$request->BrandBarang,
            'StokBarang'=>$request->StokBarang,
            'TanggalBeli'=>$request->TanggalBeli,
            'HargaBeli'=>$request->HargaBeli,
            'HargaJual'=>$request->HargaJual,
        ];
        //jika barang sudah berhasil diinput maka akan balik ke halaman produk dan ada notif berhasil
        Barang::create($data);
        return redirect()->to('superAdmin/produk')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    //menampilkan detail data
    {
        return 'HI' . $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    //menampilkan form untuk proses edit
    {
        $data = Barang::where('BarangId',$id)->first();
        return view('superAdmin/updateBarang')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
            'TanggalBeli' => 'required',
            'HargaBeli' => 'required | numeric',
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
            'JenisBarang'=>$request->JenisBarang,
            'SatuanBarang'=>$request->SatuanBarang,
            'KategoriBarang'=>$request->KategoriBarang,
            'BrandBarang'=>$request->BrandBarang,
            'StokBarang'=>$request->StokBarang,
            'TanggalBeli'=>$request->TanggalBeli,
            'HargaBeli'=>$request->HargaBeli,
            'HargaJual'=>$request->HargaJual,
        ];
        Barang::where('BarangId', $id)->update($data);
        return redirect()->to('superAdmin/produk')->with('success', 'Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    //penghapusan data
    {
        Barang::where('BarangId', $id)->delete();
        return redirect()->to('superAdmin/produk')->with('success', 'Data berhasil di hapus');
    }
}
