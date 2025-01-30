<!-- Enhanced Navbar with better transitions and mobile responsiveness -->
<nav class="bg-white/80 backdrop-blur-lg dark:bg-gray-800/80 shadow-lg sticky top-0 z-40 transition-colors duration-300" x-data="{ isOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo with enhanced animation -->
                <div class="shrink-0 flex">
                    <a href="{{ url('/') }}" class="flex items-center text-gray-900 dark:text-white group">
                        <i class="fas fa-store mr-2 text-xl text-indigo-600 transition-transform duration-300 group-hover:scale-110"></i>
                        <span class="text-lg font-semibold tracking-tight transition-colors duration-300">{{ config('app.name', 'Laravel') }}</span>
                    </a>
                </div>

                <!-- Main Navigation with hover effects -->
                <div class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-4">
                    <a href="{{ route('products.index') }}"
                       class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 relative group">
                        <i class="fas fa-box-open mr-2 transition-transform duration-300 group-hover:scale-110"></i>
                        Products
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-indigo-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
                    </a>

                    @auth
                        <a href="{{-- route('buyer.orders.index') --}}"
                           class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 relative group">
                            <i class="fas fa-shopping-cart mr-2 transition-transform duration-300 group-hover:scale-110"></i>
                            My Orders
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-indigo-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
                        </a>
                    @endauth

                    @if(auth()->user() && auth()->user()->isAdmin())
                        <a href="{{-- route('admin.dashboard') --}}"
                           class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 relative group">
                            <i class="fas fa-chart-line mr-2 transition-transform duration-300 group-hover:scale-110"></i>
                            Dashboard
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-indigo-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
                        </a>
                        <a href="{{ route('admin.users.index') }}"
                           class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 relative group">
                            <i class="fas fa-users mr-2 transition-transform duration-300 group-hover:scale-110"></i>
                            Users
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-indigo-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
                        </a>
                        <a href="{{-- route('admin.orders.index') --}}"
                           class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 relative group">
                            <i class="fas fa-clipboard-list mr-2 transition-transform duration-300 group-hover:scale-110"></i>
                            All Orders
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-indigo-600 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></span>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Right Navigation with enhanced transitions -->
            <div class="hidden sm:flex sm:items-center sm:space-x-4">
                <!-- Dark Mode Toggle with animation -->
                <button @click="darkMode = !darkMode"
                        class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-300 hover:scale-110">
                    <i class="fas fa-moon text-gray-600 dark:text-gray-300 transition-transform duration-300"
                       x-show="!darkMode"
                       x-transition:enter="transition-transform"
                       x-transition:enter-start="scale-0 rotate-180"
                       x-transition:enter-end="scale-100 rotate-0"></i>
                    <i class="fas fa-sun text-yellow-500 transition-transform duration-300"
                       x-show="darkMode"
                       x-transition:enter="transition-transform"
                       x-transition:enter-start="scale-0 rotate-180"
                       x-transition:enter-end="scale-100 rotate-0"></i>
                </button>

                @auth
                    @if(auth()->user()->isSeller())
                        <a href="{{ route('seller.products.index') }}"
                           class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 group">
                            <i class="fas fa-store mr-2 transition-transform duration-300 group-hover:scale-110"></i>
                            My Store
                        </a>
                        <a href="#"
                           class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400 group">
                            <i class="fas fa-boxes mr-2 transition-transform duration-300 group-hover:scale-110"></i>
                            Store Orders
                        </a>
                    @endif

                    <!-- Profile Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 text-gray-700 hover:text-indigo-600 dark:text-gray-300 dark:hover:text-indigo-400">
                            <x-avatar :src="auth()->user()->avatar_url"
                                      :alt="auth()->user()->name"
                                      size="sm"
                                      :initials="substr(auth()->user()->name, 0, 2)"
                                      status="online"
                                      class="mr-2"/>
                            <span>{{ auth()->user()->name }}</span>
                            <i class="fas fa-chevron-down text-xs" :class="{ 'transform rotate-180': open }"></i>
                        </button>

                        <div x-show="open"
                             @click.away="open = false"
                             class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5">
                            <div class="py-1">
                                <a href="{{-- route('profile.edit') --}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">
                                    <i class="fas fa-user-cog mr-2"></i> Profile Settings
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700">
                                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-indigo-600 bg-transparent border border-indigo-600 rounded-lg hover:bg-indigo-600 hover:text-white dark:text-indigo-400 dark:border-indigo-400 dark:hover:bg-indigo-400 dark:hover:text-gray-900 transition-all duration-300">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Sign In
                    </a>
                    <a href="{{ route('register') }}"
                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 transition-all duration-300">
                        <i class="fas fa-user-plus mr-2"></i>
                        Sign Up
                    </a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="flex items-center sm:hidden">
                <button @click="isOpen = !isOpen"
                        class="p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 dark:text-gray-300 dark:hover:text-white dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 transition-all duration-300">
                    <i class="fas fa-bars text-xl" x-show="!isOpen"></i>
                    <i class="fas fa-times text-xl" x-show="isOpen"></i>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div x-show="isOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform -translate-y-2"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform -translate-y-2"
             class="sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <!-- Common Links -->
                <a href="{{ route('products.index') }}"
                   class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700">
                    <i class="fas fa-box-open mr-2"></i> Products
                </a>

                @auth
                    <!-- Authenticated User Links -->
                    <a href="{{-- route('buyer.orders.index') --}}"
                       class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700">
                        <i class="fas fa-shopping-cart mr-2"></i> My Orders
                    </a>

                    @if(auth()->user()->isSeller())
                        <a href="{{ route('seller.products.index') }}"
                           class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700">
                            <i class="fas fa-store mr-2"></i> My Store
                        </a>
                        <a href="#"
                           class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700">
                            <i class="fas fa-boxes mr-2"></i> Store Orders
                        </a>
                    @endif

                    @if(auth()->user()->isAdmin())
                        <a href="{{-- route('admin.dashboard') --}}"
                           class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700">
                            <i class="fas fa-chart-line mr-2"></i> Dashboard
                        </a>
                        <a href="{{ route('admin.users.index') }}"
                           class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700">
                            <i class="fas fa-users mr-2"></i> Users
                        </a>
                        <a href="{{-- route('admin.orders.index') --}}"
                           class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700">
                            <i class="fas fa-clipboard-list mr-2"></i> All Orders
                        </a>
                    @endif

                    <div class="border-t border-gray-200 dark:border-gray-700"></div>

                    <a href="{{-- route('profile.edit') --}}"
                       class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700">
                        {{-- Replace user icon with --}}
                        <i class="fas fa-user-cog mr-2"></i> Profile Settings
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="block w-full text-left px-3 py-2 text-base font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </button>
                    </form>
                @else
                    <!-- Guest Links -->
                    <div class="pt-4 pb-2 space-y-2 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('login') }}"
                           class="block w-full px-4 py-2 text-center text-sm font-medium text-indigo-600 bg-transparent border border-indigo-600 rounded-lg hover:bg-indigo-600 hover:text-white dark:text-indigo-400 dark:border-indigo-400 dark:hover:bg-indigo-400 dark:hover:text-gray-900 transition-all duration-300">
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Sign In
                        </a>
                        <a href="{{ route('register') }}"
                           class="block w-full px-4 py-2 text-center text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600 transition-all duration-300">
                            <i class="fas fa-user-plus mr-2"></i>
                            Sign Up
                        </a>
                    </div>
                @endauth

                <!-- Dark Mode Toggle in Mobile Menu -->
                <div class="pt-4 pb-3 border-t border-gray-200 dark:border-gray-700">
                    <button @click="darkMode = !darkMode"
                            class="flex items-center w-full px-3 py-2 text-base font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-700">
                        <template x-if="!darkMode">
                            <i class="fas fa-moon mr-2"></i>
                        </template>
                        <template x-if="darkMode">
                            <i class="fas fa-sun mr-2"></i>
                        </template>
                        <span x-text="darkMode ? 'Light Mode' : 'Dark Mode'"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>
