@extends('layouts.app')

@section('title','Edit Kategori')

@section('content')

<h2>Edit Kategori</h2>

<form action="{{ route('category.update', $category->id_categories) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Nama Kategori:</label>
    <input type="text" name="nama" value="{{ $category->nama }}" required>

    <label>Deskripsi:</label>
    <textarea name="deskripsi">{{ $category->deskripsi }}</textarea>

    <label>Harga:</label>
    <input type="number" name="harga" value="{{ $category->harga }}" required>

    <label>Foto:</label><br>
    <img src="{{ asset('assets/thumbnail/'.$category->gambar) }}" width="150"><br><br>
    <input type="file" name="gambar">

    <button type="submit">Update</button>
    <a href="{{ route('category.index') }}">Kembali</a>
</form>

@endsection
