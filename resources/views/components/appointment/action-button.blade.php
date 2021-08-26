@props(["appointment", "status" => "pending"])


@switch ($status)
    @case('pending')
        @role('doctor')
            <form class="inline-block" action="{{route('doctor.appointment.accept', $appointment)}}" method="post">
        @csrf
        <x-button type="submit" color="green">
            {{ __('Accept') }}
        </x-button>
    </form>
        @endrole
        <form class="inline-block" action="{{route('doctor.appointment.destroy', $appointment)}}" method="post">
            @csrf
            <x-button type="submit" color="red">
                {{ __('Delete') }}
            </x-button>
        </form>
    @break
    @case('accepted')
        @role('doctor')
            <form class="inline-block" action="{{route('doctor.appointment.consult', ["appointment" => $appointment, "back"])}}" method="post">
            @csrf
            <x-button type="submit" color="blue">
                {{ __('Consult') }}
            </x-button>
        </form>
        @endrole
        <form class="inline-block" action="{{route('doctor.appointment.destroy', $appointment)}}" method="post">
            @csrf
            <x-button type="submit" color="red">
                {{ __('Delete') }}
            </x-button>
        </form>
    @break

@endswitch
