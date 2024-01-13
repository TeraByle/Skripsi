<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tambah Transaksi</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/transaksi.css">
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
                <a href="{{ route('transaksi') }}" style="text-decoration: none;color: white;">Kembali</a></button>
            <div class="isi-judul">
                <h2>Tambah Transaksi Baru</h2>
            </div>
            <div class="container-transaksi1">
                <div class="form-container-transaksi2">
                    <form action="{{route('store_transaksi')}}" method="post">
                    @csrf
                        <!-- Section 1: Kode dan Nama Barang -->
                        <div class="form-section">
                            <div class="form-field">
                                <label for="brand">Kode Barang</label>
                                <select id="kode_barang" name="KodeBarang">
                                    <option value="">Pilih Kode Barang</option>
                                    @foreach ($kode as $kodebarang)
                                    <option value="{{ $kodebarang->KodeBarang }}">{{ $kodebarang->KodeBarang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-field">
                                <label for="category">Nama Barang</label>
                                <input type="text" id="nama" name="NamaBarang" value="{{Session::get('NamaBarang')}}" disabled>
                                @error('NamaBarang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Section 2: Jenis dan Satuan Barang -->
                        <div class="form-section">
                            <div class="form-field">
                                <label for="name">kategori Barang</label>
                                <input type="text" id="kategori" name="KategoriBarang" value="{{Session::get('KategoriBarang')}}" disabled>
                                @error('KategoriBarang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-field">
                                <label for="code">Satuan Barang</label>
                                <input type="text" id="satuan" name="SatuanBarang" value="{{Session::get('SatuanBarang')}}" disabled>
                                @error('SatuanBarang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Section 3: Kategori dan Brand Barang -->
                        <div class="form-section">
                            <div class="form-field">
                                <label for="type">Jumlah Barang</label>
                                <input type="text" id="jumlah" name="StokBarang" value="{{Session::get('StokBarang')}}">
                                @error('StokBarang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-field">
                                <label for="unit">Harga Barang</label>
                                <input type="text" id="harga" name="HargaJual" value="{{Session::get('HargaJual')}}">
                                @error('HargaJual')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Section 4: Simpan Button -->
                        <div class="form-section">
                            <button type="submit" name="submit" class="save-button">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script>
            $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#kode_barang').on('change', function () {
                    let BarangId = $(this).val();
                    $.ajax({
                        type: 'GET',
                        url: '/superAdmin/ajax/barang/' + BarangId,
                        success: function (data) {
                            console.log(data);

                            // Mengisi nilai input berdasarkan data yang diterima dari server
                            $('#nama').val(data.NamaBarang);
                            $('#kategori').val(data.KategoriBarang);
                            $('#satuan').val(data.SatuanBarang);

                        },
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });
            });
        </script>

    </body>
</html>
