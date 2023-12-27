<?php

namespace App\Http\Controllers\Barang;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class produkController extends Controller
{
    public function index(Request $request)
    //menampilkan semua data
    {
        $search = $request->search;
        $jumlahbaris = 10;
        if(strlen($search)){
            $data = Barang::where('NamaBarang', 'like', "%$search%")
                        ->orWhere('JenisBarang', 'like', "%$search%")
                        ->orWhere('KategoriBarang', 'like', "%$search%")
                        ->orWhere('BrandBarang', 'like', "%$search%")
                        ->paginate($jumlahbaris);
        }
        else{
            $data = Barang::orderBy('BarangId', 'asc')->paginate($jumlahbaris);
        }

        return view('superAdmin/produk')->with('data', $data);
    }

    public function create()
    //menampilkan form data baru
    {
        return view('superAdmin/inputBarang');
    }

    public function store(Request $request)
    //memasukkan data baru ke database
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
            'NamaBarang' => 'required',
            'JenisBarang' => 'required',
            'SatuanBarang' => 'required',
            'KategoriBarang' => 'required',
            'BrandBarang' => 'required',
            'StokBarang' => 'required | numeric',
            'TanggalBeli' => 'required',
            'HargaBeli' => 'required | numeric',
            'HargaJual' => 'required | numeric',
            'gambar' => 'nullable',

        ],[

            // 'KodeBarang.required'=>'Kode Barang wajib diisi',
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
            // manggil data barang ke transaksi

            'KodeBarang' => Barang::getKodeBarang(),
            'NamaBarang' => $request->NamaBarang,
            'JenisBarang' => $request->JenisBarang,
            'SatuanBarang' => $request->SatuanBarang,
            'KategoriBarang' => $request->KategoriBarang,
            'BrandBarang' => $request->BrandBarang,
            'StokBarang' => $request->StokBarang,
            'TanggalBeli' => $request->TanggalBeli,
            'HargaBeli' => $request->HargaBeli,
            'HargaJual' => $request->HargaJual,
            'tanggal' => Carbon::now()->toDateString(),
        ];

        $gambar = $request->file('gambar');
        if ($gambar) {
            $destinationPath = 'assets/fileproduk';
            $originalFile = $gambar->getClientOriginalName();
            $file_upload = strtotime(date('Y-m-d-H:i:s')) . $originalFile;
            $gambar->move($destinationPath, $file_upload);
            $data['gambar'] = $file_upload;
        }

        Barang::create($data);

        return redirect()->route('home')->with('success', 'Data berhasil ditambah');
    }

    public function edit(string $id)
    //menampilkan form untuk proses edit
    {
        $data = Barang::where('BarangId',$id)->first();
        return view('superAdmin/updateBarang')->with('data',$data);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([

            'NamaBarang' => 'required',
            'JenisBarang' => 'required',
            'SatuanBarang' => 'required',
            'KategoriBarang' => 'required',
            'BrandBarang' => 'required',
            'StokBarang' => 'required|numeric',
            'TanggalBeli' => 'required',
            'HargaBeli' => 'required|numeric',
            'HargaJual' => 'required|numeric',
            'gambar' => 'nullable',
        ], [

            'NamaBarang.required'=>'Nama Barang wajib diisi',
            'JenisBarang.required'=>'Jenis Barang wajib diisi',
            'SatuanBarang.required'=>'Satuan Barang wajib diisi',
            'KategoriBarang.required'=>'Kategori Barang wajib diisi',
            'BrandBarang.required'=>'Brand Barang wajib diisi',
            'StokBarang.required'=>'Stok Barang wajib diisi',
            'TanggalBeli.required'=>'Tanggal Beli wajib diisi',
            'HargaBeli.required'=>'Harga Beli wajib diisi',
            'HargaJual.required'=>'Harga Jual wajib diisi',
            'gambar.image' => 'File harus berupa gambar.',

        ]);

        $data = [
            'KodeBarang' => $request->KodeBarang,
            'NamaBarang' => $request->NamaBarang,
            'JenisBarang' => $request->JenisBarang,
            'SatuanBarang' => $request->SatuanBarang,
            'KategoriBarang' => $request->KategoriBarang,
            'BrandBarang' => $request->BrandBarang,
            'StokBarang' => $request->StokBarang,
            'TanggalBeli' => $request->TanggalBeli,
            'HargaBeli' => $request->HargaBeli,
            'HargaJual' => $request->HargaJual,
            'gambar' => $request->gambar,
        ];

        $gambar = $request->file('gambar');
        if ($request->hasFile('gambar') && $gambar->isValid()) {
            // Continue with file processing
            $destinationPath = 'assets/fileproduk';
            $oldBarang = Barang::find($id);
            if ($oldBarang && $oldBarang->gambar && file_exists(public_path($destinationPath . '/' . $oldBarang->gambar))) {
                unlink(public_path($destinationPath . '/' . $oldBarang->gambar));
            }
            $originalFile = $gambar->getClientOriginalName();
            $file_upload = time() . '_' . $originalFile;
            try {
                $gambar->move($destinationPath, $file_upload);
                $data['gambar'] = $file_upload;
            } catch (\Exception $e) {
                // Handle any exception that may occur during file move
                return redirect()->back()->with('error', 'Gagal mengunggah file. Silakan coba lagi.');
            }
        }
        Barang::where('BarangId', $id)->update($data);
        return redirect()->route('home')->with('success', 'Data berhasil diubah');
    }



    public function destroy($BarangId)
    {
        $barang = Barang::find($BarangId);

        $barang->delete();

    return redirect()->route('home')->with('success', 'Data berhasil dihapus');
    }
}
