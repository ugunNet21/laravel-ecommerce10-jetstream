@extends('layouts.app')

@section('content')
    <h2>Detail Banner</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div>
        <strong>Title:</strong> {{ $banner->title }}<br>
        <strong>Description:</strong> {{ $banner->description }}<br>
        <strong>Category:</strong> {{ $banner->category->name }}<br>
        <strong>Status:</strong> {{ $banner->status ? 'Aktif' : 'Tidak Aktif' }}<br>
        @if ($banner->image_path)
            <strong>Image:</strong> <br>
            <img src="{{ asset('uploads/images/banner/' . $banner->image_path) }}" alt="Banner Image"
                style="max-width: 300px; margin-top: 10px;">
        @endif
    </div>

    <a href="{{ route('banner-index') }}" class="btn btn-secondary mt-2">Back to List</a>
@endsection
