<div class="overflow-x-auto bg-white dark:bg-gray-800 shadow-sm rounded-lg border border-gray-200 dark:border-gray-700">
    <table {{ $attributes->merge(['class' => 'min-w-full divide-y divide-gray-200 dark:divide-gray-700']) }}>
        @if (isset($head))
            <thead class="bg-gray-50 dark:bg-gray-700/50">
            {{ $head }}
            </thead>
        @endif

        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
        {{ $body }}
        </tbody>

        @if (isset($foot))
            <tfoot class="bg-gray-50 dark:bg-gray-700/50">
            {{ $foot }}
            </tfoot>
        @endif
    </table>
</div>
