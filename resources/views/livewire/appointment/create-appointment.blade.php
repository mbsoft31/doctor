<div>

    <div id="make-appointment" class="mt-10 max-w-7xl w-full mx-auto">
        <div class="max-w-7xl mx-auto h-full rounded-b-lg overflow-hidden">
            <div class="space-y-8">
                <div class="px-4 py-20">
                    <div class="text-center">
                        <h2 class="uppercase text-3xl sm:text-4xl md:text-5xl font-bold tracking-wide text-indigo-800">
                            {{ __("Make an appointment") }}
                        </h2>
                        <p class=" max-w-3xl mt-8 mx-auto text-lg font-semibold tracking-wider text-indigo-500">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet beatae blanditiis dolorem dolorum est iusto labore laboriosam laborum nam officiis, praesentium quasi sapiente sed sit velit vitae voluptate voluptates voluptatum.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-10 max-w-7xl w-full mx-auto">
        <div class="max-w-7xl mx-auto h-full">
            <div class="space-y-8">
                <div class="max-w-3xl mx-auto bg-white rounded-lg overflow-hidden">
                    <div class="px-6 py-4">
                        <form action="#" wire:submit.stop="render">
                            <div class="grid grid-cols-12 gap-4">

                                @if( ! Auth::check() )
                                    <div class="col-span-12">
                                        <div class="py-6 text-xl text-center">
                                            <a class="text-indigo-500 underline font-semibold tracking-wide" href="{{ route("login") }}">{{ __("Login") }}</a>
                                            <span>{{ __("or you can") }}</span>
                                            <a class="text-indigo-500 underline font-semibold tracking-wide" href="{{ route("register") }}">{{ __("create a patient account") }}</a>
                                            <span>{{ __("in order to complete your reservation.") }}</span>
                                        </div>
                                    </div>
                                @endif

                                <div class="col-span-12">
                                    <x-jet-label for="date" value="{{ __('Date') }}" />
                                    <x-jet-input id="date" type="date" class="mt-1 block w-full" wire:model="date" autocomplete="date" />
                                    <x-jet-input-error for="date" class="mt-2" />
                                </div>
                                <div class="col-span-12">
                                    <div class="space-y-4">
                                        <div>
                                            {{ __("Where the consultation is going to be ?") }}
                                        </div>
                                        <div class="space-x-4">
                                            <label for="in-place">
                                                <input wire:model="state.consult_in" type="radio" value="in_place" name="consult_in" id="in-place">
                                                <span>{{ __("In place") }}</span>
                                            </label>
                                            @if($model->user->hasRole("doctor"))
                                                <label for="online-meeting">
                                                    <input wire:model="state.consult_in" type="radio" value="online_meeting" name="consult_in" id="online-meeting">
                                                    <span>{{ __("Online meeting") }}</span>
                                                </label>
                                            @endif
                                        </div>
                                    </div>
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

                                <div class="col-span-12">
                                    @if(Auth::check() && Auth::user()->hasAnyRole(["laboratory", "doctor", "patient"]))
                                        <div class="py-6 text-xl text-right">
                                            <button wire:click="makeAppointment" type="button" class="px-6 py-2 rounded-lg shadow-md bg-indigo-500 text-gray-50 hover:bg-indigo-700 hover:text-white">
                                                {{ __("Make reservation") }}
                                            </button>
                                        </div>
                                    @endif
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-10 max-w-7xl w-full mx-auto">

    </div>

</div>
