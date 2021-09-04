<x-static-layout>
    <div class="w-full">

        <div class="w-full bg-gray-100">
            <div class="max-w-7xl mx-auto h-full rounded-b-lg overflow-hidden">
                <div class="grid grid-cols-12 gap-4 items-center justify-center bg-indigo-700">
                    <div class="col-span-12 md:col-span-12 lg:col-span-5">
                        <div class="py-8">
                            <div class="flex flex-col gap-4 px-4 py-4 space-y-2">
                                <div class="w-64 h-64 mx-auto">
                                    <img src="{{ $model->user->profile_photo_url }}" alt="profile" class="w-full h-full object-center object-cover border-4 border-white rounded-full shadow-md">
                                </div>
                                <div class=" text-center">
                                    <div>
                                        <span class="uppercase text-lg font-bold tracking-wide text-gray-200">{{ $type == "App\Models\Doctor" ? 'Doctor' : 'Laboratory' }}</span>
                                        @if($type == "App\Models\Doctor")
                                            <span class="uppercase text-lg font-bold tracking-wide text-gray-200">({{ $model->speciality->name }})</span>
                                        @endif
                                    </div>
                                    <h1 class="mt-2 uppercase text-3xl sm:text-4xl md:text-5xl font-bold tracking-wider text-white">
                                        {{ $model->name }}
                                    </h1>

                                    <p class="mt-6 text-lg sm:text-xl md:text-2xl font-bold tracking-wider text-gray-200">{{ $model->user->phone }}</p>

                                    <a class="block mt-3 text-lg sm:text-xl md:text-2xl font-bold tracking-wider text-gray-200" href="mailto:{{$model->user->email}}">{{ $model->user->email }}</a>

                                    <p class="mt-6 text-lg sm:text-xl md:text-2xl font-bold tracking-wider text-white">{{ __("Address") }}</p>

                                    <div class="mt-2">
                                        <span class="block text-base sm:text-lg md:text-xl font-semibold tracking-wider text-gray-200">{{ $model->address }}</span>
                                        <span class="block text-base sm:text-lg md:text-xl font-semibold tracking-wider text-gray-200">{{ $model->city }}</span>
                                        <span class="block text-base sm:text-lg md:text-xl font-semibold tracking-wider text-gray-200">{{ $model->country }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block md:col-span-12 lg:col-span-7 bg-white" x-data="{showCalendar: true}" >
                        <div class="px-6 md:my-8 lg:my-24 w-full " x-show="showCalendar" style="display: none">
                            <div class="px-4 py-10">
                                <div class="text-center">
                                    <h2 class="uppercase text-4xl sm:text-5xl md:text-6xl font-bold tracking-wider text-indigo-800">
                                        {{ __("Calendar") }}
                                    </h2>
                                    <p class="mt-4 text-lg font-semibold tracking-wider text-indigo-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi eligendi minima quae quam sint voluptas.</p>
                                </div>
                            </div>
                            <div class="px-4 py-4 bg-white">
                                <livewire:calendar :model="$model" type="App\Models\Doctor" class="text-indigo-500" wire:key="'calendar-doctor-{{$model->id}}'" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if( ! (Auth::check() && Auth::user()->hasAnyRole(["doctor", "laboratory"])) )
            @livewire("appointment.create-appointment", compact("type", "model"))
        @endif
    </div>
</x-static-layout>
