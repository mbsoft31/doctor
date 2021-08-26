@props(["appointment" => null, "show" => false])

<div>

    <div>
        <div>
            {{ $appointment->date }} - {{ $appointment->time }}
        </div>
    </div>

    <x-appointment.appointment-at-card :model="$appointment->appointment_at" :type="$appointment->appointment_at_type">
        <x-slot name="action">
            <x-appointment.state state="{{$appointment->state}}" />
            {{--<button type="button" class='block px-6 py-2 border rounded-md shadow-sm text-center font-semibold tracking-wide text-white bg-blue-400 hover:text-white hover:bg-blue-600'>
                {{ __("Make appointment") }}
            </button>--}}
        </x-slot>
    </x-appointment.appointment-at-card>

</div>
