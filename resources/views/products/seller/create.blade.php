@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center min-h-screen bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
        <div class="w-full max-w-xl px-4">
            <x-card>
                <x-slot:header>
                    <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-white">Create New Product</h2>
                </x-slot:header>

                <x-form
                        action="{{ route('seller.products.store') }}"
                        has-files
                >
                    <input type="hidden" name="seller_id" value="{{ auth()->id() }}">

                    <div class="space-y-6">
                        <x-input
                                name="name"
                                label="Product Name"
                                required
                                placeholder="Enter product name"
                        />

                        <x-input
                                type="textarea"
                                name="description"
                                label="Description"
                                required
                                rows="4"
                                placeholder="Describe your product"
                        />

                        <div class="grid grid-cols-2 gap-4">
                            <x-input
                                    type="number"
                                    name="price"
                                    label="Price ($)"
                                    required
                                    step="0.01"
                                    placeholder="0.00"
                            />

                            <x-input
                                    type="number"
                                    name="stock"
                                    label="Stock"
                                    required
                                    placeholder="0"
                            />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Product Image</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-600 border-dashed rounded-lg hover:border-indigo-500 dark:hover:border-indigo-400 transition-colors duration-200">
                                <div class="space-y-1 text-center">
                                    <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 dark:text-gray-500 mb-3"></i>
                                    <div class="text-sm text-gray-600 dark:text-gray-400">
                                        <label for="image" class="relative cursor-pointer rounded-md font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="image" name="image" type="file" class="sr-only" required>
                                        </label>
                                    </div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG, GIF up to 2MB</p>
                                </div>
                            </div>
                        </div>

                        <x-button
                                type="submit"
                                variant="primary"
                                icon="plus-circle"
                                class="w-full"
                        >
                            Create Product
                        </x-button>

                        @if ($errors->any())
                            <x-alert type="error" icon>
                                <ul class="list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </x-alert>
                        @endif
                    </div>
                </x-form>
            </x-card>
        </div>
    </div>
@endsection
