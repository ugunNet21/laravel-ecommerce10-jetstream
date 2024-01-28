@extends('layouts.app')

@section('content')
    <h2>Edit Kategori Produk</h2>


    @foreach ($categories as $category)
    <form action="{{ route('product-kategori-update', $category->id) }}" method="post">

        @method('PUT')
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{ $category->slug }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="active" {{ $category->status == 'active' ? 'selected' : '' }}>Aktif</option>
                <option value="inactive" {{ $category->status == 'inactive' ? 'selected' : '' }}>Non-Aktif</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="parent_id" class="form-label">Kategori Induk</label>
            <select class="form-control" id="parent_id" name="parent_id">
                <option value="" selected>Tanpa Kategori Induk</option>
                @foreach ($categories as $parentCategory)
                    <option value="{{ $parentCategory->id }}"
                        {{ $category->parent_id == $parentCategory->id ? 'selected' : '' }}>
                        {{ $parentCategory->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="images" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="images" name="images">
        </div>

        @if ($category->images)
            <div class="mb-3">
                <label for="current_image" class="form-label">Gambar Saat Ini</label>
                <br>
                <img src="{{ asset('uploads/images/product-category/' . $category->images) }}" alt="Category Image"
                    style="max-width: 100px;">
            </div>
        @endif

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>

    @endforeach
@endsection
