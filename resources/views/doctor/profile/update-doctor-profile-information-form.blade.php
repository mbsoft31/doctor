<x-jet-form-section submit="updateDoctorProfileInformation">
    <x-slot name="title">
        {{ __('Personal Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s personal information.') }}
    </x-slot>

    <x-slot name="form">
        {{--first_name--}}
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="first_name" value="{{ __('First name') }}" />
            <x-jet-input id="first_name" type="text" class="mt-1 block w-full" wire:model.defer="state.first_name" autocomplete="first_name" />
            <x-jet-input-error for="first_name" class="mt-2" />
        </div>
        {{--last_name--}}
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="last_name" value="{{ __('Last name') }}" />
            <x-jet-input id="last_name" type="text" class="mt-1 block w-full" wire:model.defer="state.last_name" autocomplete="last_name" />
            <x-jet-input-error for="last_name" class="mt-2" />
        </div>
        {{--gender--}}

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="gender" value="{{ __('Gender') }}" />
            <select wire:model.defer="state.gender" id="gender" name="gender" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <option value="male" selected>{{ __("Male") }}</option>
                <option value="female">{{ __("Female") }}</option>
            </select>
            <x-jet-input-error for="gender" class="mt-2" />
        </div>
        {{--birthdate--}}
        {{--birth_place--}}
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="birth_place" value="{{ __('Birth place') }}" />
            <x-jet-input id="birth_place" type="text" class="mt-1 block w-full" wire:model.defer="state.birth_place" autocomplete="birth_place" />
            <x-jet-input-error for="birth_place" class="mt-2" />
        </div>
        {{--address--}}
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="address" value="{{ __('Address') }}" />
            <x-jet-input id="address" type="text" class="mt-1 block w-full" wire:model.defer="state.address" autocomplete="address" />
            <x-jet-input-error for="address" class="mt-2" />
        </div>
        {{--city--}}
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
