@props(["model"])

<div class="">
    <div class="flex items-start">
        <a href="#" class="block w-24 h-24 border-gray-50 border-4 rounded-full shadow-md">
            <img src="{{ $model->user->profile_photo_url }}" alt="profile" class="w-full h-full object-center object-cover rounded-full">
        </a>
        <div class="flex-1 px-6 py-2 space-y-1">
            @if( isset($kind) )
                <div class="mb-2 uppercase text-sm font-bold tracking-wide text-gray-500 hover:text-gray-700">
                    <span class="uppercase text-sm font-bold tracking-wide text-gray-900">{{ $kind }}</span>
                    @if($kind == "doctor")
                        <span class="uppercase text-sm font-bold tracking-wide text-gray-900">({{ $model->speciality->name }})</span>
                    @endif
                </div>
            @endif
            <a href="#" class='block text-2xl font-semibold text-gray-500 hover:text-gray-700'>
                {{ $model->name }}
            </a>
            <a href="mailto:{{ $model->user->email }}" class="block uppercase text-sm font-bold tracking-wide text-gray-400">
                {{ $model->user->email }}
            </a>
        </div>
        @if(isset($action))
            <div>
                {{ $action }}
            </div>
        @endif
    </div>
    <div class="ml-24 px-6 space-y-2">
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
    </div>
</div>

