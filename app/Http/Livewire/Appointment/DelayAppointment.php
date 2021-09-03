<?php

namespace App\Http\Livewire\Appointment;

use App\Models\Appointment;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class DelayAppointment extends Component
{

    public $model;
    public $type;

    public $appointment;
    public $date;
    public $time;

    public $show = false;

    public $times = [];

    protected $listeners = [
        "appointmentDelayed" => 'render',
    ];

    public function mount()
    {
        $this->date = $this->appointment->date;
        $this->time = $this->appointment->time;

        $this->times = $this->calculate($this->date);
    }

    public function delayAppointment()
    {
        $data = [
            "date" => $this->date,
            "time" => $this->time,
        ];

        $inputs = Validator::make($data, [
            "date" => ["required", "date"],
            "time" => ["required", "string"],
        ])->validate();

        $this->appointment->date = $inputs["date"];
        $this->appointment->time = $inputs["time"];

        $this->appointment->save();

        $this->show = false;
        $this->emit("appointmentDelayed");
    }

    public function updatedDate()
    {
        $this->times = $this->calculate($this->date);
    }

    public function appointmentsOf()
    {
        return Appointment::where("appointment_at_id", $this->model->id)
            ->where("appointment_at_type", $this->type)
            ->whereDate("date", $this->date)
            ->get();
    }

    public function calculate($date): array
    {
        $defaultWorkingHours = ["08:00", "08:30", "09:00", "09:30", "10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30", "17:00", "17:30"];
        //$workingTimes = [ "10:00", "10:30", "11:00", "11:30", "12:00", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30" ];
        $workingTimes = $defaultWorkingHours;
        //$reservedTimes = [ "10:30", "11:00", "15:00", "12:00" ];
        $reservedTimes = $this->appointmentsOf()->pluck("time")->flatten()->toArray();
        $availableTimes = [];

        foreach ($workingTimes as $time)
        {
            $availableTimes[] = [
                "date" => $date,
                "text" => $time,
                "is_reserved" => collect($reservedTimes)->contains($time),
                "is_disabled" => ! collect($workingTimes)->contains($time),
            ];
        }

        return $availableTimes;
    }

    public function render()
    {
        return view('livewire.appointment.delay-appointment');
    }
}
