<?php

declare(strict_types=1);


namespace App\Http\Livewire\Profile;


use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdatePaymentInformation extends Component
{

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount()
    {
        $user = Auth::user();
        if ($user->hasRole("laboratory")) {
            $this->state = $user->laboratory->metas;
        }

        if ($user->hasRole("doctor")) {
            $this->state = $user->doctor->metas;
        }

        if (!isset($this->state["days_off"]))
        {
            $this->state["days_off"] = [];
        }
    }

    /**
     * Update the user's profile information.
     *
     * @param  \Laravel\Fortify\Contracts\UpdatesUserProfileInformation  $updater
     * @return void
     */
    public function updatePaymentInformation()
    {
        $this->resetErrorBag();
        $validated_inputs = Validator::make($this->state, [
            "RIB" => ['nullable', 'string', 'min:20', 'max:20'],
            "employee_number" => ['nullable', 'string'],
            "days_off" => ['array'],
        ])->validate();

        $user = Auth::user();
        if ($user->hasRole("laboratory")) {
            $model = $user->laboratory;
        }

        if ($user->hasRole("doctor")) {
            $model = $user->doctor;
        }

        foreach ($validated_inputs as $key => $value)
        {
            $model->addMeta($key, $value);
        }

        $this->emit('saved');

        $this->emit('refresh-navigation-menu');
    }

    public function render()
    {
        return view('profile.update-payment-information');
    }

}
