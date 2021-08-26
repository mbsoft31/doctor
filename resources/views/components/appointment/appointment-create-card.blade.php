@props(["model", "type"])

@php
    if($type == "App\Models\Doctor")
    {
        $kind = "doctor";
        $bg = "bg-blue-500 hover:bg-blue-700";
        $text = "text-blue-500 hover:text-blue-700";
    }
    elseif($type == "App\Models\Laboratory")
    {
        $kind = "laboratory";
        $bg = "bg-green-500 hover:bg-green-700";
        $text = "text-green-500 hover:text-green-700";
    }
    else
    {
        $bg = "bg-gray-500 hover:bg-gray-700";
        $text = "text-gray-500 hover:text-gray-700";
    }
@endphp

<div>
    <div class="flex items-start">
        <div class="flex-1 px-6 py-2">
            @if( isset($kind) )
                <div class="uppercase text-sm font-bold tracking-wide {{$text}}">
                    <span class="uppercase text-sm font-bold tracking-wide text-gray-900">{{ $kind }}</span>
                    @if($kind == "doctor")
                        <span class="uppercase text-sm font-bold tracking-wide text-gray-900">({{ $model->speciality->name }})</span>
                    @endif
                </div>
            @endif
            <a href="#" class='block text-xl font-semibold {{$text}}'>
                {{ $model->name }}
            </a>
            <a href="mailto:{{ $model->user->email }}" class="block uppercase text-sm font-bold tracking-wide text-gray-400">
                {{ $model->user->email }}
            </a>
            <div>
                <span>{{ __("Phone") }}: </span>
                <span>{{ $model->user->phone }}</span>
            </div>
            <div>
                <span>{{ __("Address") }}: </span>
                <span>{{ $model->address }}</span>
            </div>
            <div>
                <span>{{ __("City") }}: </span>
                <span>{{ $model->city }}</span>
            </div>
            <div>
                <span>{{ __("Country") }}: </span>
                <span>{{ $model->country }}</span>
            </div>
            @if(isset($action))
                <div>
                    {{ $action }}
                </div>
            @endif
        </div>
    </div>
</div>
