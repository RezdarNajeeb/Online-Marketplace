@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
    <div class="flex justify-center items-center min-h-[calc(100vh-4rem)] py-8">
        <div class="w-full max-w-md">
            <x-card>
                <x-slot:header>
                    <div class="text-center">
                        <div
                            class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-indigo-100 dark:bg-indigo-900 mb-4">
                            <i class="fas fa-key text-2xl text-indigo-600 dark:text-indigo-400"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Reset Password</h2>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">Enter your email to receive a reset link</p>
                    </div>
                </x-slot:header>

                <x-form method="POST" action="{{ route('password.email') }}">
                    <div class="space-y-2.5">
                        <x-input
                            label="Email"
                            name="email"
                            type="email"
                            placeholder="name@example.com"
                            required
                        />

                        <x-button
                            type="submit"
                            variant="primary"
                            class="w-full"
                            size="lg"
                        >
                            Send Reset Link
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
