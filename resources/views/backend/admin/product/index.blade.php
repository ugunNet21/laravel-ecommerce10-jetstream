<!-- resources/views/backend/admin/product/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Daftar Produk</h2>

    <a href="{{ route('product-create') }}" class="btn btn-success">Tambah Produk</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->categoryProduct->name }}</td>
                    <td>{{ $product->selling_price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('product-edit', ['id' => $product->id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('product-delete', ['id' => $product->id]) }}" method="post" style="display:inline;">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
