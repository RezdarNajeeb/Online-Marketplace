@extends('layouts.app')

@section('title', 'Set New Password')

@section('content')
    <div class="flex justify-center items-center min-h-[calc(100vh-4rem)] py-8">
        <div class="w-full max-w-md">
            <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg backdrop-blur-sm border border-gray-100 dark:border-gray-700 transition-all duration-300">
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-indigo-100 dark:bg-indigo-900 mb-4">
                        <i class="fas fa-lock text-2xl text-indigo-600 dark:text-indigo-400"></i>
                    </div>
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Set New Password</h2>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">Choose a strong password for your account</p>
                        </div>

                        <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="space-y-4">
                                <x-input
                                    title="Email"
                                    name="email"
                                    type="email"
                                    placeholder="name@example.com"
                                    options="required"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 transition-all duration-300"
                                />

                                <x-input
                                    title="New Password"
                                    name="password"
                                    type="password"
                                    placeholder="••••••••"
                                    options="required"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 transition-all duration-300"
                                />

                                <x-input
                                    title="Confirm New Password"
                                    name="password_confirmation"
                                    type="password"
                                    placeholder="••••••••"
                                    options="required"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 transition-all duration-300"
                                />
                            </div>

                            <div class="p-4 rounded-lg bg-yellow-50 dark:bg-yellow-900/30">
                                <p class="text-sm text-yellow-700 dark:text-yellow-300">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    Password must be at least 8 characters and include a mix of letters, numbers, and symbols.
                                </p>
                            </div>

                            <button type="submit" class="w-full px-4 py-3 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition-all duration-300">
                                Reset Password
                            </button>
                        </form>

                        <div class="mt-6 text-center">
                            <a href="{{ route('login') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                                <i class="fas fa-arrow-left mr-2"></i>Back to Login
                            </a>
                        </div>
                    </div>
        </div>
    </div>
@endsection
