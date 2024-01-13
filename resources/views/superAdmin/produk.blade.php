<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List Produk</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/produk.css">
    </head>
    <body>
        <div class="header">
            <div class="logo">
                <img src="/assets/images/LogoNew.png" alt="Logo">
            </div>
            <div class="content-header">
                <div class="user-info">
                    <div class="user-details">
                        <div class="user-name">{{Auth::user()->name}}</div>
                        <div class="user-role">{{Auth::user()->role}}</div>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" style="border: none; background: none; padding: 0;">
                            <img src="/assets/images/LogOut.png" alt="logout" style="width: 30px; height: 30px;">
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="isi">
            @include('superAdmin/sidebarSuperAdmin')

            <div class="content">
                <h2>List Produk</h2>
                <p>Kelola List Produk Anda</p>
                <div class="button-table">
                    <!-- resources/views/products/index.blade.php -->
                    <div class="input-group">
                        <form class="d-flex" action="{{route('home')}}" method="get">
                            <input type="search" name="search" value="{{Request::get('search')}}" class="form-control rounded"
                            placeholder="Search" aria-label="Search" aria-describedby="search-addon"/>
                            <button type="submit" class="btn btn-outline-primary">Search</button>
                        </form>
                    </div>
                    <button class="button-barang">
                        <a href="{{ route('input_barang') }}" style="text-decoration: none;color: white;">+ Tambah Barang</a>
                    </button>
                </div>
                @if(Session::has('success'))
                    <div class="pt-3">
                        <div class="alert alert-success" style="width: 1230px;">
                            {{Session::get('success')}}
                        </div>
                    </div>
                @endif
                @if(Session::has('failed'))
                    <div class="pt-3">
                        <div class="alert alert-danger">
                            {{Session::get('failed')}}
                        </div>
                    </div>
                    @endif
                <div class="tabel">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th  class="text-center" scope="col">No</th>
                                <th  class="text-center" scope="col">Gambar</th>
                                <th  class="text-center" scope="col">Kode</th>
                                <th  class="text-center" scope="col">Nama</th>
                                <th  class="text-center" scope="col">Jenis</th>
                                <th  class="text-center" scope="col">Satuan</th>
                                <th  class="text-center" scope="col">Kategori</th>
                                <th  class="text-center" scope="col">Brand</th>
                                <th  class="text-center" scope="col">Stok</th>
                                <th  class="text-center" scope="col">Tanggal Beli</th>
                                <th  class="text-center" scope="col">Harga Beli</th>
                                <th  class="text-center" scope="col">Harga Jual</th>
                                <th  class="text-center" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = $data->firstItem() ?>
                            @foreach($data as $item)
                            <tr>
                                <th class="text-center">{{$i}}</th>
                                <td class="text-center">
                                    @if ($item->gambar)
                                    <img src="{{ asset('assets/fileproduk/' . $item->gambar) }}" height="40" width="46">
                                    @endif
                                </td>
                                <td  class="text-center">{{$item->KodeBarang}}</td>
                                <td  class="text-center-nama">{{$item->NamaBarang}}</td>
                                <td  class="text-center" style="width: 100px;">{{$item->JenisBarang}}</td>
                                <td  class="text-center">{{$item->SatuanBarang}}</td>
                                <td  class="text-center">{{$item->KategoriBarang}}</td>
                                <td  class="text-center" style="width: 100px;">{{$item->BrandBarang}}</td>
                                <td  class="text-center">{{$item->StokBarang}}</td>
                                <td  class="text-center">{{$item->TanggalBeli}}</td>
                                <td  class="text-center">{{$item->HargaBeli}}</td>
                                <td  class="text-center">{{$item->HargaJual}}</td>
                                <td>
                                    <a href="{{ route('edit_barang', ['BarangId' => $item->BarangId]) }}">
                                        <img src="/assets/images/Edit.png" alt="edit">
                                    </a>
                                    <form onsubmit="return confirm('Yakin ingin menghapus data?')" class="d-inline" action="{{ route('delete_barang',['BarangId'=>$item->BarangId]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" name="submit">
                                            <img src="/assets/images/Remove.png" alt="remove">
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php $i++?>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data-> withQueryString()->links()}}
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
