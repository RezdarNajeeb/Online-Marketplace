@php
    $types = [
        'info' => [
            'classes' => 'bg-blue-50 text-blue-800 dark:bg-blue-900/50 dark:text-blue-300 border-blue-200 dark:border-blue-800',
            'icon' => 'fa-info-circle'
        ],
        'success' => [
            'classes' => 'bg-green-50 text-green-800 dark:bg-green-900/50 dark:text-green-300 border-green-200 dark:border-green-800',
            'icon' => 'fa-check-circle'
        ],
        'warning' => [
            'classes' => 'bg-yellow-50 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300 border-yellow-200 dark:border-yellow-800',
            'icon' => 'fa-exclamation-triangle'
        ],
        'error' => [
            'classes' => 'bg-red-50 text-red-800 dark:bg-red-900/50 dark:text-red-300 border-red-200 dark:border-red-800',
            'icon' => 'fa-exclamation-circle'
        ]
    ];
@endphp

<div x-data="{ show: true }"
     x-show="show"
     x-init="@if($duration) setTimeout(() => show = false, {{ $duration }}) @endif"
     {{ $attributes->merge(['class' => "p-4 rounded-lg border w-[50%] absolute top-0 mx-auto z-50 {$types[$type]['classes']} relative"]) }}
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform -translate-y-2"
     x-transition:enter-end="opacity-100 transform translate-y-0"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="opacity-100 transform translate-y-0"
     x-transition:leave-end="opacity-0 transform -translate-y-2">
    <div class="flex items-start">
        @if($icon)
            <div class="flex-shrink-0">
                <i class="fas {{ $types[$type]['icon'] }} text-lg"></i>
            </div>
        @endif
        <div class="ml-3 flex-1 pt-0.5">
            {{ $slot }}
        </div>
        @if($dismissible)
            <div class="ml-4 flex-shrink-0">
                <button @click="show = false"
                        type="button"
                        class="inline-flex text-gray-400 hover:text-gray-500 focus:outline-none">
                    <span class="sr-only">Close</span>
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif
    </div>
</div>
