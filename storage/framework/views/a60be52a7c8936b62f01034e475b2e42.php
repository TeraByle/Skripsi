<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Input Barang</title>
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
            <button class="isi-kembali">
                <a href="/produk">Kembali</a>
            </button>
            <?php if($errors->any()): ?>
            <div class="validate-message">
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($item); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <?php endif; ?>
                <div class="isi-judul">
                    <h2>Input Data Barang</h2>
                </div>
            <div class="container-up">
                <div class="form-container-up">

                    <form action="<?php echo e(url('/produk')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <!-- Section 1: Kode dan Nama Barang -->
                        <div class="form-section">
                            <div class="form-field">
                                <label for="brand">Kode Barang</label>
                                <input type="text" id="kode" name="KodeBarang" value="<?php echo e(Session::get('KodeBarang')); ?>">
                            </div>
                            <div class="form-field">
                                <label for="category">Nama Barang</label>
                                <input type="text" id="nama" name="NamaBarang" value="<?php echo e(Session::get('NamaBarang')); ?>">
                            </div>
                        </div>

                        <!-- Section 2: Jenis dan Satuan Barang -->
                        <div class="form-section">
                            <div class="form-field">
                                <label for="name">Jenis Barang</label>
                                <input type="text" id="jenis" name="JenisBarang" value="<?php echo e(Session::get('JenisBarang')); ?>">
                            </div>
                            <div class="form-field">
                                <label for="code">Satuan Barang</label>
                                <input type="text" id="satuan" name="SatuanBarang" value="<?php echo e(Session::get('SatuanBarang')); ?>">
                            </div>
                        </div>
                        <!-- Section 3: Kategori dan Brand Barang -->
                        <div class="form-section">
                            <div class="form-field">
                                <label for="type">Kategori Barang</label>
                                <input type="text" id="kategori" name="KategoriBarang" value="<?php echo e(Session::get('KategoriBarang')); ?>">
                            </div>
                            <div class="form-field">
                                <label for="unit">Brand Barang</label>
                                <input type="text" id="brand" name="BrandBarang" value="<?php echo e(Session::get('BrandBarang')); ?>">
                            </div>
                        </div>

                        <!-- Section 4: Stok dab Tanggal Beli Barang -->
                        <div class="form-section">
                            <div class="form-field">
                                <label for="stock">Stok Barang</label>
                                <input type="text" id="stok" name="StokBarang" value="<?php echo e(Session::get('StokBarang')); ?>">
                            </div>
                            <div class="form-field">
                                <label for="purchase-date">Tanggal Beli Barang</label>
                                <input type="date" id="tanggalBeli" name="TanggalBeli" value="<?php echo e(Session::get('TanggalBeli')); ?>">
                            </div>
                        </div>
                        <!-- Section 4: Stok dab Tanggal Beli Barang -->
                        <div class="form-section">
                            <div class="form-field">
                                <label for="purchase-price">Harga Beli Barang</label>
                                <input type="text" id="hargaBeli" name="HargaBeli" value="<?php echo e(Session::get('HargaBeli')); ?>">
                            </div>
                            <div class="form-field">
                                <label for="selling-price">Harga Jual Barang</label>
                                <input type="text" id="hargaJual" name="HargaJual" value="<?php echo e(Session::get('HargaJual')); ?>">
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
<?php /**PATH C:\xampp\htdocs\Skripsi\resources\views/inputBarang.blade.php ENDPATH**/ ?>