@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="flex justify-center items-center min-h-[calc(100vh-4rem)] py-8">
        <div class="w-full max-w-md">
            <x-card>
                <x-slot:header>
                    <div class="text-center w-full">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Create Account</h2>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">Join our marketplace today</p>
                    </div>
                </x-slot:header>

                <x-form method="POST" action="{{ route('register') }}" :prevent-multiple-submit="true">
                    <div class="space-y-4">
                        <x-input
                            label="Full Name"
                            type="text"
                            name="name"
                            :value="old('name')"
                            required
                            autofocus
                            icon="user"
                            placeholder="John Doe"
                        />

                        <x-input
                            label="Email Address"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            icon="envelope"
                            placeholder="name@example.com"
                        />

                        <x-input
                            label="Password"
                            type="password"
                            name="password"
                            required
                            icon="lock"
                            placeholder="••••••••"
                        />

                        <x-input
                            label="Confirm Password"
                            type="password"
                            name="password_confirmation"
                            required
                            icon="lock"
                            placeholder="••••••••"
                        />

                        <div class="p-4 rounded-lg border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                                Account Type
                            </label>
                            <div class="flex space-x-6">
                                <label class="flex items-center space-x-2 cursor-pointer">
                                    <input type="radio"
                                           name="role"
                                           value="buyer"
                                           @checked(old('role') === 'buyer')
                                           required
                                           class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Buyer</span>
                                </label>
                                <label class="flex items-center space-x-2 cursor-pointer">
                                    <input type="radio"
                                           name="role"
                                           value="seller"
                                             @checked(old('role') === 'seller')
                                           required
                                           class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Seller</span>
                                </label>
                            </div>
                        </div>

                        <x-button
                            type="submit"
                            variant="primary"
                            class="w-full"
                            size="lg"
                        >
                            <span x-show="!loading">Create Account</span>
                            <template x-if="loading">
                                <div class="flex items-center justify-center">
                                    <x-spinner size="sm" class="mr-2" />
                                    <span>Creating account...</span>
                                </div>
                            </template>
                        </x-button>
                    </div>
                </x-form>

                <x-slot:footer>
                    <p class="text-center text-sm text-gray-600 dark:text-gray-400">
                        Already have an account?
                        <a href="{{ route('login') }}"
                           class="font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                            Sign in
                        </a>
                    </p>
                </x-slot:footer>
            </x-card>
        </div>
    </div>
@endsection
