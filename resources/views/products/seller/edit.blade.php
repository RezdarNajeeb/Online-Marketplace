@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8 transition-colors duration-300">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg transition-all duration-300">
                <!-- Current Image Preview -->
                <div class="relative h-48 bg-gray-100 dark:bg-gray-700 rounded-t-2xl overflow-hidden">
                    <img src="{{ asset('products/' . $product->image) }}"
                         alt="{{ $product->name }}"
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    <h1 class="absolute bottom-4 left-6 text-2xl font-bold text-white">Edit Product</h1>
                </div>

                <div class="p-6">
                    <form method="POST"
                          action="{{ route('seller.products.update', $product->id) }}"
                          enctype="multipart/form-data"
                          class="space-y-6">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="seller_id" value="{{ $product->seller_id }}">

                        <!-- Product Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                                Product Name
                            </label>
                            <input type="text"
                                   name="name"
                                   value="{{ $product->name }}"
                                   required
                                   class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200"
                                   placeholder="Enter product name">
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                                Description
                            </label>
                            <textarea name="description"
                                      required
                                      rows="4"
                                      class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200 resize-none"
                                      placeholder="Describe your product">{{ $product->description }}</textarea>
                        </div>

                        <!-- Price and Stock -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                                    Price ($)
                                </label>
                                <input type="number"
                                       step="0.01"
                                       name="price"
                                       value="{{ $product->price }}"
                                       required
                                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200"
                                       placeholder="0.00">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                                    Stock
                                </label>
                                <input type="number"
                                       name="stock"
                                       value="{{ $product->stock }}"
                                       required
                                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200"
                                       placeholder="0">
                            </div>
                        </div>

                        <!-- Image Upload -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                                Product Image
                            </label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-lg hover:border-indigo-500 dark:hover:border-indigo-400 transition-colors duration-200">
                                <div class="space-y-1 text-center">
                                    <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 dark:text-gray-500 mb-3"></i>
                                    <div class="text-sm text-gray-600 dark:text-gray-400">
                                        <label for="image" class="relative cursor-pointer rounded-md font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-500">
                                            <span>Upload a new image</span>
                                            <input id="image" name="image" type="file" class="sr-only">
                                        </label>
                                    </div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        PNG, JPG, GIF up to 10MB
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex space-x-4 pt-4">
                            <button type="submit"
                                    class="flex-1 bg-indigo-600 dark:bg-indigo-500 text-white py-3 rounded-lg hover:bg-indigo-700 dark:hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200 flex items-center justify-center">
                                <i class="fas fa-save mr-2"></i>
                                Save Changes
                            </button>
                            <a href="{{ route('seller.products.show', $product->id) }}"
                               class="flex-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 py-3 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200 flex items-center justify-center">
                                <i class="fas fa-times mr-2"></i>
                                Cancel
                            </a>
                        </div>

                        @if ($errors->any())
                            <div class="mt-4 p-4 rounded-lg bg-red-50 dark:bg-red-900/50">
                                <ul class="list-disc list-inside text-sm text-red-600 dark:text-red-400">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
