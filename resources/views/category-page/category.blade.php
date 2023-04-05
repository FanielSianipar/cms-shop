@section('title', 'Category')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                    <br>
                    <a href="{{ url('category/addCategory') }}">
                        <button class="btn btn-danger mb-4" type="button">+ Add Category</button>
                    </a>
                    @foreach ($categories as $item)
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3>Category: {{ $item->name }}</h3>
                                </div>
                                <a href="product/{{ $item->id }}/edit">
                                    <button class="btn btn-warning mt-2" type="button">Edit</button>
                                </a>
                                <a href="product/{{ $item->id }}/delete">
                                    <button class="btn btn-danger mt-2" type="button">Delete</button>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
