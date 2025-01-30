@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8 transition-colors duration-300">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-card>
                <div class="relative h-48 -mt-6 -mx-6 rounded-t-lg bg-gray-100 dark:bg-gray-700 overflow-hidden">
                    <img src="{{ asset('products/' . $product->image) }}"
                         alt="{{ $product->name }}"
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    <h1 class="absolute bottom-4 left-6 text-2xl font-bold text-white">Edit Product</h1>
                </div>

                <x-form
                        action="{{ route('seller.products.update', $product->id) }}"
                        method="PUT"
                        has-files
                        class="space-y-6"
                >
                    <input type="hidden" name="seller_id" value="{{ $product->seller_id }}">

                    <x-input
                            name="name"
                            label="Product Name"
                            :value="$product->name"
                            required
                    />

                    <x-input
                            type="textarea"
                            name="description"
                            label="Description"
                            :value="$product->description"
                            required
                            rows="4"
                    />

                    <div class="grid grid-cols-2 gap-4">
                        <x-input
                                type="number"
                                name="price"
                                label="Price ($)"
                                :value="$product->price"
                                required
                                step="0.01"
                        />

                        <x-input
                                type="number"
                                name="stock"
                                label="Stock"
                                :value="$product->stock"
                                required
                        />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Product Image</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-lg hover:border-indigo-500 dark:hover:border-indigo-400 transition-colors duration-200">
                            <div class="space-y-1 text-center">
                                <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 dark:text-gray-500 mb-3"></i>
                                <div class="text-sm text-gray-600 dark:text-gray-400">
                                    <label for="image" class="relative cursor-pointer rounded-md font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-500">
                                        <span>Upload a new image</span>
                                        <input id="image" name="image" type="file" class="sr-only">
                                    </label>
                                </div>
                                <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, GIF up to 10MB</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex space-x-4 pt-4">
                        <x-button
                                type="submit"
                                variant="primary"
                                icon="save"
                                class="flex-1"
                        >
                            Save Changes
                        </x-button>

                        <x-button
                                href="{{ route('seller.products.show', $product->id) }}"
                                variant="secondary"
                                icon="times"
                                class="flex-1"
                        >
                            Cancel
                        </x-button>
                    </div>

                    @if ($errors->any())
                        <x-alert type="error" icon>
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </x-alert>
                    @endif
                </x-form>
            </x-card>
        </div>
    </div>
@endsection
