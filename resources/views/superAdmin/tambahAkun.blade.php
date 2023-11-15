<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Akun</title>
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
        <div class="isi-deskripsi">
            <button class="isi-kembali">
                <a href="/superAdmin/akun" style="text-decoration: none;color: white;">Kembali</a></button>
            <div class="isi-judul">
                <h2>Tambahkan AKun</h2>
            </div>
            <div class="container-up-akun">
                <div class="form-container-akun">
                    <!-- Section 1: Kode dan Nama Barang -->
                    <div class="form-section">
                        <div class="form-field-akun">
                            <label for="brand">Nama</label>
                            <input type="nama" id="nama" name="namax">
                        </div>
                    </div>

                    <!-- Section 2: Jenis dan Satuan Barang -->
                    <div class="form-section">
                        <div class="form-field-akun">
                            <label for="name">Kata Sandi</label>
                            <input type="katasandi" id="katasandi" name="katasandi">
                        </div>
                    </div>
                    <!-- Section 3: Kategori dan Brand Barang -->
                    <div class="form-section">
                        <div class="form-field-akun">
                            <label for="type">Email</label>
                            <input type="email" id="email" name="email">
                        </div>
                    </div>

                    <!-- Section 6: Simpan Button -->
                    <div class="form-section">
                        <button class="save-button">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
