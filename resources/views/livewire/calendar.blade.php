<div>
    {{-- Days grid--}}
    <header class="grid grid-cols-12 {{$class ?? ''}}">
        <div class="col-span-1">
            <button wire:click="previous()" type="button">
                <svg wire:click="previous()" class="w-10 h-10" fill="currentColor" viewBox="0 0 256 512"><path d="M31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z"/></svg>
            </button>
        </div>
        <div class="col-span-10 grid grid-cols-5">

            @foreach($days as $day)
                <div class="flex flex-col items-center">
                    <div class="text-sm font-semibold">{{ \Carbon\Carbon::make($day["date"])?->format("l") }}</div>
                    <div class="text-xs font-bold tracking-wide">
                        {{ $day["date"] }}
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-span-1">
            <button wire:click="next()" type="button">
                <svg wire:click="next()" class="w-10 h-10" fill="currentColor" viewBox="0 0 256 512"><path d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"/></svg>
            </button>
        </div>
    </header>
    <main class="grid grid-cols-12">
        <div class="col-span-1"></div>
        <div class="col-span-10 grid gap-4 grid-cols-5">
{{--            <div class="col-span-full">
                {!! print_r(dump($days)) !!}
            </div>--}}
            @foreach($days as $day)
                <div  class="mt-4">
                    <div class="grid grid-cols-12 gap-1">
                        @foreach($day['times'] as $key => $value)
                            <div class="col-span-6"
                                 x-data="{
                                    is_reserved: {{ json_encode($value["is_reserved"]) }},
                                    is_disabled: {{ json_encode($value["is_disabled"]) }},
                                    selected_time: {{ json_encode($value['text']) }},
                                    selected_date: {{ json_encode($day['date']) }},
                                    time: {{ json_encode($time) }},
                                    date: {{ json_encode($date) }},
                                 }"
                            >
                                @if( ! $value["is_reserved"] && ! $value["is_disabled"])
                                    <button type="button"
                                            wire:click="select({{ json_encode($day['date']) }}, {{ json_encode($value['text']) }})"
                                            :class="{ 'text-green-50 bg-green-500': (time == selected_time && selected_date == date), 'text-indigo-50 bg-indigo-500': !(time == selected_time && selected_date == date)  }"
                                            class="block w-full rounded-lg cursor-pointer"
                                    >{{ $value["text"] }}</button>
                                @endif

                                @if( $value["is_reserved"])
                                    <button type="button" class="block w-full rounded-lg cursor-not-allowed text-red-50 bg-red-500">
                                        {{ $value["text"] }}
                                    </button>
                                @endif

                                @if( $value["is_disabled"])
                                    <button type="button" class="block w-full rounded-lg cursor-not-allowed text-gray-50 bg-gray-500">
                                        {{ $value["text"] }}
                                    </button>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-span-1"></div>
    </main>
</div>
