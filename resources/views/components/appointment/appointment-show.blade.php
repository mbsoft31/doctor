@props(["appointment" => null, "show" => false])

@php
    if($appointment->is_past)
    {
        $bg = "bg-red-50";
        $text = "text-red-500";
    }else {
        $bg ="bg-green-50";
        $text = "text-green-500";
    }
@endphp

<div class="">

    <div class="">

        <div class="flex items-center px-4 py-4 {{ $bg }}">
            <div class="flex-1 py-4">
                <div>
                    <span class="font-bold tracking-wide text-gray-500">{{ __("Appointment date") }}:</span>
                    <span class="text-xl font-bold tracking-wide text-gray-700">{{ $appointment->date_formated }}</span>
                </div>
                <div class="uppercase text-sm font-semibold tracking-wide {{ $text }}">
                    {{ $appointment->shortRelativeDiffForHumans() }}
                </div>
            </div>

            <x-appointment.state state="{{$appointment->state}}" />
        </div>

    </div>

    <div class="mt-4">
        <div class="flex items-center px-6 py-4">
            <div class="flex-1 py-4"></div>
            <div class="flex space-x-4">
                @if(Auth::user()->hasRole("patient") && Auth::user()->patient->id == $appointment->patient_id)
                    <livewire:appointment.delay-appointment :appointment="$appointment" :model="$appointment->appointment_at" :type="$appointment->appointment_at_type"/>
                @endif

                @if( (Auth::user()->is($appointment->appointment_at->user) && $appointment->isConsulted()) || Auth::user()->is($appointment->patient->user) )
                    <livewire:appointment.attach-appointment :appointment="$appointment" :model="$appointment->appointment_at" :type="$appointment->appointment_at_type"/>
                @endif
                @if( Auth::user()->is($appointment->appointment_at->user) && ! $appointment->isConsulted())
                    <livewire:appointment.consult-modal :appointment="$appointment" />
                @endif
            </div>
        </div>
    </div>

    @if(isset($appointment->metas["consult_in"]))
        <div class="flex items-center px-4 py-4">
            <div class="flex-1 py-4">
                <div>
                    <span class="font-bold tracking-wide text-gray-500">{{ __("Appointment type") }}:</span>
                    <span class="text-xl font-bold tracking-wide text-gray-700">{{ $appointment->metas["consult_in"] == "in_place" ? "In place" : ( $appointment->metas["consult_in"] == "online_meeting"?"Online meeting": "") }}</span>
                </div>
                @if(isset($appointment->metas["meeting_url"]) && $appointment->metas["consult_in"] == "online_meeting")
                    <a href="{{ $appointment->metas["meeting_url"] }}" target="_blank" class="uppercase text-sm font-semibold tracking-wide text-green-500">
                        {{ $appointment->metas["meeting_url"] }}
                    </a>
                @endif
            </div>
        </div>
    @endif

    <div class="flex flex-col">
        <div class="py-4 space-y-4">

            <div class="inline-block text-xl font-semibold tracking-wide text-indigo-900 py-4 border-b-2 border-indigo-600 ">
                {{ __("Appointment For") }}
            </div>

            <div class="px-4 py-4 border rounded-lg shadow-md bg-gray-50">
                <x-appointment.patient-card :model="$appointment->patient" />
            </div>

        </div>

    </div>

    <div class="flex flex-col">
        <div class="py-4 space-y-4">

            <div class="inline-block text-xl font-semibold tracking-wide text-indigo-900 py-4 border-b-2 border-indigo-600 ">
                {{ __("Appointment At") }}
            </div>

            <div class="px-4 py-4 border rounded-lg shadow-md bg-gray-50">
                <x-appointment.appointment-at-card :model="$appointment->appointment_at" :type="$appointment->appointment_at_type" />
            </div>

        </div>

    </div>


</div>
