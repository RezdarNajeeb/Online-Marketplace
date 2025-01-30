@extends('layouts.app')

@section('title', 'Verify Email')

@section('content')
<div class="flex justify-center items-center min-h-[calc(100vh-4rem)] py-8">
   <div class="w-full max-w-md">
       <x-card>
           <x-slot:header>
               <div class="text-center mb-8">
                   <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-indigo-100 dark:bg-indigo-900 mb-4">
                       <i class="fas fa-envelope text-2xl text-indigo-600 dark:text-indigo-400"></i>
                   </div>
                   <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Verify Your Email</h2>
                   <p class="mt-2 text-gray-600 dark:text-gray-400">Check your inbox for the verification link</p>
               </div>
           </x-slot:header>

           <div class="p-4 rounded-lg bg-blue-50 dark:bg-blue-900/30 mb-6">
               <p class="text-sm text-blue-700 dark:text-blue-300 text-center">
                   A verification link has been sent to your email address.
               </p>
           </div>

           <x-form method="POST" action="{{ route('verification.resend') }}">
               <x-button
                   type="submit"
                   variant="primary"
                   class="w-full"
                   size="lg"
               >
                   Resend Verification Email
               </x-button>
           </x-form>
       </x-card>
   </div>
</div>
@endsection
