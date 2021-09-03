<?php

namespace App\Http\Livewire\Appointment;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SelectCardList extends Component
{

    public $appointment_id;
    public $date;

    protected $queryString = [
        "appointment_id",
        "date"
    ];

    protected $listeners = [
        "dateUpdated" => '$refresh',
        "appointmentDelayed" => '$refresh',
    ];

    public function updatedDate()
    {
        $this->emit("dateUpdated", $this->date);
    }

    public function select($id)
    {
        $this->appointment_id = $id;

        $this->emit("appointmentSelected", $this->appointment_id);
    }

    public function query()
    {
        if (Auth::user()->hasRole("doctor"))
            $query = Auth::user()->doctor->appointments();
        if (Auth::user()->hasRole("patient"))
            $query = Auth::user()->patient->appointments();
        if (Auth::user()->hasRole("laboratory"))
            $query = Auth::user()->laboratory->appointments();
        if (isset($this->date) && ! is_null($this->date))
            $query->where("date", $this->date);
        $query->orderBy("appointments.date")->orderBy("appointments.time");
        return $query;
    }

    public function render()
    {
        $appointments = $this->query()->get();

        return view('livewire.appointment.select-card-list', [
            "appointments" => $appointments,
        ]);
    }
}
