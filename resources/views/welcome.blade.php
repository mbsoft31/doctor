<x-static-layout>

    <div class="w-full bg-indigo-700">
        <div class="max-w-7xl mx-auto h-full">
            <div class="flex items-center md:flex md:items-end px-6 py-12 h-full">

                <div class="w-full sm:w-full md:w-2/3 text-center md:text-left">
                    <div>
                        <svg class="w-32 h-32 text-white mx-auto md:m-0" fill="currentColor" viewBox="0 0 512 512"><path d="M447.1 112c-34.2.5-62.3 28.4-63 62.6-.5 24.3 12.5 45.6 32 56.8V344c0 57.3-50.2 104-112 104-60 0-109.2-44.1-111.9-99.2C265 333.8 320 269.2 320 192V36.6c0-11.4-8.1-21.3-19.3-23.5L237.8.5c-13-2.6-25.6 5.8-28.2 18.8L206.4 35c-2.6 13 5.8 25.6 18.8 28.2l30.7 6.1v121.4c0 52.9-42.2 96.7-95.1 97.2-53.4.5-96.9-42.7-96.9-96V69.4l30.7-6.1c13-2.6 21.4-15.2 18.8-28.2l-3.1-15.7C107.7 6.4 95.1-2 82.1.6L19.3 13C8.1 15.3 0 25.1 0 36.6V192c0 77.3 55.1 142 128.1 156.8C130.7 439.2 208.6 512 304 512c97 0 176-75.4 176-168V231.4c19.1-11.1 32-31.7 32-55.4 0-35.7-29.2-64.5-64.9-64zm.9 80c-8.8 0-16-7.2-16-16s7.2-16 16-16 16 7.2 16 16-7.2 16-16 16z"/></svg>
                    </div>
                    <h1 class="mt-10 text-5xl sm:text-6xl md:text-7xl font-bold tracking-wider text-white">Medical Library</h1>
                    <p class="mt-6 text-sm sm:text-base md:text-lg font-semibold tracking-wide text-gray-100">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias consequatur debitis excepturi expedita impedit natus nobis, odio quidem unde vero.
                    </p>
                </div>

            </div>
        </div>
    </div>

    <div class="w-full">
        <div class="max-w-7xl mx-auto h-full">
            <div class="px-6 py-16 h-full">

                <div class="w-2/3 mx-auto text-center">
                    <h2 class="text-5xl font-bold tracking-wider text-gray-800">
                        {{ __("What are you looking for?") }}
                    </h2>
                    <p class="mt-8 text-sm sm:text-base md:text-lg font-semibold tracking-wide text-gray-500">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda eaque error esse eum fugit laboriosam laborum molestiae natus nisi nulla numquam obcaecati officia, repellat saepe temporibus totam veniam! Exercitationem, facilis.
                    </p>
                </div>

                <div class="my-16 w-full grid grid-cols-1 md:grid-cols-2 items-center justify-center gap-4">
                    <a href="{{ route("doctor.search") }}" class="block w-full md:w-96 m-auto px-10 py-10 border border-indigo-100 rounded-lg shadow bg-white hover:bg-indigo-50">
                        <div class="text-center">
                            <div class="">
                                <svg class="w-20 h-20 m-auto text-indigo-600" fill="currentColor" viewBox="0 0 576 512"><path d="M288 115L69.47 307.71c-1.62 1.46-3.69 2.14-5.47 3.35V496a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V311.1c-1.7-1.16-3.72-1.82-5.26-3.2zm96 261a8 8 0 0 1-8 8h-56v56a8 8 0 0 1-8 8h-48a8 8 0 0 1-8-8v-56h-56a8 8 0 0 1-8-8v-48a8 8 0 0 1 8-8h56v-56a8 8 0 0 1 8-8h48a8 8 0 0 1 8 8v56h56a8 8 0 0 1 8 8zm186.69-139.72l-255.94-226a39.85 39.85 0 0 0-53.45 0l-256 226a16 16 0 0 0-1.21 22.6L25.5 282.7a16 16 0 0 0 22.6 1.21L277.42 81.63a16 16 0 0 1 21.17 0L527.91 283.9a16 16 0 0 0 22.6-1.21l21.4-23.82a16 16 0 0 0-1.22-22.59z"/></svg>
                            </div>
                            <h3 class="mt-8 text-2xl font-bold tracking-wide text-gray-800">
                                {{ __("Looking for a Doctor") }}
                            </h3>
                            <p class="mt-4 text-sm text-gray-600 whitespace-normal">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, nisi.
                            </p>
                        </div>
                    </a>
                    <a href="{{ route("laboratory.search") }}" class="block w-full md:w-96 m-auto px-10 py-10 border border-indigo-100 rounded-lg shadow bg-white hover:bg-indigo-50">
                        <div class="text-center">
                            <div class="">
                                <svg class="w-20 h-20 m-auto text-indigo-600" fill="currentColor" viewBox="0 0 448 512"><path d="M302.5 512c23.18 0 44.43-12.58 56-32.66C374.69 451.26 384 418.75 384 384c0-36.12-10.08-69.81-27.44-98.62L400 241.94l9.38 9.38c6.25 6.25 16.38 6.25 22.63 0l11.3-11.32c6.25-6.25 6.25-16.38 0-22.63l-52.69-52.69c-6.25-6.25-16.38-6.25-22.63 0l-11.31 11.31c-6.25 6.25-6.25 16.38 0 22.63l9.38 9.38-39.41 39.41c-11.56-11.37-24.53-21.33-38.65-29.51V63.74l15.97-.02c8.82-.01 15.97-7.16 15.98-15.98l.04-31.72C320 7.17 312.82-.01 303.97 0L80.03.26c-8.82.01-15.97 7.16-15.98 15.98l-.04 31.73c-.01 8.85 7.17 16.02 16.02 16.01L96 63.96v153.93C38.67 251.1 0 312.97 0 384c0 34.75 9.31 67.27 25.5 95.34C37.08 499.42 58.33 512 81.5 512h221zM120.06 259.43L144 245.56V63.91l96-.11v181.76l23.94 13.87c24.81 14.37 44.12 35.73 56.56 60.57h-257c12.45-24.84 31.75-46.2 56.56-60.57z"/></svg>
                            </div>
                            <h3 class="mt-8 text-2xl font-bold tracking-wide text-gray-800">
                                {{ __("Looking for a Laboratory") }}
                            </h3>
                            <p class="mt-4 text-sm text-gray-600 whitespace-normal">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, nisi.
                            </p>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>

</x-static-layout>
