@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8 transition-colors duration-300">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden transition-all duration-300">
                <!-- Product Header -->
                <div class="relative h-64 sm:h-96">
                    <img src="{{ asset('products/' . $product->image) }}"
                         alt="{{ $product->name }}"
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    <h1 class="absolute bottom-6 left-6 text-3xl font-bold text-white">{{ $product->name }}</h1>
                </div>

                <!-- Product Details -->
                <div class="p-6 space-y-6">
                    <!-- Price and Stock Badge -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-baseline">
                            <span class="text-3xl font-bold text-gray-900 dark:text-white">${{ number_format($product->price, 2) }}</span>
                        </div>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $product->stock > 0 ? 'bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-400' : 'bg-red-100 text-red-800 dark:bg-red-900/50 dark:text-red-400' }}">
                        <i class="fas {{ $product->stock > 0 ? 'fa-check-circle' : 'fa-times-circle' }} mr-2"></i>
                        {{ $product->stock > 0 ? $product->stock . ' in stock' : 'Out of stock' }}
                    </span>
                    </div>

                    <!-- Description -->
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">Description</h2>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            {{ $product->description }}
                        </p>
                    </div>

                    <!-- Additional Details -->
                    <div class="grid grid-cols-2 gap-6 py-6 border-t border-b border-gray-200 dark:border-gray-700">
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Product ID</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $product->id }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Last Updated</dt>
                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $product->updated_at->diffForHumans() }}</dd>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex space-x-4">
                        <a href="{{ route('seller.products.edit', $product->id) }}"
                           class="flex-1 inline-flex justify-center items-center px-4 py-3 border border-transparent text-sm font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                            <i class="fas fa-edit mr-2"></i>
                            Edit Product
                        </a>
                        <form action="{{ route('seller.products.destroy', $product->id) }}"
                              method="POST"
                              class="flex-1"
                              onsubmit="return confirm('Are you sure you want to delete this product? This action cannot be undone.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="w-full inline-flex justify-center items-center px-4 py-3 border border-transparent text-sm font-medium rounded-lg text-white bg-red-600 hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200">
                                <i class="fas fa-trash-alt mr-2"></i>
                                Delete Product
                            </button>
                        </form>
                    </div>

                    <!-- Back Button -->
                    <a href="{{ route('seller.products.index') }}"
                       class="inline-flex items-center text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 transition-colors duration-200">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to Products
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
