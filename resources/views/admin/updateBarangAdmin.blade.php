<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Barang</title>
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
                <a href="{{ route('admin/hompage') }}"style="text-decoration: none;color: white;">Kembali</button></a>
            <div class="isi-judul">
                <h2>Update Data Barang</h2>
            </div>
            <div class="container-up">
                <div class="form-container-up">
                    <form action="{{ route('update_barang', ['BarangId' => $data->BarangId]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <!-- Section 1: Kode dan Nama Barang -->
                    <div class="form-section">
                        <div class="form-field">
                            <label for="brand">Update Kode Barang</label>
                            <input type="text" id="code" name="KodeBarang" value="{{$data->KodeBarang}}">
                            @error('KodeBarang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-field">
                            <label for="category">Update Nama Barang</label>
                            <input type="text" id="name" name="NamaBarang" value="{{$data->NamaBarang}}">
                            @error('NamaBarang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>

                    <!-- Section 2: Jenis dan Satuan Barang -->
                    <div class="form-section">
                        <div class="form-field">
                            <label for="name">Update Jenis Barang</label>
                            <input type="text" id="type" name="JenisBarang" value="{{$data->JenisBarang}}">
                            @error('JenisBarang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-field">
                            <label for="code">Update Satuan Barang</label>
                            <input type="text" id="unit" name="SatuanBarang" value="{{$data->SatuanBarang}}">
                            @error('SatuanBarang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>

                    <!-- Section 3: Kategori dan Brand Barang -->
                    <div class="form-section">
                        <div class="form-field">
                            <label for="type">Update Kategori Barang</label>
                            <input type="text" id="category" name="KategoriBarang" value="{{$data->KategoriBarang}}">
                            @error('KategoriBarang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-field">
                            <label for="unit">Update Brand Barang</label>
                            <input type="text" id="brand" name="BrandBarang" value="{{$data->BrandBarang}}">
                            @error('BrandBarang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>

                    <!-- Section 4: Stok dab Tanggal Beli Barang -->
                    <div class="form-section">
                        <div class="form-field">
                            <label for="stock">Update Stok Barang</label>
                            <input type="text" id="stock" name="StokBarang" value="{{$data->StokBarang}}">
                            @error('StokBarang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-field">
                            <label for="purchase-date">Update Tanggal Beli Barang</label>
                            <input type="date" id="purchase-date" name="TanggalBeli" value="{{$data->TanggalBeli}}">
                            @error('TanggalBeli')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>

                    <!-- Section 5: Stok dab Tanggal Beli Barang -->
                    <div class="form-section">
                        <div class="form-field">
                            <label for="purchase-price">Update Harga Beli Barang</label>
                            <input type="text" id="purchase-price" name="HargaBeli" value="{{$data->HargaBeli}}">
                            @error('HargaBeli')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-field">
                            <label for="selling-price">Update Harga Jual Barang</label>
                            <input type="text" id="selling-price" name="HargaJual" value="{{$data->HargaJual}}">
                            @error('HargaJual')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>

                    <!-- Section 6: Upload Gambar -->
                    <div class="form-section">
                        <div class="upload">
                            <label for="upload-image">Update Gambar</label>
                            <br>
                            <input type="file" id="upload-image" name="gambar">
                        </div>
                    </div>

                    <!-- Section 7: Simpan Button -->
                    <div class="form-section">
                        <button class="save-button" type="submit" name="submit">Simpan</button>
                    </div>
                </form>
                </div>
        </div>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
