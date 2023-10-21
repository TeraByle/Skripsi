<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Transaksi</title>
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
        <div class="isi-deskripsi">
            <button class="isi-kembali">Kembali</button>
            <div class="isi-judul">
                <h2>Tambah Transaksi Baru</h2>
            </div>
            <div class="container-transaksi1">
                <div class="form-container-transaksi2">
                        <!-- Section 1: Kode dan Nama Barang -->
                        <div class="form-section">
                            <div class="form-field">
                                <label for="brand">Kode Barang</label>
                                <input type="text" id="kode" name="KodeBarang" value="{{Session::get('KodeBarang')}}">
                            </div>
                            <div class="form-field">
                                <label for="category">Nama Barang</label>
                                <input type="text" id="nama" name="NamaBarang" value="{{Session::get('NamaBarang')}}">
                            </div>
                        </div>

                        <!-- Section 2: Jenis dan Satuan Barang -->
                        <div class="form-section">
                            <div class="form-field">
                                <label for="name">kategori Barang</label>
                                <input type="text" id="kategori" name="KategoriBarang" value="{{Session::get('KategoriBarang')}}">
                            </div>
                            <div class="form-field">
                                <label for="code">Satuan Barang</label>
                                <input type="text" id="satuan" name="SatuanBarang" value="{{Session::get('SatuanBarang')}}">
                            </div>
                        </div>
                        <!-- Section 3: Kategori dan Brand Barang -->
                        <div class="form-section">
                            <div class="form-field">
                                <label for="type">Jumlah Barang</label>
                                <input type="text" id="jumlah" name="JumlahBarang" value="{{Session::get('JumlahBarang')}}">
                            </div>
                            <div class="form-field">
                                <label for="unit">Harga Barang</label>
                                <input type="text" id="harga" name="HargaBarang" value="{{Session::get('HargaBarang')}}">
                            </div>
                        </div>

                        <!-- Section 4: Simpan Button -->
                        <div class="form-section">
                            <button type="submit" name="submit" class="save-button">Simpan</button>
                        </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
