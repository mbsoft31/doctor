<x-guest-layout>

    <x-jet-authentication-card x-data="{account_type: 'patient', selected: 'account_type', isSelected(name) {return this.selected == name;}}">
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
            <div class="w-full mt-4 py-4">
                <div class="wizard flex">
                    <!-- Step account_type -->
                    <div @click="selected = 'account_type'" class="wizard__step flex-1 cursor-pointer">
                        <div class="wizard__dot flex items-center justify-center">
                            <!-- The left connector -->
                            <div class="wizard__connector flex-1 h-1 bg-indigo-900 bg-opacity-50"></div>

                            <!-- The step number -->
                            <div :class="{'text-white bg-indigo-600 border-indigo-900': isSelected('account_type'), 'bg-indigo-200 border-indigo-300': !isSelected('account_type')}" class="wizard__number flex items-center justify-center border rounded-full h-10 w-10 mx-2">
                                <span class="text-sm font-semibold">1</span>
                            </div>

                            <!-- The right connector -->
                            <div class="wizard__connector flex-1 h-1 bg-indigo-900 bg-opacity-50"></div>
                        </div>

                        <div class="pt-2 text-center text-sm font-semibold tracking-wide text-gray-600 ">
                            {{ __("Account type") }}
                        </div>
                    </div>
                    <!-- Step -->
                    <div @click="selected = 'account_credential'" class="wizard__step flex-1 cursor-pointer">
                        <div class="wizard__dot flex items-center justify-center">
                            <!-- The left connector -->
                            <div class="wizard__connector flex-1 h-1 bg-indigo-900 bg-opacity-50"></div>

                            <!-- The step number -->
                            <div :class="{'text-white bg-indigo-600 border-indigo-900': isSelected('account_credential'), 'bg-indigo-200 border-indigo-300': !isSelected('account_credential')}" class="wizard__number flex items-center justify-center border rounded-full h-10 w-10 mx-2">
                                <span class="text-sm font-semibold">2</span>
                            </div>

                            <!-- The right connector -->
                            <div class="wizard__connector flex-1 h-1 bg-indigo-900 bg-opacity-50"></div>
                        </div>

                        <div class="pt-2 text-center text-sm font-semibold tracking-wide text-gray-600">
                            {{ __("Account information") }}
                        </div>
                    </div>
                    <!-- Step -->
                    <div @click="selected = 'personal_info'" class="wizard__step flex-1 cursor-pointer">
                        <div class="wizard__dot flex items-center justify-center">
                            <!-- The left connector -->
                            <div class="wizard__connector flex-1 h-1 bg-indigo-900 bg-opacity-50"></div>

                            <!-- The step number -->
                            <div :class="{'text-white bg-indigo-600 border-indigo-900': isSelected('personal_info'), 'bg-indigo-200 border-indigo-300': !isSelected('personal_info')}" class="wizard__number flex items-center justify-center border rounded-full h-10 w-10 mx-2">
                                <span class="text-sm font-semibold">3</span>
                            </div>

                            <!-- The right connector -->
                            <div class="wizard__connector flex-1 h-1 bg-indigo-900 bg-opacity-50"></div>
                        </div>

                        <div class="pt-2 text-center text-sm font-semibold tracking-wide text-gray-600 ">
                            {{ __("Personal information") }}
                        </div>
                    </div>

                </div>
            </div>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mt-4" x-show="isSelected('account_type')" style="display: none;" x-ref="account_type">

                <input type="hidden" id="account_type" name="account_type" x-bind:value="account_type">

                <div>
                    <div @click="account_type = 'patient'" :class="{'bg-indigo-500': account_type == 'patient'}" class="w-full rounded-md px-6 py-4 bg-white cursor-pointer">
                        <span :class="{'text-white': account_type == 'patient'}" class="uppercase text-lg font-bold tracking-wider">{{ __("Patient") }}</span>
                    </div>
                </div>

                <div class="mt-4">
                    <div @click="account_type = 'doctor'" :class="{'bg-indigo-500': account_type == 'doctor'}" class="w-full rounded-md px-6 py-4 bg-white cursor-pointer">
                        <span :class="{'text-white': account_type == 'doctor'}" class="uppercase text-lg font-bold tracking-wider">{{ __("Doctor") }}</span>
                    </div>
                </div>

                <div class="mt-4">
                    <div @click="account_type = 'laboratory'" :class="{'bg-indigo-500': account_type == 'laboratory'}" class="w-full rounded-md px-6 py-4 bg-white cursor-pointer">
                        <span :class="{'text-white': account_type == 'laboratory'}" class="uppercase text-lg font-bold tracking-wider">{{ __("Laboratory") }}</span>
                    </div>
                </div>
            </div>

            <div class="mt-4" x-show="isSelected('personal_info')" style="display: none;" x-ref="personal_info">
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
                    <x-jet-label for="gender" value="{{ __('Last name') }}" />
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
            </div>

            {{--<div class="border-b border-gray-300 mt-4"></div>--}}

            <div class="mt-4" x-show="isSelected('account_credential')" style="display: none;" x-ref="account_credential">
                <div>
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{old('email')}}" />
                    <x-jet-input-error for="email" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="phone" value="{{ __('Phone') }}" />
                    <x-jet-input id="phone" class="block mt-1 w-full" type="email" name="phone" value="{{old('phone')}}" />
                    <x-jet-input-error for="phone" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="new-password" />
                    <x-jet-input-error for="password" class="mt-2" />
                </div>
            </div>

            <div>
                <template x-if="isSelected('account_type')">
                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button @click="selected = 'account_credential'" type="button" class="block bg-gray-500 text-white">
                            <span>{{ __('Account informations') }}</span> &nbsp;
                            <span class="text-lg">&raquo;</span>
                        </x-jet-button>
                    </div>
                </template>

                <template x-if="isSelected('account_credential')">
                    <div class="flex items-center justify-between mt-4">
                        <x-jet-button @click="selected = 'account_type'" type="button" class="block bg-gray-500 text-white">
                            <span class="text-lg">&laquo;</span> &nbsp;
                            <span>{{ __('Account type') }}</span>
                        </x-jet-button>
                        <x-jet-button @click="selected = 'personal_info'" type="button" class="block bg-gray-500 text-white">
                            {{ __('Personal information') }} &nbsp;
                            <span class="text-lg">&raquo;</span>
                        </x-jet-button>
                    </div>
                </template>

                <template x-if="isSelected('personal_info')">
                    <div class="flex items-center justify-between mt-4">
                        <x-jet-button @click="selected = 'account_credential'" type="button" class="block bg-gray-500 text-white">
                            <span class="text-lg">&laquo;</span> &nbsp;
                            {{ __('Account information') }}
                        </x-jet-button>
                        <x-jet-button type="submit" class="block bg-blue-800 text-white hover:bg-blue-700 active:bg-blue-900 focus:border-blue-900 focus:ring-blue-300">
                            <span class="text-lg">&nbsp;</span>
                            <span>{{ __('Register') }}</span>
                        </x-jet-button>
                    </div>
                </template>

            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>
        </form>
    </x-jet-authentication-card>

    @push("styles")
        <style>

        </style>
    @endpush
</x-guest-layout>
