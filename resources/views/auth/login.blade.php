@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-6">Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <x-input title="Email" name="email" type="email" placeholder="Enter your email" options="required autofocus" />
            <x-input title="Password" name="password" type="password" placeholder="Enter your password" options="required" />
            <div class="mb-4 flex items-center">
                <input id="remember" type="checkbox" name="remember" class="mr-2">
                <label for="remember" class="text-gray-700">Remember Me</label>
            </div>
            <div class="mb-4">
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">Login</button>
            </div>
            <div class="text-center">
                <a href="#" class="text-blue-500 hover:underline">Forgot Your Password?</a>
            </div>
            <div class="text-center">
                <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Don't have an account? Register</a>
            </div>
        </form>
    </div>
</div>
@endsection
