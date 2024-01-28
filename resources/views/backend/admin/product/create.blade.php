<!-- resources/views/backend/admin/product/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Tambah Produk Baru</h2>

    <form action="{{ route('product-store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori Produk</label>
            <select class="form-control" id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="product_code" class="form-label">Kode Produk</label>
            <input type="text" class="form-control" id="product_code" name="product_code" required>
        </div>

        <div class="mb-3">
            <label for="selling_price" class="form-label">Harga Jual</label>
            <input type="number" class="form-control" id="selling_price" name="selling_price" required>
        </div>

        <div class="mb-3">
            <label for="purchase_price" class="form-label">Harga Beli</label>
            <input type="number" class="form-control" id="purchase_price" name="purchase_price" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stock" name="stock" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar Produk</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>

        <!-- Tambahkan elemen-elemen form untuk atribut-atribut lainnya -->

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
