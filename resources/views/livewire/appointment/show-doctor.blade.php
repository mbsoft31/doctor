<div>
    <div class="">
        @if( $appointment )

            <div class="space-y-8">
                <div>
                    <x-appointment.appointment-show :appointment="$appointment" />
                </div>
            </div>

            <div class="mt-8 space-y-8">
                <div class="inline-block text-xl font-semibold tracking-wide text-indigo-900 py-4 border-b-2 border-indigo-600">
                    {{ __("Attachements") }}
                </div>
                @if($appointment->getMedia("attachments")->count() > 0)
                    <div class="space-y-4">
                        @foreach($appointment->getMedia("attachments") as $media)
                            <livewire:media.attachment-card :media="$media" wire:key="$media->id"/>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="mt-8 space-y-8">
                @if($appointment->patient->appointments()->where('state', 'consulted')->count() > 0)
                    <div class="inline-block text-xl font-semibold tracking-wide text-indigo-900 py-4 border-b-2 border-indigo-600 ">
                        {{ __("Patient's history") }}
                    </div>
                    <div class="space-y-4">
                        @foreach($appointment->patient->appointments()->where('state', 'consulted')->get() as $app)
                            <div class="px-4 py-4 border rounded-lg shadow-md bg-gray-50">
                                <x-appointment.appointment-at-card :model="$app->appointment_at" :type="$app->appointment_at_type">
                                    <x-slot name="action">
                                        <a href="{{ route("doctor.appointment.index") }}?appointment_id={{$app->id}}" target="_blank" class="px-6 py-2 rounded-lg shadow-md bg-yellow-500 text-gray-50 hover:bg-yellow-700 hover:text-white">
                                            {{ __("See appointment") }}
                                        </a>
                                    </x-slot>
                                </x-appointment.appointment-at-card>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @else
            <div class="col-span-9 px-6 py-4 border-dashed border-4">
                <div class="text-2xl font-bold tracking-wide text-gray-500">
                    {{ __("No selected appointment") }}
                </div>
            </div>
        @endif
    </div>
</div>
