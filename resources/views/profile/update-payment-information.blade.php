<x-jet-form-section submit="updatePaymentInformation">
    <x-slot name="title">
        {{ __('Payment Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s payment information.') }}
    </x-slot>

    <x-slot name="form">
        {{--first_name--}}
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="RIB" value="{{ __('RIB') }}" />
            <x-jet-input id="RIB" type="text" class="mt-1 block w-full" wire:model.defer="state.RIB" autocomplete="RIB" />
            <x-jet-input-error for="RIB" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="employee_number" value="{{ __('Employee number') }}" />
            <x-jet-input id="employee_number" type="text" class="mt-1 block w-full" wire:model.defer="state.employee_number" autocomplete="employee_number" />
            <x-jet-input-error for="employee_number" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="days_off" value="{{ __('Days off') }}" />
            <div id="days_off" class="flex flex-col space-y-4">
                <label for="check-sunday">
                    <input wire:model="state.days_off"type="checkbox" id="check-SUNDAY" value="{{ \Carbon\Carbon::SUNDAY }}">
                    <span>
                        {{ __("SUNDAY") }}
                    </span>
                </label>
                <label for="check-sunday">
                    <input wire:model="state.days_off" type="checkbox" id="check-MONDAY" value="{{ \Carbon\Carbon::MONDAY }}">
                    <span>
                        {{ __("MONDAY") }}
                    </span>
                </label>
                <label for="check-sunday">
                    <input wire:model="state.days_off" type="checkbox" id="check-TUESDAY" value="{{ \Carbon\Carbon::TUESDAY }}">
                    <span>
                        {{ __("TUESDAY") }}
                    </span>
                </label>
                <label for="check-sunday">
                    <input wire:model="state.days_off" type="checkbox" id="check-WEDNESDAY" value="{{ \Carbon\Carbon::WEDNESDAY }}">
                    <span>
                        {{ __("WEDNESDAY") }}
                    </span>
                </label>
                <label for="check-sunday">
                    <input wire:model="state.days_off" type="checkbox" id="check-THURSDAY" value="{{ \Carbon\Carbon::THURSDAY }}">
                    <span>
                        {{ __("THURSDAY") }}
                    </span>
                </label>
                <label for="check-sunday">
                    <input wire:model="state.days_off" type="checkbox" id="check-FRIDAY" value="{{ \Carbon\Carbon::FRIDAY }}">
                    <span>
                        {{ __("FRIDAY") }}
                    </span>
                </label>
                <label for="check-sunday">
                    <input wire:model="state.days_off" type="checkbox" id="check-SATURDAY" value="{{ \Carbon\Carbon::SATURDAY }}">
                    <span>
                        {{ __("SATURDAY") }}
                    </span>
                </label>
            </div>
            <x-jet-input-error for="days_off" class="mt-2" />
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
