@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="flex justify-center items-center min-h-[calc(100vh-4rem)] py-8">
        <div class="w-full max-w-md">
            <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg backdrop-blur-sm border border-gray-100 dark:border-gray-700 transition-all duration-300">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Create Account</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Join our marketplace today</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf
                    <div class="space-y-4">
                        <x-input
                            title="Full Name"
                            name="name"
                            type="text"
                            placeholder="John Doe"
                            options="required autofocus"
                        />

                        <x-input
                            title="Email"
                            name="email"
                            type="email"
                            placeholder="name@example.com"
                            options="required"
                        />

                        <x-input
                            title="Password"
                            name="password"
                            type="password"
                            placeholder="••••••••"
                            options="required"
                        />

                        <x-input
                            title="Confirm Password"
                            name="password_confirmation"
                            type="password"
                            placeholder="••••••••"
                            options="required"
                        />

                        <div class="p-4 rounded-lg border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">Account Type</label>
                            <div class="flex space-x-6">
                                <label class="flex items-center space-x-2 cursor-pointer">
                                    <input type="radio" name="role" value="buyer" required class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-900">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Buyer</span>
                                </label>
                                <label class="flex items-center space-x-2 cursor-pointer">
                                    <input type="radio" name="role" value="seller" required class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-900">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Seller</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="w-full px-4 py-3 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition-all duration-300">
                        Create Account
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Already have an account?
                        <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                            Sign in
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
