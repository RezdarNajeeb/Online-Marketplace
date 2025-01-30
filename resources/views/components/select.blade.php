<select
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge(['class' => 'mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 rounded-md shadow-sm dark:bg-gray-700 dark:text-gray-300']) !!}
>
    @if($placeholder)
        <option value="">{{ $placeholder }}</option>
    @endif

    @if($groupBy)
        @foreach($options->groupBy($groupBy) as $group => $items)
            <optgroup label="{{ $group }}">
                @foreach($items as $value => $label)
                    <option value="{{ $value }}" {{ $value == $selected ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                @endforeach
            </optgroup>
        @endforeach
    @else
        @foreach($options as $value => $label)
            <option value="{{ $value }}" {{ $value == $selected ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    @endif
</select>
