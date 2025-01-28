@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-6">Email Verification</h2>
        <div class="alert alert-info text-center text-gray-700">
            Please check your email for the verification link to verify your account.
        </div>
        <div class="mt-4 text-center">
            <form method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">Resend Verification Email</button>
            </form>
        </div>
    </div>
</div>
@endsection
