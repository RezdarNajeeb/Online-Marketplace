@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center mb-6">Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <x-input title="Name" name="name" type="text" placeholder="Enter your name" options="required autofocus" />
            <x-input title="Email" name="email" type="email" placeholder="Enter your email" options="required" />
            <x-input title="Password" name="password" type="password" placeholder="Enter your password" options="required" />
            <x-input title="Confirm Password" name="password_confirmation" type="password" placeholder="Enter your confirm password" options="required" />
            <div class="mb-4 flex items-center space-x-4">
                <label for="role" class="text-gray-700">Role:</label>
                <div class="flex items-center">
                    <input type="radio" name="role" id="buyer" value="buyer" class="mr-1" required>
                    <label for="buyer" class="text-gray-700">Buyer</label>
                    <input type="radio" name="role" id="seller" value="seller" class="ml-4" required>
                    <label for="seller" class="text-gray-700 ml-1">Seller</label>
                </div>
            </div>
            <div class="mb-4">
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">Register</button>
            </div>
            <div class="text-center">
                <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Already have an account? Login</a>
            </div>
        </form>
    </div>
</div>
@endsection
