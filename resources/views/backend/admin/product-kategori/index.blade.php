<!-- resources/views/backend/admin/product-kategori/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Daftar Kategori Produk</h2>

    <a href="{{ route('product-kategori-create') }}" class="btn btn-success">Tambah Kategori Produk</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Images</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->status }}</td>
                    <td>
                        @if($category->images)
                            {{-- <img src="{{ asset('uploads/images/product-category/' . $category->images) }}" alt="Category Image"
                                style="max-width: 100px;"> --}}
                                <img src="{{ asset($category->image_path) }}" alt="Category Image">

                        @else
                            No Image
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('product-kategori-edit', ['id' => $category->id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('product-kategori-delete', ['id' => $category->id]) }}" method="post" style="display:inline;">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori produk ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
