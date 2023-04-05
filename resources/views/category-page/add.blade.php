@extends('layouts.app')

@section('title', 'Add Category')

@section('content')
    <form action="{{ url('category') }}" method='POST'>
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Kategori</label>
            <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" maxlength="255">
            <div class="form-text">Nama Kategori tidak boleh lebih dari 255 karakter</div>
            @error('category_name')
                <div class="invalid-feedback">
                    Nama Kategori tidak boleh kosong
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-2">Add</button> <br>
        <a href="{{ url('category') }}">
            <button class="btn btn-danger mt-2" type="button">Cancel</button>
        </a>
    </form>
@endsection
