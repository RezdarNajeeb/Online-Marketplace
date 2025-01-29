@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="flex justify-center items-center min-h-[calc(100vh-4rem)] py-8">
        <div class="w-full max-w-md">
            <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg backdrop-blur-sm border border-gray-100 dark:border-gray-700 transition-all duration-300">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Welcome Back</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Please sign in to your account</p>
                </div>

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf
                    <div class="space-y-4">
                        <x-input
                            title="Email"
                            name="email"
                            type="email"
                            placeholder="name@example.com"
                            options="required autofocus"
                        />

                        <x-input
                            title="Password"
                            name="password"
                            type="password"
                            placeholder="••••••••"
                            options="required"
                        />
                    </div>

                    <div class="flex items-center justify-between">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-900">
                            <span class="text-sm text-gray-600 dark:text-gray-400">Remember me</span>
                        </label>
                        <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                            Forgot password?
                        </a>
                    </div>

                    <button type="submit" class="w-full px-4 py-3 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition-all duration-300">
                        Sign in
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                            Sign Up
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
