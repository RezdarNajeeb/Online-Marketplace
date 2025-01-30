@php
    $sizes = [
        'sm' => 'h-8 w-8',
        'md' => 'h-10 w-10',
        'lg' => 'h-12 w-12',
        'xl' => 'h-14 w-14',
    ];

    $statusColors = [
        'online' => 'bg-green-400',
        'offline' => 'bg-gray-400',
        'busy' => 'bg-red-400',
        'away' => 'bg-yellow-400'
    ];
@endphp

<div class="relative">
    <div {{ $attributes->merge(['class' => "{$sizes[$size]} relative rounded-full overflow-hidden bg-gray-100 dark:bg-gray-700"]) }}>
        @if($src)
            <img src="{{ $src }}"
                 alt="{{ $alt }}"
                 class="h-full w-full object-cover"
                 loading="lazy"
                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
            <div class="hidden h-full w-full items-center justify-center bg-gray-200 dark:bg-gray-600 text-gray-600 dark:text-gray-400 font-medium">
                {{ $initials ?? substr($alt, 0, 2) }}
            </div>
        @else
            <div class="h-full w-full flex items-center justify-center bg-gray-200 dark:bg-gray-600 text-gray-600 dark:text-gray-400 font-medium">
                {{ $initials ?? substr($alt, 0, 2) }}
            </div>
        @endif
    </div>
    @if($status)
        <span class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full ring-2 ring-white dark:ring-gray-800 {{ $statusColors[$status] }}"></span>
    @endif
</div>
