<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home Page</title>
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
                        <div class="user-name">Login</div>
                    </div>
                    <div class="arrow-icon">
                        <img src="assets/images/LogOut.png" alt="logout">
                    </div>
                </div>
            </div>
        </div>
        <div class="isi">
            <div class="content">
                <h2>List Nama Produk</h2>
                <p>Cari produk yang Anda inginkan</p>
                <div class="button-table">
                    <div class="input-group">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        <button type="button" class="btn btn-outline-primary">Search</button>
                    </div>
                </div>
                <div class="tabel">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Tanggal Beli</th>
                                <th scope="col">Harga Beli</th>
                                <th scope="col">Harga Jual</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td><img src="assets/images/PaluKambing.png" alt=""></td>
                                <td>PP001</td>
                                <td>Palu Kambing Hitam NASA Hammer Martil Gagang Besi 16 oz</td>
                                <td>Palu Kambing Hitam</td>
                                <td>Pcs</td>
                                <td>Palu</td>
                                <td>NASA</td>
                                <td>30</td>
                                <td>19 September 2023</td>
                                <td>Rp 34.650</td>
                                <td>Rp 40.000</td>
                                <td><img src="assets/images/LogOut.png" alt="logout"></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td><img src="assets/images/LakbanBening.png" alt=""></td>
                                <td>BL001</td>
                                <td>Lakban Bening BODHI 2 inch</td>
                                <td>Lakban Bening</td>
                                <td>Pcs</td>
                                <td>Lakban</td>
                                <td>Bodhi Tape</td>
                                <td>235</td>
                                <td>21 September 2023</td>
                                <td>Rp 9.400</td>
                                <td>Rp 15.000</td>
                                <td><img src="assets/images/LogOut.png" alt="logout"></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td><img src="assets/images/KainKanebo.png" alt=""></td>
                                <td>OK001</td>
                                <td>Kain Kanebo KENMASTER Synthetic cloth(Super Quality)</td>
                                <td>Kanebo Synthetic</td>
                                <td>Pcs</td>
                                <td>Kanebo</td>
                                <td>KENMASTER High Quality</td>
                                <td>189</td>
                                <td>23 September 2023</td>
                                <td>Rp 20.000</td>
                                <td>Rp 25.000</td>
                                <td><img src="assets/images/LogOut.png" alt="logout"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
