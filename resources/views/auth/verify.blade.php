@extends('layouts.app')

@section('title', 'Verify Email')

@section('content')
    <div class="flex justify-center items-center min-h-[calc(100vh-4rem)] py-8">
        <div class="w-full max-w-md">
            <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg backdrop-blur-sm border border-gray-100 dark:border-gray-700 transition-all duration-300">
                <div class="text-center mb-8">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-indigo-100 dark:bg-indigo-900 mb-4">
                        <i class="fas fa-envelope text-2xl text-indigo-600 dark:text-indigo-400"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Verify Your Email</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Check your inbox for the verification link</p>
                </div>

                <div class="p-4 rounded-lg bg-blue-50 dark:bg-blue-900/30 mb-6">
                    <p class="text-sm text-blue-700 dark:text-blue-300 text-center">
                        A verification link has been sent to your email address.
                    </p>
                </div>

                <form method="POST" action="{{ route('verification.resend') }}" class="space-y-6">
                    @csrf
                    <button type="submit" class="w-full px-4 py-3 text-sm font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition-all duration-300">
                        Resend Verification Email
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
