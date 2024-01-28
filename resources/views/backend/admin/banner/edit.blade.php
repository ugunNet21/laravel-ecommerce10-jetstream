@extends('layouts.app')

@section('content')
    <h2>Edit Banner</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('banner-update', $banner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" required value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description" class="form-control" required>{{ $banner->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="image_path">Image:</label>
            <input type="file" name="image_path" id="image_path" class="form-control">
            @if ($banner->image_path)
                <img src="{{ asset('uploads/images/banner/' . $banner->image_path) }}" alt="Banner Image"
                    style="max-width: 100px; margin-top: 10px;">
            @endif
        </div>

        <div class="form-group">
            <label for="category_id">Category:</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $banner->category_id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control">
                <option value="1" {{ old('status', $banner->status) == 1 ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ old('status', $banner->status) == 0 ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Banner</button>
    </form>
@endsection
