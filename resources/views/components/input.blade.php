<div class="mb-4">
    <label for="{{ $name }}" class="block text-gray-700 dark:text-white">{{ $title }}</label>
    <input id="{{ $name }}" type="{{ $type }}" name="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ $value }}"
           class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 dark:focus:ring-indigo-400 transition-all duration-300"
        {{ $options }}>
    @error($name)
        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
    @enderror
</div>
