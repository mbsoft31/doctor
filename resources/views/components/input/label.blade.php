@props(['value'])
<label
    {{ $attributes->merge(['class' => "text-sm font-semibold tracking-wide text-gray-700" ]) }}
>
    {{ $value ?? $slot }}
</label>
