<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header">
        <div class="logo">
            <img src="assets/images/Logo.png" alt="Logo">
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
    <h2>Input Data Barang</h2>
    </div>
<div class="container-up">
        <div class="form-container-up">
            <!-- Section 1: Kode dan Nama Barang -->
            <div class="form-section">
                <div class="form-field">
                    <label for="brand">Update Kode Barang</label>
                    <input type="text" id="code" name="code">
                </div>
                <div class="form-field">
                    <label for="category">Update Nama Barang</label>
                    <input type="text" id="name" name="name">
                </div>
            </div>

            <!-- Section 2: Jenis dan Satuan Barang -->
            <div class="form-section">
                <div class="form-field">
                    <label for="name">Update Jenis Barang</label>
                    <input type="text" id="type" name="type">
                </div>
                <div class="form-field">
                    <label for="code">Update Satuan Barang</label>
                    <input type="text" id="unit" name="unit">
                </div>
            </div>
            <!-- Section 3: Kategori dan Brand Barang -->
            <div class="form-section">
                <div class="form-field">
                    <label for="type">Update Kategori Barang</label>
                    <input type="text" id="category" name="category">
                </div>
                <div class="form-field">
                    <label for="unit">Update Brand Barang</label>
                    <input type="text" id="brand" name="brand">
                </div>
            </div>

            <!-- Section 4: Stok dab Tanggal Beli Barang -->
            <div class="form-section">
                <div class="form-field">
                    <label for="stock">Update Stok Barang</label>
                    <input type="text" id="stock" name="stock">
                </div>
                <div class="form-field">
                    <label for="purchase-date">Update Tanggal Beli Barang</label>
                    <input type="text" id="purchase-date" name="purchase-date">
                </div>
            </div>
            <!-- Section 4: Stok dab Tanggal Beli Barang -->
            <div class="form-section">
                <div class="form-field">
                    <label for="purchase-price">Update Harga Beli Barang</label>
                    <input type="text" id="purchase-price" name="purchase-price">
                </div>
                <div class="form-field">
                    <label for="selling-price">Update Harga Jual Barang</label>
                    <input type="text" id="selling-price" name="selling-price">
                </div>
            </div>
            <!-- Section 5: Upload Gambar -->
            <div class="form-section">
                <div class="upload">
                    <label for="upload-image">Update Gambar</label>
                    <br>
                    <input type="file" id="upload-image" name="upload-image">
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
<?php /**PATH C:\xampp\htdocs\Skripsi\resources\views/updatebarang.blade.php ENDPATH**/ ?>