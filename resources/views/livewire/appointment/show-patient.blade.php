<div>
    <div class="bg-white px-6 py-8">
        @if( $appointment )
            <x-appointment.appointment-show :appointment="$appointment" />

            @if( $appointment->isAccepted() )
                <div class="mt-8 space-y-8">
                    <div class="flex items-center text-lg">
                        <div class="flex-1">
                            {{ __("Attachments") }}:
                        </div>
                    </div>
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
