@php
    $variants = [
        'default' => 'text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200',
        'primary' => 'text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300',
        'success' => 'text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-300',
        'danger' => 'text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300',
        'warning' => 'text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-300'
    ];

    $sizes = [
        'sm' => 'text-sm',
        'md' => 'text-base',
        'lg' => 'text-lg'
    ];
@endphp

<a href="{{ $href }}" {{ $attributes->merge([
    'class' => "{$variants[$variant]} {$sizes[$size]} inline-flex items-center transition-colors duration-200" .
        ($disabled ? ' opacity-50 cursor-not-allowed' : '')
]) }}>
    @if($icon && $iconPosition === 'left')
        <i class="fas fa-{{ $icon }} mr-2"></i>
    @endif

    {{ $slot }}

    @if($icon && $iconPosition === 'right')
        <i class="fas fa-{{ $icon }} ml-2"></i>
    @endif
</a>
