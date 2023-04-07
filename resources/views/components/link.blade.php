<div>
    @php
        $clases = "underline text-xs text-gray-600 hover:text-gray-900";
    @endphp
    <a {{$attributes->merge(['class' => $clases])}}>
        {{ $slot }}
    </a>
</div>
