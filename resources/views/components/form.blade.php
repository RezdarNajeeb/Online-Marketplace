@php
    $method = strtoupper($method);
    $spoofedMethod = in_array($method, ['PUT', 'PATCH', 'DELETE']);
@endphp

<form
    method="{{ $spoofedMethod ? 'POST' : $method }}"
    {!! $hasFiles ? 'enctype="multipart/form-data"' : '' !!}
    x-data="{ loading: false }"
    @submit.prevent="
        if (loading && {{ $preventMultipleSubmit ? 'true' : 'false' }}) return;
        loading = true;
        $el.submit();
    "
    {{ $attributes }}
>
    @csrf
    @if($spoofedMethod)
        @method($method)
    @endif

    {{ $slot }}
</form>
