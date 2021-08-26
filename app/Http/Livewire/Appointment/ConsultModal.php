<?php

namespace App\Http\Livewire\Appointment;

use App\Models\Appointment;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ConsultModal extends Component
{

    public Appointment $appointment;

    public $state;

    public $show = false;

    protected $rules = [
        "consult_in" => ["required", "in:in_place,online_meeting"],
        "meeting_url" => ["required_if:consult_in,online_meeting", "url"]
    ];

    public function mount()
    {
        $this->fill([
            "state.consult_in" => "in_place",
            "state.meeting_url" => "",
        ]);
    }

    public function consult()
    {
        $inputs = Validator::make($this->state, $this->rules)->validate();

        $this->appointment
            ->addMeta("consult_in", $this->state["consult_in"])
            ->addMeta("meeting_url", $this->state["meeting_url"]);

        $this->appointment->state = "consulted";
        $this->appointment->save();

        $this->emit("appointmentConsulted");
    }

    public function render()
    {
        return view('livewire.appointment.consult-modal');
    }
}
