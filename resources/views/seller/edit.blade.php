@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-6">Edit Product</h2>
        <form method="POST" action="{{ route('seller.products.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="seller_id" value="{{ $product->seller_id }}">
            <x-input type="text" name="name" title="Product Name" :value="$product->name" required />
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description:</label>
                <textarea id="description" name="description" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300 size-40 resize-none">{{ $product->description }}</textarea>
            </div>
            <x-input type="number" step="0.01" name="price" title="Price" :value="$product->price" required />
            <x-input type="number" name="stock" title="Stock" :value="$product->stock" required />
            <x-input type="file" name="image" title="Product Image" />
            <div class="mb-4">
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">Update Product</button>
            </div>
        </form>
        @foreach($errors->all() as $error)
            <p class="text-red-500 text-xs italic">{{ $error }}</p>
        @endforeach
    </div>
</div>
@endsection
