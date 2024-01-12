<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/homepage.css">
    </head>
    <body>
        <div class="header">
            <div class="logo">
                <img src="/assets/images/LogoNew.png" alt="Logo">
            </div>
            <div class="content-header">
                <div class="user-info">
                    <div class="user-details">
                        <div class="user-name"><a href="{{ route('login') }}" style="text-decoration: none;color: black;">Login</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="isihome">
        <div class="deskripsi">
            <div class="contentkiri">
                <h2>TENTANG CENTRAL UTAMA</h2>
                <p>Central Utama merupakan salah satu Toko Agen Material terlengkap di daerah Pademangan. Central Utama sudah berdiri sejak tahun 2005 dan sudah memiliki 3 cabang di daerah Pademangan. Tunggu apalagi, jangan ragu untuk beli kebutuhan Barang mu di Central Utama.</p>
            </div>
        </div>
        <div class="searchhome">
            <form class="search" action="/" method="GET">
                <input type="search" name="search" class="form-control rounded"
                    placeholder="Barang apa yang ingin anda cari?" aria-label="Search" aria-describedby="search-addon"/>
                    <button type="submit" class="btn btn-outline-primary">Search</button>
            </form>
                </div>
                @if(Session::has('no-results'))
                    <div class="pt-3">
                        <div class="alert alert-danger">
                            {{Session::get('no-results')}}
                        </div>
                    </div>
                @endif
        <div class="contenthome">
            <div class="row row-cols-4">
                @foreach($data as $item)
                <div class="col d-flex justify-content-center ">
                    <div class="card">
                    <td class="text-center">
                                    @if ($item->gambar)
                                    <img src="{{ asset('assets/fileproduk/' . $item->gambar) }}" height="250px" width="295px">
                                    @endif
                        <div class="card-body">
                            <h5 class="card-title">{{$item->NamaBarang}}</h5>
                            <p class="card-text">Category : {{$item->KategoriBarang}}</p>
                            <p class="card-text">Brand : {{$item->BrandBarang}}</p>
                            <p class="card-text">Jumlah Stok : {{$item->StokBarang}} {{$item->SatuanBarang}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $data-> withQueryString()->links()}}
        </div>
    </div>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
            <a href="https://api.whatsapp.com/send?phone=6281298587769" class="float" target="_blank">
                <i class="fa fa-whatsapp my-float"></i>
            </a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
