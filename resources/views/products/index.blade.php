@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 py-12 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 space-y-4">
                <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white sm:text-5xl md:text-6xl bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-purple-600">
                    Our Products
                </h2>
                <p class="max-w-2xl text-xl text-gray-600 dark:text-gray-300 mx-auto">
                    Discover premium quality items curated just for you
                </p>

                <!-- Filter and Search Section -->
                <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <div class="relative">
                        <input
                            type="text"
                            placeholder="Search products..."
                            class="pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white"
                        >
                        <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    </div>
                    <select class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">
                        <option value="">All Categories</option>
                        <!-- Add categories dynamically -->
                    </select>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @forelse ($products as $product)
                    <div class="group">
                        <a href="{{ route('products.show', $product->id) }}"
                           class="block bg-white dark:bg-gray-800 rounded-2xl shadow-lg transform transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl relative overflow-hidden">
                            <!-- Image Container -->
                            <div class="relative h-64 overflow-hidden">
                                <img
                                    src="{{ $product->image ? asset('products/' . $product->image) : asset('no-image.png') }}"
                                    alt="{{ $product->name }}"
                                    class="w-full h-full object-cover object-center transform transition-transform duration-300 group-hover:scale-110"
                                >
                                @if($product->stock <= 0)
                                    <div class="absolute inset-0 bg-black/75 backdrop-blur-sm flex items-center justify-center">
                                        <span class="text-white text-xl font-bold">Sold Out</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Product Details -->
                            <div class="p-6">
                                <div class="flex items-baseline justify-between mb-3">
                                    <h3 class="text-xl font-bold text-gray-900 dark:text-white truncate group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition-colors">
                                        {{ $product->name }}
                                    </h3>
                                    <span class="text-sm font-medium text-indigo-600 dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-900/50 px-3 py-1 rounded-full">
                                        {{ $product->category }}
                                    </span>
                                </div>

                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-2xl font-bold text-gray-900 dark:text-white">
                                            ${{ number_format($product->price, 2) }}
                                        </p>
                                        <p class="text-sm {{ $product->stock > 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                                            {{ $product->stock > 0 ? "In Stock ({$product->stock})" : 'Out of Stock' }}
                                        </p>
                                    </div>
                                    <button class="p-2 rounded-full bg-indigo-50 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-400 hover:bg-indigo-100 dark:hover:bg-indigo-900 transition-colors">
                                        <i class="fas fa-heart"></i>
                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="inline-block p-8 bg-white dark:bg-gray-800 rounded-2xl shadow-lg">
                            <i class="fas fa-box-open text-4xl text-gray-400 dark:text-gray-500 mb-4"></i>
                            <h3 class="mt-4 text-xl font-medium text-gray-900 dark:text-white">No products found</h3>
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Check back later for new arrivals!</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $products->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
@endsection
