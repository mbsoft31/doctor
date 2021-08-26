<x-static-layout>

    <div class="w-full bg-indigo-700">
        <div class="max-w-7xl mx-auto h-full">
            <div class="flex items-center md:flex md:items-end px-6 py-12 h-full">

                <div class="w-full sm:w-full md:w-2/3 text-center md:text-left">
                    <div>
                        <svg class="w-32 h-32 text-white mx-auto md:m-0" fill="currentColor" viewBox="0 0 512 512"><path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"/></svg>
                    </div>
                    <h1 class="mt-10 text-5xl sm:text-6xl md:text-7xl font-bold tracking-wider text-white">
                        {{ __("Doctor Search") }}
                    </h1>
                    <p class="mt-6 text-sm sm:text-base md:text-lg font-semibold tracking-wide text-gray-100">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias consequatur debitis excepturi expedita impedit natus nobis, odio quidem unde vero.
                    </p>
                </div>

            </div>
        </div>
    </div>

    <div class="w-full">
        @livewire("doctor.search")
    </div>

</x-static-layout>
