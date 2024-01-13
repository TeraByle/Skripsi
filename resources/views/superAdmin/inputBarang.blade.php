<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Input Barang</title>
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
        <div class="isi-deskripsi">
            <button class="isi-kembali">
                <a href="{{ route('home') }}" style="text-decoration: none;color: white;">Kembali</a>
            </button>
                    </ul>
                </div>
            </div>
                <div class="isi-judul">
                    <h2>Input Data Barang</h2>
                </div>
            <div class="container-up">
                <div class="form-container-up">
                    <form action="{{route('store_produk')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- Section 1: Kode dan Nama Barang -->
                        <div class="form-section">
                            <div class="form-field-nama">
                                <label for="category">Nama Barang</label>
                                <input type="text" id="nama" name="NamaBarang" value="{{Session::get('NamaBarang')}}">
                                @error('NamaBarang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Section 2: Jenis dan Satuan Barang -->
                        <div class="form-section">
                            <div class="form-field">
                                <label for="name">Jenis Barang</label>
                                <input type="text" id="jenis" name="JenisBarang" value="{{Session::get('JenisBarang')}}">
                                @error('JenisBarang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-field">
                                <label for="code">Satuan Barang</label>
                                <input type="text" id="satuan" name="SatuanBarang" value="{{Session::get('SatuanBarang')}}">
                                @error('SatuanBarang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Section 3: Kategori dan Brand Barang -->
                        <div class="form-section">
                            <div class="form-field">
                                <label for="type">Kategori Barang</label>
                                <input type="text" id="kategori" name="KategoriBarang" value="{{Session::get('KategoriBarang')}}">
                                @error('KategoriBarang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-field">
                                <label for="unit">Brand Barang</label>
                                <input type="text" id="brand" name="BrandBarang" value="{{Session::get('BrandBarang')}}">
                                @error('BrandBarang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Section 4: Stok dab Tanggal Beli Barang -->
                        <div class="form-section">
                            <div class="form-field">
                                <label for="stock">Stok Barang</label>
                                <input type="text" id="stok" name="StokBarang" value="{{Session::get('StokBarang')}}">
                                @error('StokBarang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-field">
                                <label for="purchase-date">Tanggal Beli Barang</label>
                                <input type="date" id="tanggalBeli" name="TanggalBeli" value="{{Session::get('TanggalBeli')}}">
                                @error('TanggalBeli')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Section 4: Stok dab Tanggal Beli Barang -->
                        <div class="form-section">
                            <div class="form-field">
                                <label for="purchase-price">Harga Beli Barang</label>
                                <input type="text" id="hargaBeli" name="HargaBeli" value="{{Session::get('HargaBeli')}}">
                                @error('HargaBeli')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-field">
                                <label for="selling-price">Harga Jual Barang</label>
                                <input type="text" id="hargaJual" name="HargaJual" value="{{Session::get('HargaJual')}}">
                                @error('HargaJual')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Section 5: Upload Gambar -->
                        <div class="form-section">
                            <div class="upload">
                                <label for="upload-image">Masukkan Gambar</label>
                                <br>
                                <input type="file" id="gambar" name="gambar">
                                </div>
                        </div>

                    <!-- Section 6: Simpan Button -->
                        <div class="form-section">
                            <button type="submit" name="submit" class="save-button">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
