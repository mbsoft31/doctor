<div>
    <div class="">
        @if( $appointment )

            <div class="space-y-8">
                <div>
                    <x-appointment.appointment-show :appointment="$appointment" />
                </div>
            </div>

            @if($appointment->isConsulted())
                <div class="mt-8 space-y-8">
                    <div>
                        <span>Consultation type</span>: {{ $appointment->getMeta("consult_in") }}
                    </div>
                    <div>
                        {{ $appointment->getMeta("meeting_url", "not defined") }}
                    </div>
                </div>

                <div class="mt-8 space-y-8">
                    <div class="flex items-center text-lg">
                        <div class="flex-1">
                            {{ __("Attachments") }}:
                        </div>
                        <div>
                            <button wire:click="$emit('toggleAttachmentForm')" type="button" class="block px-6 py-2 border rounded-md shadow-sm text-center font-semibold tracking-wide text-white bg-blue-400 hover:text-white hover:bg-blue-600">
                                {{ _("Add attachment") }}
                            </button>
                        </div>
                    </div>
                    @if($attachment_form)
                        <div class="px-6 py-4 w-full border rounded-md bg-white">
                            <livewire:media.attachment-form :model="$appointment" wire:key="'appointment-{{$appointment->id}}'" />
                        </div>
                    @endif
                </div>
            @endif

            <div class="mt-8 space-y-8">
                <div>
                    @if($appointment->getMedia("attachments")->count() > 0)
                        <div class="space-y-4">
                            @foreach($appointment->getMedia("attachments") as $media)
                                <livewire:media.attachment-card :media="$media" wire:key="'media-{{$media->id}}'"></livewire:media.attachment-card>
                            @endforeach
                        </div>
                    @endif
                </div>
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
