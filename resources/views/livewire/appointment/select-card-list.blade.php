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

                <x-appointment.appointment-card :appointment="$appointment" class="{{$class}} rounded-lg overflow-hidden" />
            </a>
        @endforeach
    @endforeach
</div>
