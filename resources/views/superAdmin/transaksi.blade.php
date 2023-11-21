<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Transaksi Barang</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/transaksi.css">
    </head>
    <body>
        <div class="header">
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="/assets/images/LogoNew.png" alt="Logo">
                </a>
            </div>
            <div class="content-header">
                <div class="user-info">
                    <div class="user-details">
                        <div class="user-name">Zhofar Putra</div>
                        <div class="user-role">Admin</div>
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
            <div class="sidebar">
                <button class="sidebar-button button-1"><a href="{{ route('home') }}" style="text-decoration: none;color: black;">Data Barang</a></button>
                <button class="sidebar-button button-2"><a href="{{ route('transaksi') }}" style="text-decoration: none;color: white;">Transaksi Penjualan</a></button>
                <button class="sidebar-button button-3"><a href="/superAdmin/cetakLaporan" style="text-decoration: none;color: black;">Laporan Keuangan</a></button>
                <button class="sidebar-button button-4"><a href="{{route('account_manangement')}}" style="text-decoration: none;color: black;">Manajemen Akun</a></button>
            </div>
            <div class="content">
                <h2>Transaksi Barang</h2>
                <p>Kelola Transaksi Barang Anda</p>
                <div class="button-table">
                    <img src="/assets/images/Filter.png" alt="">
                    <div class="input-group">
                    <form class="d-flex" action="{{route(('transaksi'))}}" method="get">
                            <input type="search" name="search" value="{{Request::get('search')}}" class="form-control rounded"
                            placeholder="Search" aria-label="Search" aria-describedby="search-addon"/>
                            <button type="submit" class="btn btn-outline-primary">Search</button>
                        </form>
                    </div>
                    <button class="button-barang">
                        <a href="tambahTransaksi/" style="text-decoration: none;color: white;">+ Tambah Transaksi</a>
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
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Transaksi</th>
                                <th scope="col">Kode Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Satuan Barang</th>
                                <th scope="col">Kategori Barang</th>
                                <th scope="col">Jumlah Barang</th>
                                <th scope="col">Harga Barang</th>
                                <th scope="col">Aksi</th>
                            </tr>

                        </thead>

    @php
        $totalItems = count($data) + count($barang);
        $counter = 1;
    @endphp

    @foreach ($data as $item)
        <tr>
            <td>{{ $counter++ }}</td>
            <td>{{ $item->TransaksiId }}</td>
            <td>{{ $item->KodeBarang }}</td>
            <td>{{ $item->NamaBarang }}</td>
            <td>{{ $item->SatuanBarang }}</td>
            <td>{{ $item->KategoriBarang }}</td>
            <td>{{ $item->StokBarang }}</td>
            <td>{{ $item->HargaJual }}</td>
            <td>
                <a href="{{ url('superAdmin/updateTransaksi/'.$item->TransaksiId.'/edit') }}">
                    <img src="/assets/images/Edit.png" alt="edit">
                </a>
                <form onsubmit="return confirm('Yakin ingin menghapus data?')" class="d-inline" action="{{ url('superAdmin/transaksi/'.$item->TransaksiId) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" name="submit">
                        <a href=""><img src="/assets/images/Remove.png" alt="remove"></a>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach

    @foreach ($barang as $item)
        <tr>
            <td>{{ $counter++ }}</td>
            <td>{{ $item->TransaksiId }}</td>
            <td>{{ $item->KodeBarang }}</td>
            <td>{{ $item->NamaBarang}}</td>
            <td>{{ $item->SatuanBarang }}</td>
            <td>{{ $item->KategoriBarang }}</td>
            <td>{{ $item->StokBarang }}</td>
            <td>Rp{{ $item->HargaJual }}</td>
            <td>
                <a href="{{ url('superAdmin/updateTransaksi/'.$item->TransaksiId.'/edit') }}">
                    <img src="/assets/images/Edit.png" alt="edit">
                </a>
                <form onsubmit="return confirm('Yakin ingin menghapus data?')" class="d-inline" action="{{ url('superAdmin/transaksi/'.$item->TransaksiId) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" name="submit">
                        <a href=""><img src="/assets/images/Remove.png" alt="remove"></a>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>
                    </table>

                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
