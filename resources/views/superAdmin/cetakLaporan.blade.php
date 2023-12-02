<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/cetakLaporan.css">
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="/assets/images/LogoNew.png" alt="Logo">
            </a>
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
    <div class="isi">
        <div class="sidebar">
            <button class="sidebar-button button-1"><a href="{{ route('home') }}" style="text-decoration: none;color: black;">Data Barang</a></button>
            <button class="sidebar-button button-2"><a href="{{ route('transaksi') }}" style="text-decoration: none;color: black;">Transaksi Penjualan</a></button>
            <button class="sidebar-button button-3"><a href="{{ route('cetakdata') }}" style="text-decoration: none;color: white;">Laporan Keuangan</a></button>
            <button class="sidebar-button button-4"><a href="{{route('account_management')}}" style="text-decoration: none;color: black;">Manajemen Akun</a></button>
        </div>
        <div class="isi-judul">
            <h2>Cetak Laporan</h2>
            <div class="container-cetak">
                <form action="{{ route('cetakdatasemua') }}" method="post">
                    @csrf
                    <!-- Isi formulir lainnya -->
                    <div class="form-container-cetak">
                        <div class="form-section">
                            <div class="form-field-akun">
                                <label for="tanggal_awal">Dari Tanggal</label>
                                <input type="date" name="tanggal_awal" id="tanggal_awal" value="{{ old('tanggal_awal') }}">
                                @error('tanggal_awal')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-section">
                            <div class="form-field-akun">
                                <label for="tanggal_akhir">Sampai Tanggal</label>
                                <input type="date" name="tanggal_akhir" id="tanggal_akhir" value="{{ old('tanggal_akhir') }}">
                                @error('tanggal_akhir')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-section">
                            <button class="save-button" type="submit" name="aksi" value="cetak">Cetak</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="data-table">
                <h4>Data Transaksi</h4>
                <div class="unduh-button">
                    <a href="{{ route('unduhPDF', ['unduh_pdf' => 1, 'tanggal_awal' => $tanggalAwal, 'tanggal_akhir' => $tanggalAkhir]) }}" class="save-button">Unduh PDF</a>
                </div>
                <table class="table">

                    <thead>
                        <tr>
                            <th class="text-center" scope="col">No</th>
                            <th class="text-center" scope="col">Kode Transaksi</th>
                            <th class="text-center" scope="col">Kode Barang</th>
                            <th class="text-center" scope="col">Nama Barang</th>
                            <th class="text-center" scope="col">Satuan Barang</th>
                            <th class="text-center" scope="col">Kategori Barang</th>
                            <th class="text-center" scope="col">Jumlah Barang</th>
                            <th class="text-center" scope="col">Harga Barang</th>
                            <th class="text-center" scope="col">Tanggal Transaksi</th>
                        </tr>

                    </thead>
                    @php
                    $totalItems = (isset($dataTransaksi) ? count($dataTransaksi) : 0) + (isset($dataBarang) ? count($dataBarang) : 0);
                    $counter = 1;
                @endphp

                    <tbody>
                        @forelse ($dataTransaksi as $transaksi)
                            <tr>
                                <td class="text-center">{{ $counter++ }}</td>
                                <td class="text-center">{{ $transaksi->TransaksiId }}</td>
                                <td class="text-center">{{ $transaksi->KodeBarang }}</td>
                                <td class="text-center">{{ $transaksi->NamaBarang }}</td>
                                <td class="text-center">{{ $transaksi->SatuanBarang }}</td>
                                <td class="text-center">{{ $transaksi->KategoriBarang }}</td>
                                <td class="text-center">{{ $transaksi->StokBarang }}</td>
                                <td class="text-center">Rp {{ $transaksi->HargaJual }}</td>
                                <td class="text-center">{{ $transaksi->tanggal }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Tidak ada data transaksi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tbody>
                        @forelse ($dataBarang as $barangtransaksi)
                            <tr>
                                <td class="text-center">{{ $counter++ }}</td>
                                <td class="text-center">{{ $barangtransaksi->TransaksiId }}</td>
                                <td class="text-center">{{ $barangtransaksi->KodeBarang }}</td>
                                <td class="text-center">{{ $barangtransaksi->NamaBarang }}</td>
                                <td class="text-center">{{ $barangtransaksi->SatuanBarang }}</td>
                                <td class="text-center">{{ $barangtransaksi->KategoriBarang }}</td>
                                <td class="text-center">{{ $barangtransaksi->StokBarang }}</td>
                                <td class="text-center">Rp {{ $barangtransaksi->HargaJual }}</td>
                                <td class="text-center">{{ $barangtransaksi->tanggal }}</td>
                            </tr>
                        @empty
                            <tr>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
