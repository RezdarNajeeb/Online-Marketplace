<div x-data="{ collapsed: false }"
     class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg border border-gray-200 dark:border-gray-700 transition-all duration-300">
    @if($header)
        <div class="px-4 py-5 sm:px-6 border-b border-gray-200 dark:border-gray-700">
            <div class="flex justify-between items-center">
                <div class="flex-1">
                    {{ $header }}
                </div>
                @if($collapsible)
                    <button @click="collapsed = !collapsed" class="text-gray-400 hover:text-gray-500">
                        <i class="fas" :class="collapsed ? 'fa-chevron-down' : 'fa-chevron-up'"></i>
                    </button>
                @endif
            </div>
        </div>
    @endif

    <div x-show="!collapsed"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 transform -translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-2">
        @if($loading)
            <div class="p-4 animate-pulse">
                <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-3/4 mb-4"></div>
                <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-1/2"></div>
            </div>
        @else
            <div class="px-4 py-5 sm:p-6">
                {{ $slot }}
            </div>
        @endif

        @if($footer)
            <div class="px-4 py-4 sm:px-6 bg-gray-50 dark:bg-gray-700/50 border-t border-gray-200 dark:border-gray-700">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>
