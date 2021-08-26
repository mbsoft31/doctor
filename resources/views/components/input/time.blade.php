@props(['id', 'time' => null, "available" => [], "reserved" => []])

<div
    x-data='{time : null, times: {{ json_encode($available) }}, reserved: {{ json_encode($reserved) }}}'
>
    <input
        type="hidden"
        id="{{$id}}"
        name="{{$id}}"
        :value="time">
    <div class="mt-4 grid grid-cols-8 gap-1.5">
        @foreach($available as $time)
            <span
                x-show="reserved.indexOf('{{$time}}') == -1"
                @click="time = '{{ $time }}'"
                :class="{ 'bg-blue-500': time=='{{$time}}'}"
                class="w-20 inline px-1.5 py-1 text-center text-white bg-green-500 cursor-pointer rounded-full shadow">
                {{ $time }}
            </span>
            <span
                x-show="reserved.indexOf('{{$time}}') != -1"
                class="w-20 inline px-1.5 py-1 text-center text-white bg-red-500 cursor-none rounded-full shadow">
                {{ $time }}
            </span>
        @endforeach
    </div>
</div>
