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
            <div class="row">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1516214104703-d870798883c5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=700&q=60" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Lakban Bening / Coklat BODHI 2 inch</h5>
                            <p class="card-text">Category : Buku dan Alat Tulis</p>
                            <p class="card-text">Brand : Bodhi Tape</p>
                            <p class="card-text">Jumlah Stok : 235 pcs</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1516214104703-d870798883c5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=700&q=60" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Lakban Bening / Coklat BODHI 2 inch</h5>
                            <p class="card-text">Category : Buku dan Alat Tulis</p>
                            <p class="card-text">Brand : Bodhi Tape</p>
                            <p class="card-text">Jumlah Stok : 235 pcs</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1477862096227-3a1bb3b08330?ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=60" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Kain Kanebo KENMASTER Synthetic cloth(Super Quality)</h5>
                            <p class="card-text">Category : Perlenglapan rumah</p>
                            <p class="card-text">Brand : NASA</p>
                            <p class="card-text">Jumlah Stok : 30pcs</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1477862096227-3a1bb3b08330?ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=60" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Terpal Tenda Pelastik Biru Serbaguna A2 3x4 Meter Terpal</h5>
                            <p class="card-text">Category : Otomotif</p>
                            <p class="card-text">Brand : Kenmaster High Quality</p>
                            <p class="card-text">Jumlah Stok : 189 pcs</p>
                        </div>
                    </div>
            </div>
        </div>
        <div class="contenthome">
            <div class="row">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1477862096227-3a1bb3b08330?ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=60" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Alat Tembak Lem Botol FREED Tebal Tembakan Sealent Kaca</h5>
                            <p class="card-text">Category : Perlengkapan rumah</p>
                            <p class="card-text">Brand : Freed</p>
                            <p class="card-text">Jumlah Stok : 372 pcs</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1516214104703-d870798883c5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=700&q=60" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Refill Cutter KENKO A100 isi Ulang pisau kecil A 100 5 pcs</h5>
                            <p class="card-text">Category : Buku dan Alat Tulis</p>
                            <p class="card-text">Brand : Kenko A-100</p>
                            <p class="card-text">Jumlah Stok : 87 pcs</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1477862096227-3a1bb3b08330?ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=60" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">BODY PELOR RAVELLI</h5>
                            <p class="card-text">Category : Otomotif</p>
                            <p class="card-text">Brand : Ravelli</p>
                            <p class="card-text">Jumlah Stok : 96 pcs</p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1477862096227-3a1bb3b08330?ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=60" alt="" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">POMPA SEPEDA CAMEL</h5>
                            <p class="card-text">Category : Olahraga dan Outdoor</p>
                            <p class="card-text">Brand : Camel</p>
                            <p class="card-text">Jumlah Stok : 99 pcs</p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
            <a href="https://api.whatsapp.com/send?phone=6281298587769" class="float" target="_blank">
                <i class="fa fa-whatsapp my-float"></i>
            </a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
