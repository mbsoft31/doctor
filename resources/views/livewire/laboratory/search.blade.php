<div>

    <div class="mt-6 max-w-7xl mx-auto px-6 py-10 border rounded-lg bg-white">
        <div class="max-w-3xl mx-auto w-full">
            <div>
                <input type="date" wire:model="date">
            </div>
            <div class="grid grid-cols-12 items-center">
                <x-input.text wire:model="search" id="search" placeholder="Search for name, address or speciality ...." class="col-span-5 text-lg rounded-l-lg" />
                <select wire:model="city" id="city" name="city" placeholder="{{__("Select a city")}}" class="col-span-5 text-lg border-l-0">
                    <option value="" selected>{{__("Select a city")}}</option>
                    @foreach($cities as $c)
                        <option value="{{$c}}">{{$c}}</option>
                    @endforeach
                </select>
                <button class="col-span-2 text-lg px-6 py-2 border rounded-r-lg border-yellow-400 bg-yellow-500 text-gray-50 hover:bg-yellow-600 hover:text-white">
                    {{ __("Search") }}
                </button>
            </div>
        </div>
    </div>

    <div class="mt-6 max-w-7xl mx-auto px-6 py-10 border">
        <div class="max-w-3xl mx-auto w-full space-y-8">

            @if($laboratories->links() && ! ( $laboratories->nextPageUrl() == $laboratories->previousPageUrl() ) )
                <div class="rounded-lg overflow-hidden">
                    <div class="px-6 py-4 bg-white border-b shadow">
                        {{ $laboratories->links() }}
                    </div>
                </div>
            @endif

            @foreach($laboratories as $laboratory)
                    <div x-data="{showCalendar: false}" class="bg-indigo-50 rounded-lg overflow-hidden shadow-md">

                        <div class="px-6 py-8 bg-white">
                            <x-appointment.appointment-at-card :model="$laboratory" type="App\Models\Laboratory">
                                <x-slot name="action">
                                    <button x-show="!showCalendar" x-on:click="showCalendar = !showCalendar" class="px-6 py-3 font-semibold uppercase tracking-wide text-gray-50 bg-green-500 rounded-lg shadow-md hover:text-white hover:bg-green-700">
                                        {{ __("show calendar") }} {{ $laboratory->id }}
                                    </button>
                                    <button x-show="showCalendar" x-on:click="showCalendar = !showCalendar" class="px-6 py-3 font-semibold uppercase tracking-wide text-gray-50 bg-green-500 rounded-lg shadow-md hover:text-white hover:bg-green-700">
                                        {{ __("hide calendar") }} {{ $laboratory->id }}
                                    </button>
                                </x-slot>
                            </x-appointment.appointment-at-card>
                        </div>

                        <div x-show="showCalendar" class="px-6 py-8 bg-indigo-50" style="display: none">
                            <livewire:calendar :model="$laboratory" type="App\Models\Doctor" :date="$date" wire:key="'calendar-doctor-{{$laboratory->id}}'" />
                        </div>

                    </div>
            @endforeach

            @if($laboratories->links() && ! ( $laboratories->nextPageUrl() == $laboratories->previousPageUrl() ))
                <div class="rounded-lg overflow-hidden">
                    <div class="px-6 py-4 bg-white border-b shadow">
                        {{ $laboratories->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>


</div>
