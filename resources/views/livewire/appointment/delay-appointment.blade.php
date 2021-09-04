<div x-data="{show: @entangle('show')}">
    <div>
        <button @click="show = true" type="button" class="block px-6 py-2 border rounded-md shadow-sm text-center font-semibold tracking-wide text-white bg-yellow-400 hover:text-white hover:bg-yellow-600">
            {{ _("Edit") }}
        </button>
    </div>


    <div x-show="show" class="fixed inset-0" style="display:none; z-index: 1001">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-25" style="z-index: 1002"></div>
        <div class="absolute inset-0 flex items-center justify-center" style="z-index: 1003">
            <div @click.away="show = false" class="max-w-2xl w-full divide-y divide-dashed divide-gray-200 border rounded-lg shadow-lg bg-white">

                <form action="#" wire:submit.stop="render">
                    <header class="px-6 py-4">
                        <div class="inline-block text-xl font-semibold tracking-wide text-indigo-900 py-4 border-b-2 border-indigo-600 ">
                            {{ __("Edit appointment") }}
                        </div>
                    </header>

                    <main class="px-6 py-4">
                        <div class="grid grid-cols-12 gap-4">

                            <div class="col-span-12">
                                <x-jet-label for="date" value="{{ __('Date') }}" />
                                <x-jet-input id="date" type="date" class="mt-1 block w-full" wire:model="date" autocomplete="date" />
                                <x-jet-input-error for="date" class="mt-2" />
                            </div>

                            <div class="col-span-12 grid grid-cols-12">
                                <div class="col-span-12">
                                    <x-jet-label for="time" value="{{ __('Time') }}" />
                                    <x-jet-input id="time" disabled type="text" class="mt-1 block w-full" wire:model="time" autocomplete="time" />
                                    <x-jet-input-error for="time" class="mt-2" />
                                </div>

                                <div class="col-span-1"></div>
                                {{-- Time input --}}
                                <div class="col-span-10">
                                    <div class="mt-4" x-data="{times: @entangle('times'), time: @entangle('time'), date: @entangle('date')}">
                                        <div class="grid grid-cols-12 gap-2">
                                            <template x-for="element in times" :key="element.text">
                                                <div class="col-span-4">

                                                    <template x-if=" ( ! element.is_reserved && ! element.is_disabled ) ">
                                                        <button type="button"
                                                                @click="time = (element.text == time && element.date == date) ? '' : element.text; date = element.date "
                                                                :class="{ 'text-green-50 bg-green-500': (element.text == time && element.date == date), 'text-indigo-50 bg-indigo-500': !(element.text == time && element.date == date)  }"
                                                                class="block w-full px-2 py-2 rounded-lg cursor-pointer"
                                                                x-text="element.text"
                                                        ></button>
                                                    </template>

                                                    <template x-if="element.is_reserved">
                                                        <button type="button" disabled class="block w-full px-2 py-2 rounded-lg cursor-not-allowed text-red-50 bg-red-500" x-text="element.text"></button>
                                                    </template>

                                                    <template x-if="element.is_disabled">
                                                        <button type="button" disabled class="block w-full px-2 py-2 rounded-lg cursor-not-allowed text-gray-50 bg-gray-500" x-text="element.text"></button>
                                                    </template>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </main>

                    <footer class="px-6 py-4">
                        <div class="py-6 text-xl text-right">
                            <button wire:click="delayAppointment" type="button" class="px-6 py-2 rounded-lg shadow-md bg-yellow-500 text-gray-50 hover:bg-yellow-700 hover:text-white">
                                {{ __("Edit appointment") }}
                            </button>
                        </div>
                    </footer>
                </form>

            </div>
        </div>
    </div>



</div>
