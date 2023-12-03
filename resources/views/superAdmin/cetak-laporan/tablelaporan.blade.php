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
        @forelse ($gabunganData as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $item->TransaksiId }}</td>
                <td class="text-center">{{ $item->KodeBarang }}</td>
                <td class="text-center">{{ $item->NamaBarang }}</td>
                <td class="text-center">{{ $item->SatuanBarang }}</td>
                <td class="text-center">{{ $item->KategoriBarang }}</td>
                <td class="text-center">{{ $item->StokBarang }}</td>
                <td class="text-center">Rp {{ $item->HargaJual }}</td>
                <td class="text-center">{{ $item->tanggal }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center">Tidak ada data transaksi.</td>
            </tr>
        @endforelse
    </tbody>
</table>
