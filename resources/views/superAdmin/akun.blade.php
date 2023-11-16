<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kelola Akun</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/akun.css">
    </head>
    <body>
        <div class="header">
            <div class="logo">
                <img src="/assets/images/LogoNew.png" alt="Logo">
            </div>
            <div class="content-header">
                <div class="user-info">
                    <div class="user-details">
                        <div class="user-name">Zhofar Putra</div>
                        <div class="user-role">Admin</div>
                    </div>
                    <div class="arrow-icon">
                        <img src="/assets/images/LogOut.png" alt="logout">
                    </div>
                </div>
            </div>
        </div>
        <div class="isi">
            <div class="sidebar">
                <button class="sidebar-button button-1"><a href="{{ route('home') }}" style="text-decoration: none;color: black;">Data Barang</button>
                <button class="sidebar-button button-2"><a href="{{route('transaksi')}}" style="text-decoration: none;color: black;">Transaksi Penjualan</a></button>
                <button class="sidebar-button button-3"><a href="/superAdmin/cetakLaporan" style="text-decoration: none;color: black;">Laporan Keuangan</a></button>
                <button class="sidebar-button button-4"><a href="{{route('account_manangement')}}" style="text-decoration: none;color: white;">Manajemen Akun</a></button>
            </div>
            <div class="content">
                <h2>Manajemen Akun</h2>
                <p>Kelola Manajemen Akun Anda</p>
                <div class="button-table">
                    <img src="/assets/images/Filter.png" alt="">
                    <div class="input-group">
                    <form class="d-flex" action="{{url('superAdmin/akun')}}" method="get">
                            <input type="search" name="search" value="{{Request::get('search')}}" class="form-control rounded"
                            placeholder="Search" aria-label="Search" aria-describedby="search-addon"/>
                            <button type="submit" class="btn btn-outline-primary">Search</button>
                        </form>
                    </div>
                    <button class="button-barang">
                    <a href="tambahTransaksi/" style="text-decoration: none;color: white;">+ Tambah Akun</a>
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
                                <th scope="col">Nama</th>
                                <th scope="col">Username</th>
                                <th scope="col">Password</th>
                                <th scope="col">Role</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Zhofar Putra</td>
                                <td>jopar</td>
                                <td>masbro</td>
                                <td>Super Admin</td>
                                <td><a href="{{url('superAdmin/updateAkun')}}"><img src="/assets/images/Edit.png" alt="edit"></a>
                                <form onsubmit="return confirm('Yakin ingin menghapus data?')" class="d-inline" action="{{url('superAdmin/akun/')}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="submit">
                                    <a href=""><img src="/assets/images/Remove.png" alt="remove"></a>
                                    </button>
                                </form>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Ilham Huda</td>
                                <td>hudai</td>
                                <td>masako</td>
                                <td>Admin</td>
                                <td><img src="/assets/images/Edit.png" alt="Edit"></td>
                                <td><img src="/assets/images/Remove.png" alt="Remove"></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Leonardo</td>
                                <td>leomord</td>
                                <td>masalah</td>
                                <td>Admin</td>
                                <td><img src="/assets/images/Edit.png" alt="Edit"></td>
                                <td><img src="/assets/images/Remove.png" alt="Remove"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
