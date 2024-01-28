@extends('layouts.app')

@section('content')
    <h2>Edit Kategori</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('kategori-banner-update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Kategori</button>
    </form>
@endsection
