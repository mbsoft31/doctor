<div x-data="{show: @entangle('show')}">
    <div>
        <button @click="show = true" type="button" class="block px-6 py-2 border rounded-md shadow-sm text-center font-semibold tracking-wide text-white bg-red-400 hover:text-white hover:bg-red-600">
            {{ _("Cancel appointment") }}
        </button>
    </div>

    <div x-show="show" class="fixed inset-0" style="display:none; z-index: 1001">
        <div class="absolute inset-0 bg-gray-900 bg-opacity-25" style="z-index: 1002"></div>
        <div class="absolute inset-0 flex items-center justify-center" style="z-index: 1003">
            <div @click.away="show = false" class="max-w-xl w-full divide-y divide-dashed divide-gray-200 border rounded-lg shadow-lg bg-white">

                <header class="px-6 py-4 underline text-red-500">
                    Cancel Reservation
                </header>

                <main class="px-6 py-4">
                    <div class="space-y-4">
                        <div>
                            {{ __("Are you sure want to cancel this appointment ?") }}
                        </div>
                    </div>
                </main>

                <footer class="px-6 py-4 flex justify-end">
                    <button wire:click="cancel" class="px-4 py-2 bg-red-500 text-gray-50 hover:text-white hover:bg-red-700">
                        {{ __("Cancel") }}
                    </button>
                </footer>
            </div>
        </div>
    </div>
</div>
