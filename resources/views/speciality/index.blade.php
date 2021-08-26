<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __("All Specialities") }}
    </x-slot>

    <x-slot name="description">
        {{ __("You can navigate all specialities and updates them.") }}
    </x-slot>

    <x-slot name="form">

        <div class="col-span-6">
            <div class="overflow-hidden min-w-full border-gray-200">
                <div class="pb-4 flex items-center">
                    <h2 class="flex-grow text-gray-700 font-semibold">
                        {{ __("Search for") }}
                    </h2>
                    <div class="w-2/3 flex items-center space-x-2">
                        <x-input.text id="search" class="w-full" wire:model="search" />
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-6">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __("Name") }}
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __("Description") }}
                                </th>
                                @can("update speciality")
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">{{ __("Edit") }}</span>
                                    </th>
                                @endcan
                                @can("delete speciality")
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">{{ __("Delete") }}</span>
                                    </th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($specialities as $speciality)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $speciality->name }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $speciality->description }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-4">
                                        @can("update speciality")<button wire:click="$emit('updateSpeciality', {{$speciality}})" class="text-indigo-600 hover:text-indigo-900">Edit</button>@endcan
                                        @can("delete speciality")<button wire:click="$emit('deleteSpeciality', {{$speciality}})" class="text-red-600 hover:text-red-900">Delete</button>@endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </x-slot>

    <x-slot name="actions">
        <div class="overflow-hidden border-b border-gray-200">
            <div class="px-6 py-2">
                {{ $specialities->links() }}
            </div>
        </div>
    </x-slot>
</x-jet-form-section>
