@section('title', 'Product')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ url('product/add') }}">
                        <button class="btn btn-primary mb-4">+ Add Product</button>
                    </a>
                    @foreach ($products as $item)
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3>{{ $item->name }} ( Rp{{ $item->price }} )</h3>
                                </div>
                                <div class="card-subtitle">
                                    Category: {{ $item->category->name }} <br>
                                    Stock: {{ $item->stock }}
                                </div>
                                <div class="card-text">
                                    {{ $item->description }}
                                </div>
                                <a href="product/{{ $item->id }}/edit">
                                    <button class="btn btn-warning mt-2">Edit</button>
                                </a>
                                <a href="product/{{ $item->id }}/delete">
                                    <button class="btn btn-danger mt-2">Delete</button>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
