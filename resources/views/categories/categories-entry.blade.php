@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')

<h2 style="color:#004080;font-weight:bold;">Tambah Kategori Properti</h2>

<form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Nama Kategori:</label>
    <input type="text" name="nama" required>

    <label>Deskripsi:</label>
    <textarea name="deskripsi" required></textarea>

    <label>Harga Properti:</label>
    <input type="number" name="harga" required>

    <label>Foto Properti:</label>
    <input type="file" name="gambar" required>

    <button type="submit">Simpan</button>
    <a href="{{ route('category.index') }}">Kembali</a>
</form>

@endsection
