@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
    <div class="flex justify-center items-center min-h-[calc(100vh-4rem)] py-8">
        <div class="w-full max-w-md">
            <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg backdrop-blur-sm border border-gray-100 dark:border-gray-700 transition-all duration-300">
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-indigo-100 dark:bg-indigo-900 mb-4">
                        <i class="fas fa-key text-2xl text-indigo-600 dark:text-indigo-400"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Reset Password</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Enter your email to receive a reset link</p>
                </div>

                <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                    @csrf
                    <x-input
                        title="Email"
                        name="email"
                        type="email"
                        placeholder="name@example.com"
                        options="required"
                    />

                    <button type="submit" class="w-full px-4 py-3 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition-all duration-300">
                        Send Reset Link
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
