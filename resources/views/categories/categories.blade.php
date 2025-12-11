@extends('layouts.app')

@section('title','Kategori Properti')

@section('content')

<h2 style="color:#004080;font-weight:bold;">Manajemen Kategori Properti</h2>

<a href="{{ route('category.create') }}" 
   style="background:#004080;color:white;padding:10px 15px;border-radius:6px;display:inline-block;margin-bottom:15px;">
   + Tambah Kategori
</a>

<table border="1" cellpadding="10" cellspacing="0" width="100%">
    <thead style="background:#004080;color:white;">
        <tr>
            <th>Nama Kategori</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($categories as $c)
        <tr>
            <td>{{ $c->nama }}</td>
            <td>{{ $c->deskripsi }}</td>
            <td>Rp {{ number_format($c->harga,0,',','.') }}</td>
            <td>
                <img src="{{ asset('assets/thumbnail/'.$c->gambar) }}" width="90" height="70" style="object-fit:cover;">
            </td>
            <td>
                <a href="{{ route('category.edit', $c->id_categories) }}">Edit</a> |
                <a href="{{ route('category.delete', $c->id_categories) }}">Hapus</a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" style="text-align:center;color:#888;">Belum ada kategori</td>
        </tr>
        @endforelse
    </tbody>

</table>

@endsection
