<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth dark" x-data="{ darkMode: $persist(false) }" :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('icon.png') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Styles -->
    @vite('resources/css/app.css')

    <!-- Meta Tags for SEO and Social Sharing -->
    <meta name="description" content="An online market place">
    <meta name="keywords" content="laravel, ecommerce, products, online market">
    <meta name="author" content="Rezdar">
    <meta property="og:title" content="{{ config('app.name', 'Laravel') }}">
    <meta property="og:description" content="An online market place">
    <meta property="og:image" content="{{ asset('social-share.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
</head>
<body class="font-sans antialiased bg-gradient-to-br from-gray-50 to-white dark:from-gray-900 dark:to-gray-800">
<!-- Loading Indicator -->
<div id="loading" class="fixed inset-0 bg-white/90 dark:bg-gray-900/90 z-50 flex items-center justify-center transition-opacity duration-300">
    <div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-indigo-600"></div>
</div>

<div class="min-h-screen flex flex-col">
    <!-- Navigation -->
    @include('partials.navbar')

    <!-- Flash Messages -->
    @if (session('status'))
        <div class="fixed top-4 right-4 z-50">
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-lg shadow-lg flex items-center animate-slide-in">
                <i class="fas fa-check-circle mr-2"></i>
                <span>{{ session('status') }}</span>
            </div>
        </div>
    @endif

    <!-- Page Content -->
    <main class="flex-1">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            @yield('content')
        </div>
    </main>

    <!-- Scroll to Top Button -->
    <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
            class="fixed bottom-8 right-8 p-3 bg-white/90 backdrop-blur-sm border border-gray-200 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 dark:bg-gray-800/90 dark:border-gray-700 group">
        <i class="fas fa-chevron-up text-gray-800 dark:text-gray-200 group-hover:text-indigo-600"></i>
    </button>
</div>

<!-- Footer -->
@include('partials.footer')

<!-- Scripts -->
@vite('resources/js/app.js')

<!-- Alpine.js -->
<script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<!-- Custom Scripts -->
<script>
    // Hide loading indicator when page is fully loaded
    window.addEventListener('load', () => {
        document.getElementById('loading').classList.add('opacity-0', 'pointer-events-none');
    });

    // Persistent dark mode with Alpine.js
    document.addEventListener('alpine:init', () => {
        Alpine.store('darkMode', {
            on: localStorage.getItem('darkMode') === 'true',
            toggle() {
                this.on = !this.on;
                localStorage.setItem('darkMode', this.on);
                document.documentElement.classList.toggle('dark', this.on);
            }
        });
    });
</script>
</body>
</html>
