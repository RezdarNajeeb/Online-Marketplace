@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <div class="flex justify-center items-center min-h-[calc(100vh-4rem)] py-8">
        <div class="w-full max-w-7xl">
            <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg backdrop-blur-sm border border-gray-100 dark:border-gray-700 transition-all duration-300">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Users</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">List of all registered users</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white dark:bg-gray-800">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-left leading-4 text-gray-600 dark:text-gray-400 tracking-wider">Name</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-left leading-4 text-gray-600 dark:text-gray-400 tracking-wider">Email</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-left leading-4 text-gray-600 dark:text-gray-400 tracking-wider">Role</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-left leading-4 text-gray-600 dark:text-gray-400 tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white">{{ $user->name }}</td>
                                    <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white">{{ $user->email }}</td>
                                    <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white">{{ $user->role }}</td>
                                    <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white">
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">Edit</a>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-500 dark:text-red-400 dark:hover:text-red-300 ml-4">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="px-6 py-4 border-b border-gray-300 dark:border-gray-700 text-gray-900 dark:text-white" colspan="4">No users found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
