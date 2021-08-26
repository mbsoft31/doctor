<div>
    <div class="flex flex-wrap sm:flex-nowrap gap-3 py-6 sm:py-10 md:py-12">

        <div class="w-full md:w-1/3 mx-auto md:mx-0 bg-transparent">

            <div class="mx-auto w-40 h-40 md:w-48 md:h-48 border shadow-sm rounded-full overflow-hidden">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    @if( $doctor->profile_photo_url )
                        <img class="w-full h-full object-cover" src="{{ $doctor->profile_photo_url }}" alt="avatar">
                    @else
                        <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    @endif
                @endif
            </div>

            <div class="-mt-6 py-10 px-4 bg-white rounded-md border shadow">
                <div class="text-center text-xl font-semibold tracking-wide">
                    <span>Dr. </span>{{ $doctor->name }}
                </div>
                <div class="mt-4">
                    <div class="flex items-baseline mt-2">
                        <div class="w-32 text-gray-500 text-base">
                            {{ __('Speciality') }}
                        </div>
                        <div class=" text-sm text-gray-700">
                            {{ $doctor->speciality }}
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="w-full md:w-2/3 mx-auto md:mx-0">

            <div class="py-6 px-4">
                    <span class="pb-2 border-b-2 border-gray-400 text-gray-500 text-sm font-semibold tracking-wide leading-8">
                        {{ __("Contact informations") }}
                    </span>
            </div>

            <div class="w-full rounded-lg shadow-inner shadow-md overflow-hidden">
                <img class="w-full h-full object-cover" src="https://www.dsdinc.com/wp-content/uploads/2017/08/map-placeholder.jpg" alt="map">
            </div>

            <div class="py-6 px-4">
                    <span class="pb-2 border-b-2 border-gray-400 text-gray-500 text-sm font-semibold tracking-wide leading-8">
                        {{ __("Contact informations") }}
                    </span>
            </div>

            <div class="m-0 px-6 py-4 bg-white rounded-md shadow-md">
                <div>
                    <div class="flex items-baseline mt-2">
                        <div class="w-32 text-gray-500 text-base">
                            {{ __('Mail') }}
                        </div>
                        <div class=" text-sm text-gray-700">
                            {{ $doctor->email }}
                        </div>
                    </div>
                    <div class="flex items-baseline mt-2">
                        <div class="w-32 text-gray-500 text-base">
                            {{ __('Phone') }}
                        </div>
                        <div class=" text-sm text-gray-700">
                            {{ $doctor->phone }}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
