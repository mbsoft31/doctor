<?php

namespace App\Http\Livewire\Doctor;

use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Appointments extends Component
{

    public $attachment_form = false;

    protected $listeners = [
        "attachmentAdded",
        "attachmentDeleted" => '$refresh',
        "showAttachmentForm",
        "hideAttachmentForm",
    ];

    public function attachmentAdded()
    {
        $this->attachment_form = false;
        $this->render();
    }

    public function showAttachmentForm()
    {
        $this->attachment_form = true;
    }

    public function hideAttachmentForm()
    {
        $this->attachment_form = false;
    }

    public function render()
    {
        return view('doctor.appointment.appointments');
    }
}
