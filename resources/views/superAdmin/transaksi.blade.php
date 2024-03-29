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
                <h2>Transaksi Barang</h2>
                <p>Kelola Transaksi Barang Anda</p>
                <div class="button-table">
                    <div class="input-group">
                    <form class="d-flex" action="{{route(('transaksi'))}}" method="get">
                            <input  type="search" name="search" value="{{Request::get('search')}}" class="form-control rounded"
                            placeholder="Search" aria-label="Search" aria-describedby="search-addon"/>
                            <button  type="submit" class="btn btn-outline-primary search-btn">Search</button>
                        </form>
                    </div>
                    <button class="button-barang">
                        <a  href="{{ route('create_transaksi') }}" style="text-decoration: none;color: white;">+ Tambah Transaksi</a>
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
                                <th class="text-center" scope="col">No</th>
                                <th class="text-center" scope="col">Kode Transaksi</th>
                                <th class="text-center" scope="col">Kode Barang</th>
                                <th class="text-center" scope="col">Nama Barang</th>
                                <th class="text-center" scope="col">Satuan Barang</th>
                                <th class="text-center" scope="col">Kategori Barang</th>
                                <th class="text-center" scope="col">Jumlah Barang</th>
                                <th class="text-center" scope="col">Harga Barang</th>
                                <th class="text-center" scope="col">Tanggal Transaksi</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        @php
                            $totalItems = count($data);
                            $counter = 1;
                        @endphp

                            @foreach ($data as $item)
                                <tr>
                                    <td class="text-center">{{ $counter++ }}</td>
                                    <td class="text-center">{{ $item->TransaksiId }}</td>
                                    <td class="text-center">{{ $item->KodeBarang }}</td>
                                    <td class="text-center-nama">{{ $item->NamaBarang }}</td>
                                    <td class="text-center">{{ $item->SatuanBarang }}</td>
                                    <td class="text-center">{{ $item->KategoriBarang }}</td>
                                    <td class="text-center">{{ $item->StokBarang }}</td>
                                    <td class="text-center">Rp {{ $item->HargaJual }}</td>
                                    <td class="text-center">{{ $item->tanggal }}</td>
                                    <td>
                                        <a href="{{ route('edit_transaksi', ['id' => $item->id]) }}">
                                            <img src="/assets/images/Edit.png" alt="edit">
                                        </a>
                                        <form onsubmit="return confirm('Yakin ingin menghapus data?')" class="d-inline" action="{{ route('delete_transaksi', ['id' => $item->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" name="submit">
                                                <img src="/assets/images/Remove.png" alt="remove">
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                    {{ $data-> withQueryString()->links()}}
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
