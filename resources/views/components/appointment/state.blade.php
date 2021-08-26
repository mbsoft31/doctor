@props(["state"])

@php
    if ($state == "accepted")
        $classes = "text-gray-50 bg-green-500";
    elseif ($state == "consulted")
        $classes = "text-gray-50 bg-blue-500";
    else
        $classes = "text-gray-50 bg-gray-500";
@endphp

<div>
    <span class='px-4 py-1.5 rounded-full {{ $classes }}'>
        {{ $state }}
    </span>
</div>
