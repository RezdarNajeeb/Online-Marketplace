@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 py-12 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-4">
                    <li>
                        <a href="{{ route('products.index') }}" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 dark:text-gray-600"></i>
                        <a href="{{ route('products.index') }}" class="ml-4 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">Products</a>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 dark:text-gray-600"></i>
                        <span class="ml-4 text-gray-700 dark:text-gray-200">{{ $product->name }}</span>
                    </li>
                </ol>
            </nav>

            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Image Section -->
                    <div class="relative h-96 lg:h-full min-h-[400px] overflow-hidden">
                        <img
                            src="{{ $product->image ? asset('products/' . $product->image) : asset('no-image.png') }}"
                            alt="{{ $product->name }}"
                            class="w-full h-full object-cover object-center"
                        >
                        @if($product->stock <= 0)
                            <div class="absolute inset-0 bg-black/75 backdrop-blur-sm flex items-center justify-center">
                                <span class="text-white text-2xl font-bold">Sold Out</span>
                            </div>
                        @endif
                    </div>

                    <!-- Product Details Section -->
                    <div class="p-8">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-50 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-400 mb-4">
                            {{ $product->category }}
                        </span>

                        <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-4">{{ $product->name }}</h2>

                        <div class="flex items-center mb-6">
                            <div class="flex items-center">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= 4 ? 'text-yellow-400' : 'text-gray-300 dark:text-gray-600' }}"></i>
                                @endfor
                            </div>
                            <span class="ml-2 text-gray-600 dark:text-gray-400">(4.0)</span>
                        </div>

                        <p class="text-gray-600 dark:text-gray-300 text-lg mb-8">{{ $product->description }}</p>

                        <div class="border-t border-gray-200 dark:border-gray-700 pt-6 mb-8">
                            <div class="flex justify-between items-center mb-6">
                                <p class="text-3xl font-bold text-gray-900 dark:text-white">${{ number_format($product->price, 2) }}</p>
                                <p class="text-sm {{ $product->stock > 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                                    {{ $product->stock > 0 ? "In Stock ({$product->stock})" : 'Out of Stock' }}
                                </p>
                            </div>

                            <div class="flex gap-4">
                                <button
                                    class="flex-1 inline-flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                                    {{ $product->stock <= 0 ? 'disabled' : '' }}
                                >
                                    <i class="fas fa-shopping-cart mr-2"></i>
                                    Add to Cart
                                </button>
                                <button class="p-3 rounded-lg border-2 border-gray-300 dark:border-gray-600 text-gray-600 dark:text-gray-400 hover:border-indigo-500 hover:text-indigo-500 dark:hover:border-indigo-400 dark:hover:text-indigo-400 transition-colors duration-200">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Additional Product Information -->
                        <div class="space-y-4">
                            <div class="flex items-center text-gray-600 dark:text-gray-400">
                                <i class="fas fa-truck mr-2"></i>
                                <span>Free shipping on orders over $100</span>
                            </div>
                            <div class="flex items-center text-gray-600 dark:text-gray-400">
                                <i class="fas fa-undo mr-2"></i>
                                <span>30-day return policy</span>
                            </div>
                            <div class="flex items-center text-gray-600 dark:text-gray-400">
                                <i class="fas fa-shield-alt mr-2"></i>
                                <span>Secure payment</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
