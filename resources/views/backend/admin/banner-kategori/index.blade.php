<!-- dalam index.blade.php untuk KategoriBanner -->
@extends('layouts.app')

@section('content')
    <h2>Kategori Banners</h2>
    <a href="{{ route('kategori-banner-create') }}" class="btn btn-success mb-2">Tambah Kategori Banner</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{route('kategori-banner-edit', $category->id)}}" class="btn btn-primary btn-sm"> Edit</a>
                        <form action="{{ route('kategori-banner-delete', $category->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
