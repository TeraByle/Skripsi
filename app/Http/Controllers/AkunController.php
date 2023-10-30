<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;
use Illuminate\Support\Facades\Session;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $search = $request->search;
        $jumlahbaris = 4;
//        if(strlen($search)){
//            $data = Akun::where('NamaBarang', 'like', "%$search%")
//                        ->orWhere('KategoriBarang', 'like', "%$search%")
//                        ->paginate($jumlahbaris);
//        }else{
//            $data = Akun::orderBy('TransaksiId', 'asc')->paginate($jumlahbaris);
        }
//        return view('superAdmin/transaksi')->with('data', $data);
//    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    //    Akun::where('BarangId', $id)->delete();
        return redirect()->to('superAdmin/akun')->with('success', 'Data berhasil di hapus');
    }
}
