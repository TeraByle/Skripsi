<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Produk Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="header">
            <div class="logo">
                <img src="assets/images/LogoNew.png" alt="Logo">
            </div>
            <div class="content-header">
                <div class="user-info">
                    <div class="user-details">
                        <div class="user-name">Zhofar Putra</div>
                        <div class="user-role">Admin</div>
                    </div>
                    <div class="arrow-icon">
                        <img src="assets/images/LogOut.png" alt="logout">
                    </div>
                </div>
            </div>
        </div>
        <div class="isi">
            <div class="sidebar">
                <button class="sidebar-button button-1">Data Barang</button>
                <button class="sidebar-button button-2">Transaksi Penjualan</button>
            </div>
            <div class="content">
                <h2>List Produk</h2>
                <p>Kelola List Produk Anda</p>
                <div class="button-table">
                    <img src="assets/images/Filter.png" alt="">
                    <div class="input-group">
                        <form class="d-flex" action="{{url('/produk')}}" method="GET">
                            <input type="search" name="search" value="{{Request::get('search')}}" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            <button type="submit" class="btn btn-outline-primary">Search</button>
                        </form>
                    </div>
                    <button class="button-barang">
                        <a href="/create">+ Tambah Barang</a>
                    </button>
                </div>
                @if(Session::has('success'))
                    <div class="pt-3">
                        <div class="alert alert-success" style="width: 1230px;">
                            {{Session::get('success')}}
                        </div>
                    </div>
                @endif
                <div class="tabel">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Tanggal Beli</th>
                                <th scope="col">Harga Beli</th>
                                <th scope="col">Harga Jual</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = $data->firstItem() ?>
                            @foreach($data as $item)
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td><img src="assets/images/PaluKambing.png" alt=""></td>
                                <td>{{$item->KodeBarang}}</td>
                                <td>{{$item->NamaBarang}}</td>
                                <td>{{$item->JenisBarang}}</td>
                                <td>{{$item->SatuanBarang}}</td>
                                <td>{{$item->KategoriBarang}}</td>
                                <td>{{$item->BrandBarang}}</td>
                                <td>{{$item->StokBarang}}</td>
                                <td>{{$item->TanggalBeli}}</td>
                                <td>{{$item->HargaBeli}}</td>
                                <td>{{$item->HargaJual}}</td>
                                <td><a href="{{url('updateBarang/'.$item->BarangId.'/edit')}}"><img src="assets/images/Edit.png" alt="edit"></a>
                                <form onsubmit="return confirm('Yakin ingin menghapus data?')" class="d-inline" action="{{url('produk/'.$item->BarangId)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="submit">
                                    <a href=""><img src="assets/images/Remove.png" alt="remove"></a>
                                    </button>
                                </form>
                                </td>
                            </tr>
                            <?php $i++?>
                            @endforeach
                        </tbody>
                    </table>
                    {{$data->links()}}
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
