@extends('layouts.app')

@section('title', 'Set New Password')

@section('content')
    <div class="flex justify-center items-center min-h-[calc(100vh-4rem)] py-8">
        <div class="w-full max-w-md">
            <x-card>
                <x-slot:header>
                    <div class="text-center">
                        <div
                            class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-indigo-100 dark:bg-indigo-900 mb-4">
                            <i class="fas fa-lock text-2xl text-indigo-600 dark:text-indigo-400"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Set New Password</h2>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">Choose a strong password for your account</p>
                    </div>
                </x-slot:header>

                <x-form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="space-y-4">
                        <x-input
                            label="Email"
                            name="email"
                            type="email"
                            placeholder="name@example.com"
                            required
                        />

                        <x-input
                            label="New Password"
                            name="password"
                            type="password"
                            placeholder="••••••••"
                            required
                        />

                        <x-input
                            label="Confirm New Password"
                            name="password_confirmation"
                            type="password"
                            placeholder="••••••••"
                            required
                        />

                        <div class="p-4 rounded-lg bg-yellow-50 dark:bg-yellow-900/30">
                            <p class="text-sm text-yellow-700 dark:text-yellow-300">
                                <i class="fas fa-info-circle mr-2"></i>
                                Password must be at least 8 characters and include a mix of letters, numbers, and symbols.
                            </p>
                        </div>

                        <x-button type="submit" variant="primary" class="w-full" size="lg">
                            Reset Password
                        </x-button>
                    </div>
                </x-form>

                <x-slot:footer>
                    <a href="{{ route('login') }}"
                       class="text-sm font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Login
                    </a>
                </x-slot:footer>
            </x-card>
        </div>
    </div>
@endsection
