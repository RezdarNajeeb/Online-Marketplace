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

    <!-- Meta Tags -->
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
<div id="loading" class="fixed inset-0 bg-white/90 dark:bg-gray-900/90 z-50 flex flex-col items-center justify-center gap-4 transition-opacity duration-300">
    <x-spinner
        size="xl"
        color="indigo"
        class="animate-pulse"
    />
    <p class="text-gray-600 dark:text-gray-400 text-sm font-medium">Loading your experience...</p>
</div>

<div class="min-h-screen flex flex-col relative">
    <!-- Navigation -->
    @include('partials.navbar')

    <!-- Flash Messages -->
    @if (session('status'))
        <x-alert
            type="success"
            :dismissible="true"
            :duration="5000"
        >
            {{ session('status') }}
        </x-alert>
    @endif

    @if ($errors->any())
        <x-alert
            type="error"
            :dismissible="true"
        >
            <ul class="list-disc pl-4 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alert>
    @endif

    <!-- Page Content -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Scroll to Top Button -->
    <x-button
        variant="secondary"
        size="sm"
        icon="chevron-up"
        icon-position="right"
        class="fixed bottom-8 right-8 backdrop-blur-sm transition-opacity duration-300 z-50"
        x-data="{ showButton: false }"
        x-init="window.addEventListener('scroll', () => {
        showButton = window.scrollY > 200;
    })"
        x-show="showButton"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
        aria-label="Scroll to top"
        style="display: none;"
    >
        Top
    </x-button>
</div>

<!-- Footer -->
@include('partials.footer')

<!-- Scripts -->
@vite('resources/js/app.js')

<!-- Alpine.js -->
<script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<!-- Custom Scripts -->
<script>
    window.addEventListener('load', () => {
        const loading = document.getElementById('loading');
        if (loading) {
            loading.classList.add('opacity-0', 'pointer-events-none');
        }
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

<!-- Scroll Progress Indicator -->
<div class="fixed top-0 left-0 h-1 bg-indigo-600/50 z-50"
     x-data="{ width: '0%' }"
     x-init="window.onscroll = () => {
         width = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100 + '%'
     }"
     :style="`width: ${width}`"
     aria-hidden="true">
</div>
</body>
</html>
