<div>

    @if($show)
        @if( ! $inline )
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Edit Role') }}
                    </h2>
                </div>
            </header>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6 sm:mt-8 md:mt-12">
            <div class="mt-10 sm:mt-0 space-y-3">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">
                                {{ __("Edit Role") }}
                            </h3>
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Edit role name and guard (default guard web)") }}
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form wire:submit.prevent="save">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="name" class="block text-sm font-medium text-gray-700">{{ __("Role name") }}</label>
                                            <x-input.text id="name" wire:model="state.name" class="mt-1" />
                                            <x-input.error for="state.name" />
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="guard_name" class="block text-sm font-medium text-gray-700">{{ __("Guard name") }}</label>
                                            <x-input.text id="guard_name" wire:model="state.guard_name" class="mt-1" />
                                            <x-input.error for="state.guard_name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6 space-x-2">
                                    <button wire:click="$emit('cancel')" type="button" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                        {{ __("Cancel") }}
                                    </button>
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        {{ __("Save") }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
