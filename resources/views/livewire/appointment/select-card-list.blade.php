<div>
    <div>
        <input type="date" wire:model="date">
    </div>

    @foreach($appointments->groupBy("date") as $appointment_group)
        @foreach($appointment_group->sortBy("appointment_at_type") as $appointment)
            <div class="text-sm px-6 py-2 font-semibold tracking-wide text-gray-600">
                {{ \Carbon\Carbon::now()->shortRelativeDiffForHumans(\Carbon\Carbon::make($appointment_group->first()->date))}}
            </div>
            <a wire:click="select({{$appointment->id}})" href="#top" class="block mt-8 cursor-pointer">

                @php
                    if($appointment_id == $appointment->id) {
                        $class="bg-indigo-50";
                    }else{
                        $class="bg-white";
                    }
                @endphp

                @php
                    if($appointment->appointment_at->user->hasRole("doctor"))
                        $color="blue-600";
                    elseif($appointment->appointment_at->user->hasRole("laboratory"))
                        $color="green-600";
                    else
                        $color="gray-600";
                @endphp

                <div class="{{$class}} rounded-lg overflow-hidden">
                    <div class="border rounded-lg shadow-sm overflow-hidden">
                        <div class="px-4 py-1.5 bg-{{$color}}">
                            <span class="inline-block text-sm font-semibold text-gray-50">{{ $appointment->date }} - </span>
                            <span class="inline-block text-sm font-semibold text-gray-50">{{ $appointment->time }}</span>
                        </div>
                        <div class="px-4 py-4 space-y-2">
                            @if(Auth::user()->hasRole("patient"))
                                <div>
                                    <div class="">
                                        <span class="block text-sm font-semibold tracking-wide">{{ __("Appointment at") }}: </span>
                                        <span class="block font-bold">{{ $appointment->appointment_at->name }}</span>
                                    </div>
                                    <div class="">
                                        <span class="block text-sm font-semibold tracking-wide">{{ __("Speciality") }}: </span>
                                        <span class="block font-bold">{{ $appointment->appointment_at->speciality->name }}</span>
                                    </div>
                                    <div class="">
                                        <span class="block text-sm font-semibold tracking-wide">{{ __("Address") }}: </span>
                                        <span class="block font-bold">{{ $appointment->appointment_at->address }}</span>
                                    </div>
                                    <div class="">
                                        <span class="block text-sm font-semibold tracking-wide">{{ __("Phone") }}: </span>
                                        <span class="block font-bold">{{ $appointment->appointment_at->user->phone }}</span>
                                    </div>
                                </div>
                            @endif

                            @if(Auth::user()->hasAnyRole(["doctor", "laboratory"]))
                                <div>
                                    <div class="">
                                        <span class="block text-sm font-semibold tracking-wide">{{ __("Appointment for") }}: </span>
                                        <span class="block font-bold">{{ $appointment->patient->name }}</span>
                                    </div>
                                    <div class="">
                                        <span class="block text-sm font-semibold tracking-wide">{{ __("Address") }}: </span>
                                        <span class="block font-bold">{{ $appointment->patient->address }}</span>
                                    </div>
                                    <div class="">
                                        <span class="block text-sm font-semibold tracking-wide">{{ __("Phone") }}: </span>
                                        <span class="block font-bold">{{ $appointment->patient->user->phone }}</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    @endforeach
</div>
