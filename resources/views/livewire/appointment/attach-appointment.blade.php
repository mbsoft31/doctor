<div x-data="{attachment: @entangle('show_attachement'), show: @entangle('show')}">
    <div>
        <button @click="show = true" type="button"
                class="block px-6 py-2 border rounded-md shadow-sm text-center font-semibold tracking-wide text-white bg-green-400 hover:text-white hover:bg-green-600">
            {{ _("Add attachment") }}
        </button>
    </div>


    <div x-show="show" class="fixed inset-0" style="display:none; z-index: 1001">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-25" style="z-index: 1002"></div>
        <div class="absolute inset-0 flex items-center justify-center" style="z-index: 1003">
            <div {{--@click.away="show = false"--}} class="max-w-2xl w-full divide-y divide-dashed divide-gray-200 border rounded-lg shadow-lg bg-white">

                <form action="#" wire:submit.stop="render">
                    <header class="px-6 py-4">
                        <div
                            class="inline-block text-xl font-semibold tracking-wide text-indigo-900 py-4 border-b-2 border-indigo-600 ">
                            {{ __("Add an attachment") }}
                        </div>
                    </header>

                    <main x-data="{photoName: null, photoPreview: null}" class="px-6 py-4">
                        <main class="py-6 px-4">
                            <div class="w-full">
                                <textarea wire:model.defer="content" name="content" id="content" rows="3" placeholder="Your content goes here" class="w-full text-xl text-gray-700 placeholder-gray-400 border-transparent rounded-md focus:ring-0 focus:border-transparent"></textarea>
                            </div>
                            <div x-show="attachment" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90" class="w-full" style="display: none;">
                                <div
                                    class="group relative flex items-center justify-center w-full h-32 border-4 border-dashed ">
                                    <input type="file" x-ref="photo" x-on:change="photoName = $refs.photo.files[0].name; const reader = new FileReader(); reader.onload = (e) => { photoPreview = e.target.result; }; reader.readAsDataURL($refs.photo.files[0]); " wire:model="media" name="media" id="media" placeholder="select a file to upload" class="absolute opacity-0 w-full h-full"/>
                                    <div class="inline-flex items-center space-x-4">
                                        <svg class="w-8 h-8 text-gray-400 group-hover:text-gray-600" fill="currentColor" viewBox="0 0 512 512"><path d="M464,128H272L208,64H48A48,48,0,0,0,0,112V400a48,48,0,0,0,48,48H464a48,48,0,0,0,48-48V176A48,48,0,0,0,464,128ZM359.5,296a16,16,0,0,1-16,16h-64v64a16,16,0,0,1-16,16h-16a16,16,0,0,1-16-16V312h-64a16,16,0,0,1-16-16V280a16,16,0,0,1,16-16h64V200a16,16,0,0,1,16-16h16a16,16,0,0,1,16,16v64h64a16,16,0,0,1,16,16Z"/></svg>
                                        <span class="font-semibold tracking-wider text-gray-400 group-hover:text-gray-600">Select a file to upload | JPG, PNG, DOC or PDF</span>
                                    </div>
                                </div>
                                <div>
                                    <x-input.error for="media" />
                                </div>
                            </div>
                        </main>
                        <footer class="">
                            <div class="mt-2" x-show="photoPreview">
                                <span class="block rounded-full w-20 h-20"
                                      x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                                </span>
                            </div>
                        </footer>
                    </main>

                    <footer class="px-6 py-4">
                        <div class="px-6 py-4 flex items-center gap-4 w-full">
                            <button type="button" @click="attachment = ! attachment" :class="{'bg-gray-100 text-gray-600 ring-2': attachment, 'text-gray-400 bg-gray-50': !attachment}" class="group inline-flex items-center space-x-4 px-4 py-2 border rounded-md ring-offset-2 ring-opacity-75 ring-gray-600 hover:ring-2">
                                <svg class="w-5 h-5 group-hover:text-gray-600" fill="currentColor" viewBox="0 0 448 512"><path d="M43.246 466.142c-58.43-60.289-57.341-157.511 1.386-217.581L254.392 34c44.316-45.332 116.351-45.336 160.671 0 43.89 44.894 43.943 117.329 0 162.276L232.214 383.128c-29.855 30.537-78.633 30.111-107.982-.998-28.275-29.97-27.368-77.473 1.452-106.953l143.743-146.835c6.182-6.314 16.312-6.422 22.626-.241l22.861 22.379c6.315 6.182 6.422 16.312.241 22.626L171.427 319.927c-4.932 5.045-5.236 13.428-.648 18.292 4.372 4.634 11.245 4.711 15.688.165l182.849-186.851c19.613-20.062 19.613-52.725-.011-72.798-19.189-19.627-49.957-19.637-69.154 0L90.39 293.295c-34.763 35.56-35.299 93.12-1.191 128.313 34.01 35.093 88.985 35.137 123.058.286l172.06-175.999c6.177-6.319 16.307-6.433 22.626-.256l22.877 22.364c6.319 6.177 6.434 16.307.256 22.626l-172.06 175.998c-59.576 60.938-155.943 60.216-214.77-.485z"/></svg>
                                <span class="hidden uppercase text-center text-sm font-semibold tracking-wide ">Add an attachment</span>
                            </button>
                        </div>
                        <div class="py-6 text-xl text-right">
                            <button wire:click="$emit('hideAttachmentForm')" type="button" class="px-6 py-2 rounded-lg shadow-md bg-gray-500 text-gray-50 hover:bg-gray-700 hover:text-white">{{ __("Cancel") }}</button>
                            <button wire:click="save()" type="button" class="px-6 py-2 rounded-lg shadow-md bg-green-500 text-gray-50 hover:bg-green-700 hover:text-white">{{ __("Add Attachement") }}</button>
                        </div>
                    </footer>
                </form>

            </div>
        </div>
    </div>


</div>
