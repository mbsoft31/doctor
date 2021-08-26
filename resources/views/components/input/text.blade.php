@props(['id'])
<input
    id="{{$id}}"
    name="{{$id}}"
    type="text"
    {{ $attributes->merge(['class' => "block focus:ring-indigo-500 focus:border-indigo-500 border-gray-300" ]) }}
 />
