@props(['tag' => 'ul' ])


@if($tag == 'ul')
<ul
    {{ $attributes->merge(["class" => "absolute z-50 py-2 px-0 m-0 text-base text-gray-900 bg-white border border-gray-900 rounded-lg"]) }}
>
@else
<div
    {{ $attributes->merge(["class" => "absolute z-50 py-2 px-0 m-0 text-base text-gray-900 bg-white border border-gray-900 rounded-lg"]) }}
>
@endif
    {{ $slot }}
@if($tag == 'ul')
</ul>
@else
</div>
@endif
