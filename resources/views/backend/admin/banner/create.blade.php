
@extends('layouts.app')

@section('content')
    <h2>Tambah Banner</h2>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('banner-store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Judul:</label>
            <input type="text" name="title" class="form-control" placeholder="Masukkan judul banner" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi:</label>
            <textarea name="description" class="form-control" placeholder="Masukkan deskripsi banner" required></textarea>
        </div>

        <div class="form-group">
            <label for="image_path">Gambar:</label>
            <input type="file" name="image_path" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="category_id">Kategori:</label>
            <select name="category_id" class="form-control" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
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

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('banner-index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
