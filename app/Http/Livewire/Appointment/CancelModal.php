<?php

namespace App\Http\Livewire\Appointment;

use App\Mail\AppointmentCanceled;
use App\Models\Appointment;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class CancelModal extends Component
{

    public Appointment $appointment;

    public $state;

    public $show = false;

    protected $rules = [];

    public function cancel()
    {
        $this->appointment->state = "canceled";
        $this->appointment->save();

        Mail::to($this->appointment->patient->user)->send(new AppointmentCanceled($this->appointment, $this->appointment->patient->user));
        Mail::to($this->appointment->appointment_at->user)->send(new AppointmentCanceled($this->appointment, $this->appointment->appointment_at->user));

        $this->show = false;
        $this->emit("appointmentCanceled");
        $this->render();
    }

    public function render()
    {
        return view('livewire.appointment.cancel-modal');
    }
}
