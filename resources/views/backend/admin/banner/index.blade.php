@extends('layouts.app')

@section('content')
    <h2>Banners</h2>
    <a href="{{ route('banner-create') }}" class="btn btn-success mb-2">Tambah Banner</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($banners as $banner)
                <tr>
                    <td>{{ $banner->id }}</td>
                    <td>{{ $banner->title }}</td>
                    <td>{{ $banner->description }}</td>
                    <td>{{ $banner->category->name }}</td>
                    <td><img src="{{ asset('uploads/images/banner/' . $banner->image_path) }}" alt="Banner Image"
                            style="max-width: 100px;"></td>
                    <td>{{ $banner->status ? 'Aktif' : 'Tidak Aktif' }}</td>

                    <td>
                        <a href="{{ route('banner-edit', $banner->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('banner-delete', $banner->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus banner ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
