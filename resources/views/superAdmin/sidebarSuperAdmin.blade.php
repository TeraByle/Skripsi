<div class="sidebar">
    <button class="sidebar-button button-1"><a href="{{ route('home') }}" style="text-decoration: none;color: black;">Data Barang</button>
    <button class="sidebar-button button-2"><a href="{{ route('transaksi') }}" style="text-decoration: none;color: black;">Transaksi Penjualan</a></button>

    @if(Auth::user()->role == 'superAdmin')
    <button class="sidebar-button button-3"><a href="{{route('cetakdata')}}" style="text-decoration: none;color: black;">Laporan Keuangan</a></button>
    <button class="sidebar-button button-4"><a href="{{route('account_management')}}" style="text-decoration: none;color: black;">Manajemen Akun</a></button>
    @endif
</div>
