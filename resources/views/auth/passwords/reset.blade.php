@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-6">Reset Password</h2>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <x-input title="Email" name="email" type="email" placeholder="Enter your email" options="required" />
            <x-input title="Password" name="password" type="password" placeholder="Enter your password" options="required" />
            <x-input title="Confirm Password" name="password_confirmation" type="password" placeholder="Enter your confirm password" options="required" />
            <div class="mb-4">
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">Reset Password</button>
            </div>
        </form>
    </div>
</div>
@endsection
