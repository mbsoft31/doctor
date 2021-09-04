<x-jet-form-section submit="updateLaboratoryProfileInformation">
    <x-slot name="title">
        {{ __('Personal Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s personal information.') }}
    </x-slot>

    <x-slot name="form">
        {{--first_name--}}
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="address" value="{{ __('Address') }}" />
            <x-jet-input id="address" type="text" class="mt-1 block w-full" wire:model.defer="state.address" autocomplete="address" />
            <x-jet-input-error for="address" class="mt-2" />
        </div>
        {{--city--}}
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="city" value="{{ __('City') }}" />
            <x-jet-input id="city" type="text" class="mt-1 block w-full" wire:model.defer="state.city" autocomplete="city" />
            <x-jet-input-error for="city" class="mt-2" />
        </div>
        {{--zip--}}
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="zip" value="{{ __('zip') }}" />
            <x-jet-input id="zip" type="text" class="mt-1 block w-full" wire:model.defer="state.zip" autocomplete="zip" />
            <x-jet-input-error for="zip" class="mt-2" />
        </div>
        {{--country--}}
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="country" value="{{ __('Country') }}" />
            <select wire:model.defer="state.last_name" id="country" name="country" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <option value="DZ" selected>{{ __("Algeria") }}</option>
            </select>
            <x-jet-input-error for="country" class="mt-2" />
        </div>
        {{--speciality_id--}}
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="speciality_id" value="{{ __('Speciality') }}" />
            <select wire:model.defer="state.speciality_id" id="speciality_id" name="speciality_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                @foreach(\App\Models\Speciality::all() as $speciality)
                    @if(isset($state["speciality_id"]) && $state["speciality_id"] == $speciality->id)
                        <option value="{{ $speciality->id }}" selected>{{ $speciality->name }}</option>
                    @else
                        <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                    @endif
                @endforeach
            </select>
            <x-jet-input-error for="speciality_id" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
