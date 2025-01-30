@php
    $sizeClasses = [
        'sm' => 'text-sm',
        'md' => 'text-base',
        'lg' => 'text-xl',
        'xl' => 'text-2xl',
    ][$size];

    $colorClasses = [
        'indigo' => 'text-indigo-600 dark:text-indigo-400',
        'gray' => 'text-gray-600 dark:text-gray-400',
        'white' => 'text-white',
    ][$color];
@endphp

<i {{ $attributes->merge(['class' => "fas fa-spinner fa-spin $sizeClasses $colorClasses"]) }}></i>
