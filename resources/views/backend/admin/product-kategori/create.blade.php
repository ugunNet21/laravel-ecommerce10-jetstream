
@extends('layouts.app')

@section('content')
    <h2>Tambah Kategori Produk Baru</h2>

    <form action="{{ route('product-kategori-store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="active">Aktif</option>
                <option value="inactive">Non-Aktif</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="parent_id" class="form-label">Kategori Induk</label>
            <select class="form-control" id="parent_id" name="parent_id">
                <option value="{{null}}" selected>Tanpa Kategori Induk</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="images" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="images" name="images" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
