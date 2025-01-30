@php
    $variants = [
        'primary' => $outline
            ? 'border-indigo-600 text-indigo-600 hover:bg-indigo-50 focus:ring-indigo-500 dark:border-indigo-400 dark:text-indigo-400 dark:hover:bg-indigo-950'
            : 'bg-indigo-600 text-white hover:bg-indigo-700 focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600',
        'secondary' => $outline
            ? 'border-gray-600 text-gray-600 hover:bg-gray-50 focus:ring-gray-500 dark:border-gray-400 dark:text-gray-400 dark:hover:bg-gray-900'
            : 'bg-white text-gray-700 border-gray-300 hover:bg-gray-50 focus:ring-gray-500 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 dark:hover:bg-gray-700',
        'danger' => $outline
            ? 'border-red-600 text-red-600 hover:bg-red-50 focus:ring-red-500 dark:border-red-400 dark:text-red-400 dark:hover:bg-red-950'
            : 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500 dark:bg-red-500 dark:hover:bg-red-600'
    ];

    $sizes = [
        'xs' => 'px-2.5 py-1.5 text-xs',
        'sm' => 'px-3 py-2 text-sm',
        'md' => 'px-4 py-2 text-sm',
        'lg' => 'px-4 py-2 text-base',
        'xl' => 'px-6 py-3 text-base'
    ];

    $baseClasses = 'inline-flex items-center justify-center border rounded-lg font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-300 disabled:opacity-50 disabled:cursor-not-allowed';
    if ($block) $baseClasses .= ' w-full';
@endphp

<button {{ $attributes->merge(['type' => 'button', 'class' => "{$baseClasses} {$variants[$variant]} {$sizes[$size]} "]) }}
        @if($loading) disabled @endif>
    @if($loading)
        <x-spinner size="sm" color="gray"/>
    @elseif($icon && $iconPosition === 'left')
        <i class="fas fa-{{ $icon }} mr-2 -ml-1"></i>
    @endif

    {{ $slot }}

    @if($icon && $iconPosition === 'right')
        <i class="fas fa-{{ $icon }} ml-2 -mr-1"></i>
    @endif
</button>
