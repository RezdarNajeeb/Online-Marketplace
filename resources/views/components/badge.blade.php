@php
    $types = [
        'default' => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
        'success' => 'bg-green-100 text-green-800 dark:bg-green-700/20 dark:text-green-400',
        'warning' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-700/20 dark:text-yellow-400',
        'danger' => 'bg-red-100 text-red-800 dark:bg-red-700/20 dark:text-red-400',
        'info' => 'bg-blue-100 text-blue-800 dark:bg-blue-700/20 dark:text-blue-400',
    ];

    $sizes = [
        'sm' => 'px-2 py-0.5 text-xs',
        'md' => 'px-2.5 py-0.5 text-sm',
        'lg' => 'px-3 py-1 text-base',
    ];

    // Format counter value
    $value = $slot->toHtml();
    if ($counter && is_numeric($value) && $max) {
        $value = intval($value) > $max ? $max . '+' : $value;
    }
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center font-medium rounded-full {$sizes[$size]} {$types[$type]}"]) }}>
    @if($dot)
        <span class="flex-shrink-0 h-2 w-2 rounded-full mr-1.5 bg-current"></span>
    @endif
    {{ $counter ? $value : $slot }}
</span>
