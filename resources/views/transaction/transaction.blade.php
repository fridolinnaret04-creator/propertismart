@extends('layouts.app')

@section('title', 'Transaksi')

@section('content')

<h2 style="color:#004080;font-weight:bold;">Data Transaksi</h2>
<div style="text-align: right; margin-bottom: 20px;">
    <a href="{{ route('transaction.pdf') }}" class="btn btn-primary">Cetak PDF</a>
</div>
<table border="1" cellpadding="10" cellspacing="0" width="100%">
    <thead style="background:#004080;color:white;">
        <tr>
            <th>Properti</th>
            <th>Pembeli</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Harga</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($transactions as $t)
        <tr>
            

            <td>{{ $t->category->nama }}</td>
            <td>{{ $t->nama_pembeli }}</td>
            <td>{{ $t->no_hp }}</td>
            <td>{{ $t->alamat }}</td>
            <td>Rp {{ number_format($t->harga,0,',','.') }}</td>
            <td>{{ $t->tanggal }}</td>
            <td>
                
                <a href="{{ route('transaction.delete', $t->id_transaction) }}"
                   onclick="return confirm('Hapus transaksi ini?')">
                    Hapus
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" style="text-align:center;color:#777;">Belum ada transaksi</td>
        </tr>
        @endforelse
    </tbody>

</table>

@endsection
