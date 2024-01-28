<!-- dalam create.blade.php untuk KategoriBanner -->
@extends('layouts.app')

@section('content')
    <h2>Tambah Kategori Banner</h2>

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

    <form action="{{ route('kategori-banner-store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nama Kategori:</label>
            <input type="text" name="name" class="form-control" placeholder="Masukkan nama kategori banner" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kategori-banner-index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
