@php
    $error = $errors->has($name);
@endphp

<div x-data="{
    showPassword: false,
    charCount: {{ strlen(old($name, $value)) }},
    maxLength: {{ json_encode($maxLength) }},
    value: '{{ old($name, $value) }}'
}" class="space-y-2">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ $label }}
        </label>
    @endif

    <div class="relative rounded-lg shadow-sm">
        @if($prefix)
            <div class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                <span class="text-gray-500 dark:text-gray-400 text-sm sm:text-base">{{ $prefix }}</span>
            </div>
        @endif

        @if($icon)
            <div class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                <i class="fas fa-{{ $icon }} text-gray-400 dark:text-gray-500 text-sm sm:text-base"></i>
            </div>
        @endif

        <input
            id="{{ $name }}"
            name="{{ $name }}"
            x-model="value"
            {{ $disabled ? 'disabled' : '' }}
            :type="showPassword ? 'text' : '{{ $type }}'"
            {{ $attributes->merge([
                'class' => 'w-full rounded-lg outline-gray-300 dark:outline-gray-600 focus:outline-indigo-500 focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 text-sm sm:text-base pr-10 px-4 py-2 transition-all duration-200' .
                    ($error ? ' outline-red-300 text-red-900 placeholder-red-300 focus:outline-red-500 focus:ring-red-500' : '') .
                    ($icon ? ' pl-10 sm:pl-12' : '') .
                    ($prefix ? ' pl-8 sm:pl-10' : '') .
                    ($suffix ? ' pr-10 sm:pr-12' : '') .
                    ($disabled ? ' bg-gray-100 dark:bg-gray-800 text-gray-500 dark:text-gray-400 cursor-not-allowed' : '')
            ]) }}
            @if($maxLength) maxlength="{{ $maxLength }}" @endif
            x-on:input="charCount = $event.target.value.length"
        >

        @if($type === 'password')
            <button type="button"
                    @click="showPassword = !showPassword"
                    class="absolute inset-y-0 right-0 pr-3 sm:pr-4 flex items-center text-gray-400 dark:text-gray-500 hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">
                <i class="fas text-sm sm:text-base" :class="showPassword ? 'fa-eye-slash' : 'fa-eye'"></i>
            </button>
        @endif

        @if($type === 'text')
            <button type="button" x-show="value"
                    @click="value = ''; charCount = 0"
                    class="absolute inset-y-0 right-0 pr-3 sm:pr-4 flex items-center hover:text-red-600 dark:hover:text-red-400 transition-colors">
                <i class="fas fa-times-circle text-sm sm:text-base"></i>
            </button>
        @endif

        @if($suffix)
            <div class="absolute inset-y-0 right-0 pr-3 sm:pr-4 flex items-center pointer-events-none">
                <span class="text-gray-500 dark:text-gray-400 text-sm sm:text-base">{{ $suffix }}</span>
            </div>
        @endif
    </div>

    @error($name)
        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
    @enderror

    @if($showCount && $maxLength)
        <div class="text-sm text-gray-500 dark:text-gray-400 text-right mt-1">
            <span x-text="charCount"></span>/<span x-text="maxLength"></span>
        </div>
    @endif

    @if($attributes->has('help'))
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $attributes->get('help') }}</p>
    @endif
</div>
