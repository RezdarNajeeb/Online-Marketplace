@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-2xl bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-3xl font-bold text-center mb-6">{{ $product->name }}</h2>
        <div class="flex justify-center mb-6">
            <img src="{{ asset('products/' . $product->image) }}" alt="{{ $product->name }}" class="w-64 h-64 object-cover rounded-lg">
        </div>
        <div class="mb-4">
            <h3 class="text-xl font-semibold">Description</h3>
            <p class="text-gray-700">{{ $product->description }}</p>
        </div>
        <div class="mb-4">
            <h3 class="text-xl font-semibold">Price</h3>
            <p class="text-gray-700">${{ $product->price }}</p>
        </div>
        <div class="mb-4">
            <h3 class="text-xl font-semibold">Stock</h3>
            <p class="text-gray-700">{{ $product->stock }}</p>
        </div>
        <div class="flex justify-center space-x-4">
            <a href="{{ route('seller.products.edit', $product->id) }}" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">Edit Product</a>
            <form action="{{ route('seller.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 focus:outline-none focus:ring focus:border-red-300">Delete Product</button>
            </form>
        </div>
    </div>
</div>
@endsection
