<div
    x-data="{ show: false }"
    x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false"
    x-show="show"
    id="{{ $id }}"
    class="fixed inset-0 z-50 px-4 py-6 overflow-y-auto sm:px-0"
    style="display: none;"
>

    <div x-show="show" class="fixed inset-0 transition-all transform" x-on:click="show = false">
        <div class="absolute inset-0 bg-gray-500/75 dark:bg-gray-900/75 backdrop-blur-sm"></div>
    </div>

    <div x-show="show" class="mb-6 bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full {{ $maxWidth }} sm:mx-auto">
        @if($title || $showClose)
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center">
                @if($title)
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ $title }}
                    </h3>
                @endif
                @if($showClose)
                    <button @click="show = false" class="text-gray-400 hover:text-gray-500 focus:outline-none">
                        <span class="sr-only">Close</span>
                        <i class="fas fa-times"></i>
                    </button>
                @endif
            </div>
        @endif

        <div class="px-6 py-4">
            {{ $slot }}
        </div>

        @if(isset($footer))
            <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700/50 text-right space-x-2">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>
