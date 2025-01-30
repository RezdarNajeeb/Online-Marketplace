@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="flex justify-center items-center min-h-[calc(100vh-4rem)] py-8">
        <div class="w-full max-w-md">
            <x-card>
                <x-slot:header>
                    <div class="text-center w-full">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Welcome Back</h2>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">Please sign in to your account</p>
                    </div>
                </x-slot:header>

                <x-form method="POST" action="{{ route('login') }}" :prevent-multiple-submit="true">
                    <div class="space-y-4">
                        <x-input
                            label="Email Address"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
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

                        <div class="flex items-center justify-between">
                            <label class="flex items-center space-x-2">
                                <input type="checkbox"
                                       name="remember"
                                       class="w-4 h-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700">
                                <span class="text-sm text-gray-600 dark:text-gray-400">Remember me</span>
                            </label>

                            <a href="{{ route('password.request') }}"
                               class="text-sm text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                                Forgot password?
                            </a>
                        </div>

                        <x-button
                            type="submit"
                            variant="primary"
                            class="w-full"
                            size="lg"
                        >
                            <span x-show="!loading">Sign in</span>
                            <template x-if="loading">
                                <div class="flex items-center justify-center">
                                    <x-spinner size="sm" class="mr-2" />
                                    <span>Signing in...</span>
                                </div>
                            </template>
                        </x-button>
                    </div>
                </x-form>

                <x-slot:footer>
                    <p class="text-center text-sm text-gray-600 dark:text-gray-400">
                        Don't have an account?
                        <a href="{{ route('register') }}"
                           class="font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                            Sign Up
                        </a>
                    </p>
                </x-slot:footer>
            </x-card>
        </div>
    </div>
@endsection
