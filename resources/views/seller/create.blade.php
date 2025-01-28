@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-6">Create New Product</h2>
        <form method="POST" action="{{ route('seller.products.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="seller_id" value="{{ auth()->id() }}">
            <x-input type="text" name="name" title="Product Name" required />
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description:</label>
                <textarea id="description" name="description" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"></textarea>
            </div>
            <x-input type="number" step="0.01" name="price" title="Price" required />
            <x-input type="number" name="stock" title="Stock" required />
            <x-input type="file" name="image" title="Product Image" />
            <div class="mb-4">
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">Create Product</button>
            </div>
        </form>
    </div>

    @foreach($errors->all() as $error)
        <div class="w-full max-w-md bg-red-100 p-4 rounded-lg shadow-md">
            <p class="text-red-700">{{ $error }}</p>
        </div>

    @endforeach
</div>
@endsection
