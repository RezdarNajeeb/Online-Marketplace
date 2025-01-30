@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-card>
                <x-slot name="header">
                    <div class="flex flex-col sm:flex-row justify-between items-center">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4 sm:mb-0">My Products</h2>
                        <a
                            class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-500 rounded-lg shadow-sm sm:ml-4"
                            href="{{ route('seller.products.create') }}"
                        >
                            Add New Product
                        </a>
                    </div>
                </x-slot>

                <x-table>
                    <x-slot name="head">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Image</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Price</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Stock</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                        </tr>
                    </x-slot>

                    <x-slot name="body">
                        @forelse ($products as $product)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-16 w-16 flex-shrink-0">
                                            <img src="{{ asset('products/' . $product->image) }}"
                                                 alt="{{ $product->name }}"
                                                 class="h-16 w-16 rounded-lg object-cover">
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $product->name }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 dark:text-white">${{ number_format($product->price, 2) }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <x-badge
                                        :type="$product->stock > 0 ? 'success' : 'danger'"
                                        size="sm"
                                    >
                                        {{ $product->stock }}
                                    </x-badge>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium">
                                    <div class="flex space-x-3">
                                        <x-link
                                            href="{{ route('seller.products.show', $product->id) }}"
                                            variant="primary"
                                            icon="eye"
                                            icon-position="left"
                                            size="sm"
                                        />
                                        <x-link
                                            href="{{ route('seller.products.edit', $product->id) }}"
                                            variant="warning"
                                            icon="edit"
                                            icon-position="left"
                                            size="sm"
                                        />
                                        <x-link
                                            variant="danger"
                                            icon="trash-alt"
                                            icon-position="left"
                                            size="sm"
                                            @click.prevent="deleteProduct('{{ $product->id }}', '{{ $product->name }}')"
                                        />
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                    <div class="flex flex-col items-center justify-center space-y-2">
                                        <i class="fas fa-box-open text-4xl"></i>
                                        <p>No products found.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </x-slot>
                </x-table>

                <div class="mt-6">
                    {{ $products->links() }}
                </div>
            </x-card>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <x-modal id="deleteProductModal" title="Delete Product" show="false">
        <div x-data="deleteModal">
            <p class="text-sm text-gray-700 dark:text-gray-200 mb-4">
                Are you sure you want to delete <span x-text="productName" class="font-semibold"></span>?
                This action cannot be undone.
            </p>

            <x-slot name="footer">
                <div class="flex justify-end space-x-3">
                    <x-button
                        variant="secondary"
                        @click="show = false"
                    >
                        Cancel
                    </x-button>
                    <x-button
                        variant="danger"
                        @click="confirmDelete"
                        x-bind:loading="loading"
                    >
                        Delete
                    </x-button>
                </div>
            </x-slot>
        </div>
    </x-modal>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('deleteModal', () => ({
                productId: null,
                productName: '',
                loading: false,

                async confirmDelete() {
                    this.loading = true;

                    try {
                        const response = await fetch(`/seller/products/${this.productId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Accept': 'application/json'
                            }
                        });

                        if (response.ok) {
                            window.location.reload();
                        } else {
                            throw new Error('Failed to delete product');
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        // Show error notification to the user
                    } finally {
                        this.loading = false;
                        // Close the modal by updating the parent modal's show state
                        const modal = Alpine.$data(document.querySelector('#deleteProductModal'));
                        modal.show = false;
                    }
                }
            }));
        });

        function deleteProduct(id, name) {
            // Set the product details in the deleteModal component
            const deleteModalContent = document.querySelector('#deleteProductModal [x-data="deleteModal"]');
            if (deleteModalContent) {
                const deleteModalData = Alpine.$data(deleteModalContent);
                deleteModalData.productId = id;
                deleteModalData.productName = name;
            }

            // Open the modal by updating its show state
            const modalElement = document.querySelector('#deleteProductModal');
            if (modalElement) {
                const modalData = Alpine.$data(modalElement);
                modalData.show = true;
            }
        }
    </script>
@endsection
