<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Transaksi Barang</title>
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
                <button class="sidebar-button button-3">Laporan Keuangan</button>
                <button class="sidebar-button button-4">Manajemen Akun</button>
            </div>
            <div class="content">
                <h2>Transaksi Barang</h2>
                <p>Kelola Transaksi Barang Anda</p>
                <div class="button-table">
                    <img src="assets/images/Filter.png" alt="">
                    <div class="input-group">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        <button type="button" class="btn btn-outline-primary">Search</button>
                    </div>
                    <button class="button-barang">
                        <a href="/create">+ Tambah Transaksi</a>
                    </button>
                </div>
                <div class="tabel">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Kategori Barang</th>
                                <th scope="col">Satuan Barang</th>
                                <th scope="col">Jumlah Barang</th>
                                <th scope="col">Harga Barang</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>PP001</td>
                                <td>Palu Kambing Hitam NASA Hammer Martil Gagang Besi 16 oz</td>
                                <td>Perlengkapan Rumah</td>
                                <td>Pcs</td>
                                <td>20</td>
                                <td>Rp 500.000</td>
                                <td><img src="assets/images/Edit.png" alt="Edit"></td>
                                <td><img src="assets/images/Remove.png" alt="Remove"></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>PP002</td>
                                <td>Lakban Bening / Coklat BODHI 2 inch</td>
                                <td>Buku dan Alat Tulis</td>
                                <td>Pcs</td>
                                <td>15</td>
                                <td>Rp 400.000</td>
                                <td><img src="assets/images/Edit.png" alt="Edit"></td>
                                <td><img src="assets/images/Remove.png" alt="Remove"></td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                                <td>PP003</td>
                                <td>Kain Kanebo KENMASTER Synthetic cloth(Super Quality)</td>
                                <td>Otomotif</td>
                                <td>Pcs</td>
                                <td>10</td>
                                <td>Rp 300.000</td>
                                <td><img src="assets/images/Edit.png" alt="Edit"></td>
                                <td><img src="assets/images/Remove.png" alt="Remove"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\Skripsi\resources\views/transaksi.blade.php ENDPATH**/ ?>