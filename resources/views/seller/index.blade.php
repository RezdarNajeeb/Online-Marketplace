@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-7xl bg-white p-8 rounded-lg shadow-md">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-center mb-4">My Products</h2>
            <div class="flex justify-end">
                <a href="{{ route('seller.products.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">
                    Add New Product
                </a>
            </div>
        </div>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Image</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Price</th>
                    <th class="py-2 px-4 border-b">Stock</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td class="py-2 px-4 border-b text-center">
                            <div class="flex justify-center">
                                <img src="{{ asset('products/' . $product->image) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded">
                            </div>
                        </td>
                        <td class="py-2 px-4 border-b text-center">{{ $product->name }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $product->price }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $product->stock }}</td>
                        <td class="py-2 px-4 border-b text-center space-x-2">
                            <a href="{{ route('seller.products.show', $product->id) }}" class="text-gray-500 hover:text-gray-700">Show</a>
                            <a href="{{ route('seller.products.edit', $product->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                            <form action="{{ route('seller.products.destroy', $product->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="confirm('Are you sure?')" class="text-red-500 hover:text-red-700 ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="py-2 px-4 border-b text-center" colspan="6">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
