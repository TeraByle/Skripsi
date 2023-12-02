<!-- tabelLaporan.blade.php -->

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
    <tbody>
        @php
            $counter = 1;
        @endphp

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
            {{-- Kosong --}}
        @endforelse
    </tbody>
</table>
