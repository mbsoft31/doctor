<div>

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('All Roles') }}
            </h2>
        </div>
    </header>

    <x-jet-banner />

    <livewire:role.edit :inline="true" :show="false" />
    <livewire:role.delete :inline="true" :show="false" />

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6 sm:mt-8 md:mt-12">
        <div class="mt-10 sm:mt-0 space-y-3">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">
                            {{ __("All Roles") }}
                        </h3>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("You can navigate all roles and updates them.") }}
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="bg-white">
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        {{ __("Name") }}
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        {{ __("Guard name") }}
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        {{ __("Permissions") }}
                                                    </th>
                                                    @can("update role")
                                                    <th scope="col" class="relative px-6 py-3">
                                                        <span class="sr-only">{{ __("Edit") }}</span>
                                                    </th>
                                                    @endcan
                                                    @can("delete role")
                                                    <th scope="col" class="relative px-6 py-3">
                                                        <span class="sr-only">{{ __("Delete") }}</span>
                                                    </th>
                                                    @endcan
                                                </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                @foreach($roles as $role)
                                                    <tr>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="flex items-center">
                                                                <div class="text-sm font-medium text-gray-900">
                                                                    {{ $role->name }}
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="flex items-center">
                                                                <div class="text-sm font-medium text-gray-900">
                                                                    {{ $role->guard_name }}
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="flex flex-wrap gap-1.5 items-center">
                                                                @foreach($role->permissions as $permission)
                                                                    <div class="text-sm font-medium text-gray-900">
                                                                        <span class="inline-block px-2 py-1.5 text-xs bg-gray-100 rounded-full">{{$permission->name}}</span>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </td>
                                                        @can("update role")
                                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-4">
                                                                <button wire:click="$emit('updateRole', {{$role}})" class="text-indigo-600 hover:text-indigo-900">Edit</button>
                                                            </td>
                                                        @endcan
                                                        @can("delete role")
                                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-4">
                                                                <button wire:click="$emit('deleteRole', {{$role}})" class="text-red-600 hover:text-red-900">Delete</button>
                                                            </td>
                                                        @endcan
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
