<div x-data="{show: @entangle('show')}">
    <div>
        <button @click="show = true" type="button" class="block px-6 py-2 border rounded-md shadow-sm text-center font-semibold tracking-wide text-white bg-blue-400 hover:text-white hover:bg-blue-600">
            {{ _("Consult") }}
        </button>
    </div>

    <div x-show="show" class="fixed inset-0" style="display:none; z-index: 1001">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-25" style="z-index: 1002"></div>
        <div class="absolute inset-0 flex items-center justify-center" style="z-index: 1003">
            <div @click.away="show = false" class="max-w-xl w-full divide-y divide-dashed divide-gray-200 border rounded-lg shadow-lg bg-white">

                <header class="px-6 py-4">
                    hello
                </header>

                <main class="px-6 py-4">
                    <div class="space-y-4">
                        <div>
                            {{ __("Where the consultation is going to be ?") }}
                        </div>
                        <div class="space-x-4">
                            <label for="in-place">
                                <input wire:model="state.consult_in" type="radio" value="in_place" name="consult_in" id="in-place">
                                <span>{{ __("In place") }}</span>
                            </label>
                            <label for="online-meeting">
                                <input wire:model="state.consult_in" type="radio" value="online_meeting" name="consult_in" id="online-meeting">
                                <span>{{ __("Online meeting") }}</span>
                            </label>
                        </div>

                        @if($state["consult_in"] == "online_meeting")
                            <div class="mt-4">
                                <x-input.label for="meeting_url">{{ __("Meeting url") }}</x-input.label>
                                <x-input.text wire:model="state.meeting_url" id="meeting_url" />
                                <x-input.error for="meeting_url" />
                            </div>
                        @endif
                    </div>
                </main>

                <footer class="px-6 py-4">
                    <button wire:click="consult">
                        {{ __("Consult") }}
                    </button>
                </footer>
            </div>
        </div>
    </div>
</div>
