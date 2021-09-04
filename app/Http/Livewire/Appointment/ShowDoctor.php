<?php

namespace App\Http\Livewire\Appointment;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Livewire\Component;

class ShowDoctor extends Component
{
    public $appointment;
    public $appointment_id;

    public $attachment_form = false;

    protected $queryString = [
        "appointment_id",
    ];

    protected $listeners = [
        "appointmentDelayed" => '$refresh',
        "attachmentAdded" => '$refresh',
        "appointmentSelected",
        "hideAttachmentForm",
        "toggleAttachmentForm",
        "appointmentConsulted" => 'render',
    ];

    public function hideAttachmentForm()
    {
        $this->attachment_form = false;
    }

    public function toggleAttachmentForm()
    {
        $this->attachment_form = !$this->attachment_form;
    }

    public function appointmentSelected($appointment)
    {
        $this->appointment_id = $appointment;
        $this->appointment = Appointment::find($this->appointment_id);
    }

    public function mount(Request $request)
    {
        $this->appointment = Appointment::find($this->appointment_id);
    }

    public function render()
    {
        return view('livewire.appointment.show-doctor');
    }
}
