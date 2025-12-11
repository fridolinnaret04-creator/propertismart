@extends('layouts.app')

@section('title','Hapus Kategori')

@section('content')

<h2>Konfirmasi Hapus Kategori</h2>

<p>Yakin ingin menghapus kategori berikut?</p>

<ul>
    <li><strong>Nama:</strong> {{ $category->nama }}</li>
    <li><strong>Deskripsi:</strong> {{ $category->deskripsi }}</li>
    <li><strong>Harga:</strong> Rp {{ number_format($category->harga,0,',','.') }}</li>
</ul>

<a href="{{ route('category.destroy', $category->id_categories) }}">Hapus</a>
<a href="{{ route('category.index') }}">Batal</a>

@endsection
