<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('produk');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('inputBarang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
        Barang::create($data);
        return redirect()->to('produk')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
