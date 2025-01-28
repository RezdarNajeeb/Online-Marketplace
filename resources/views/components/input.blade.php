<div class="mb-4">
    <label for="{{ $name }}" class="block text-gray-700">{{ $title }}</label>
    <input id="{{ $name }}" type="{{ $type }}" name="{{ $name }}" placeholder="{{ $placeholder }}" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" {{ $options }}>
    @error($name)
        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
    @enderror
</div>
