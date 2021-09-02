@props(["appointment" => null, "show" => false])

<div class="">

    <div class="">

        <div @if($appointment->is_past) class="flex items-center px-4 py-4 bg-red-50" @else class="flex items-center px-6 py-4 bg-green-50"@endif>
            <div class="flex-1 py-4">
                <div>
                    <span class="font-bold tracking-wide text-gray-500">{{ __("Appointment date") }}:</span>
                    <span class="text-xl font-bold tracking-wide text-gray-700">{{ $appointment->date_formated }}</span>
                </div>
                <div @if($appointment->is_past) class="uppercase text-sm font-semibold tracking-wide text-red-500" @else class="uppercase text-sm font-semibold tracking-wide text-green-500"@endif>
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

    @if( $appointment->isConsulted() )
        <div class="mt-4 space-y-8">
            <div class="flex items-center px-6 py-4 bg-green-50">
                <div class="flex-1 py-4">
                    <span class="font-bold tracking-wide text-gray-500">{{ __("Attachments") }}:</span>
                </div>
                <div>
                    <button wire:click="$emit('toggleAttachmentForm')" type="button" class="block px-6 py-2 border rounded-md shadow-sm text-center font-semibold tracking-wide text-white bg-blue-400 hover:text-white hover:bg-blue-600">
                        {{ _("Add attachment") }}
                    </button>
                </div>
            </div>
            @if($show)
                <div class="px-6 py-4 w-full border rounded-md bg-white">
                    <livewire:media.attachment-form :model="$appointment" wire:key="'appointment-{{$appointment->id}}'" />
                </div>
            @endif
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
