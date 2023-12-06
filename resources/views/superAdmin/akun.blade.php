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
            <!-- sidebar -->
            @include('superAdmin/sidebarSuperAdmin')
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
                    <a href="{{ route('create_account') }}" style="text-decoration: none;color: white;">+ Tambah Akun</a>
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
                                <th  class="text-center" scope="col">Nama</th>
                                <th  class="text-center" scope="col">Username</th>
                                <th  class="text-center" scope="col">Email</th>
                                <th  class="text-center" scope="col">Role</th>
                                <th  class="text-center" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; // Mulai dari angka 1 ?>
                            @foreach ($new_account as $akun) {{-- Pastikan Anda memiliki $accounts dari kontroler --}}
                            <tr>
                                <th  class="text-center" scope="row">{{ $i }}</th>
                                <td  class="text-center">{{ $akun->name }}</td>
                                <td  class="text-center">{{ $akun->username }}</td>
                                <td  class="text-center">{{ $akun->email }}</td>
                                <!-- <td>{{ $akun->password}}</td> -->
                                <td  class="text-center">
                                    @foreach ($akun->roles as $role)
                                        {{ $role->name }}
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('edit_account', ['id' => $akun->id]) }}">
                                        <img src="/assets/images/Edit.png" alt="edit">
                                    </a>
                                    <form onsubmit="return confirm('Yakin ingin menghapus data?')" class="d-inline" action="{{ route('delete_account', ['id' => $akun->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" name="submit">
                                            <img src="/assets/images/Remove.png" alt="remove">
                                        </button>
                                    </form>
                                </td>

                            </tr>
                            <?php $i++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
