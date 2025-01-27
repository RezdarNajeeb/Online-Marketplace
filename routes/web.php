<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'h';
});

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Forgot password routes
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::post('/forgot-password', function () {
    return 'forgot-password';
})->name('password.email');

Route::get('/reset-password', function () {
    return view('auth.reset-password');
})->name('password.reset');

Route::post('/reset-password', function () {
    return 'reset-password';
})->name('password.update');

// Email verification routes
Route::get('/email/verify/{id}/{hash}', function () {
    return 'verify-email';
})->name('verification.verify');

Route::get('/email/resend', function () {
    return 'resend-email';
})->name('verification.resend');

