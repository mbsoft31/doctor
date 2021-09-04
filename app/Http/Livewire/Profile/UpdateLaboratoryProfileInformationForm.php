<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateLaboratoryProfileInformationForm extends Component
{

    use WithFileUploads;

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];

    /**
     * The new avatar for the user.
     *
     * @var mixed
     */
    public $photo;

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount()
    {
        $this->state = Auth::user()->laboratory->withoutRelations()->toArray();
    }

    /**
     * Update the user's profile information.
     *
     * @param  \Laravel\Fortify\Contracts\UpdatesUserProfileInformation  $updater
     * @return void
     */
    public function updateLaboratoryProfileInformation()
    {
        $this->resetErrorBag();
        $validated_inputs = Validator::make($this->state, [
            "name" => ['required', 'string'],
            "address" => ['required', 'string'],
            "city" => ['required', 'string'],
            "zip" => ['required', 'string'],
            "country" => ['required', 'string'],
            "user_id" => ['required','integer', 'exists:users,id'],
            "speciality_id" => ['required','integer', 'exists:specialities,id'],
            "metas" => "array",
        ])->validate();

        Auth::user()->laboratory()->update($validated_inputs);

        $this->emit('saved');

        $this->emit('refresh-navigation-menu');
    }

    /**
     * Delete user's profile photo.
     *
     * @return void
     */
    public function deleteProfilePhoto()
    {
        Auth::user()->deleteProfilePhoto();

        $this->emit('refresh-navigation-menu');
    }

    /**
     * Get the current user of the application.
     *
     * @return mixed
     */
    public function getUserProperty()
    {
        return Auth::user();
    }

    public function render()
    {
        return view('laboratory.profile.update-laboratory-profile-information-form');
    }
}
