@section('title', 'Edit Product')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="/category/{{ $category->id }}" method="POST">
                            @method("PUT")
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control @error('category_name') is-invalid @enderror"
                                    name="category_name" maxlength="255" value="{{ $category->name }}">
                                <div class="form-text">Nama Kategori tidak boleh lebih dari 255 karakter</div>
                                @error('category_name')
                                    <div class="invalid-feedback">
                                        Nama Kategori tidak boleh kosong
                                    </div>
                                @enderror
                            </div>
                            <button class="btn btn-primary mt-2">Save</button> <br>
                            <a href="{{ url('category') }}">
                                <button class="btn btn-danger mt-2">Cancel</button>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
