<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use Carbon\Carbon;
use Livewire\Component;

class Calendar extends Component
{

    public $model;
    public $type;

    public $date;
    public $time;

    public $times = [];
    public $days = [];

    protected $listeners = [
        "dateTimeUpdated" => '$refresh',
    ];

    public $class;

    public $currentDate;

    public $dayTimes = ["08:00", "08:30", "09:00", "09:30", "10:00", "10:30", "11:00", "11:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30", "17:00"];
    public $weekend = ["Friday", "Saturday"];

    public function updatedDate()
    {
        //$this->currentDate = Carbon::make($this->date);
        $this->days = $this->getWeek($this->currentDate);
        $this->emit("dateTimeUpdated");
    }

    public function getWeek(Carbon $start = null)
    {
        if (!$start)
            $start = Carbon::today();

        $days = [];
        for ( $i = 0; $i<5; $i++ )
        {
            $day = $start->clone()->addDays( $i );
            $days[] = $day;
        }

        $test = collect($days)->map(function ($day) {
            return [
                "date" => $day->format("Y-m-d"),
                "times" => $this->calculate($day),
            ];
        });

        return $test->toArray();
    }

    public function isWeekend($day)
    {
        return $day->dayOfWeek == 5 || $day->dayOfWeek == 6;
    }

    public function previous()
    {
        $clone = $this->currentDate->clone()->subDays(1);
        /*if ($clone->lt(Carbon::today()))
            $clone = Carbon::today();*/
        $this->currentDate = $clone;
        $this->updatedDate();
    }

    public function next()
    {
        $clone = $this->currentDate->clone()->addDays(1);
        $this->currentDate = $clone;
        $this->updatedDate();
    }

    public function mount()
    {
        $this->currentDate = Carbon::today();
        $this->updatedDate();
    }

    public function appointmentsOf($day)
    {
        $date = Carbon::make($day);

        return Appointment::where("appointment_at_id", $this->model->id)
            ->where("appointment_at_type", $this->type)
            ->whereDate("date", $date)
            ->get();
    }

    public function render()
    {
        return view('livewire.calendar');
    }

    public function select($date, $time)
    {
        $this->date = $date;
        $this->time = $time;
        $this->updatedDate();
        // dump($date, $time);
    }

    public function calculate($date)
    {
        $defaultWorkingHours = ["08:00", "08:30", "09:00", "09:30", "10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30", "17:00", "17:30"];
        //$workingTimes = [ "10:00", "10:30", "11:00", "11:30", "12:00", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30" ];
        $workingTimes = $defaultWorkingHours;
        //$reservedTimes = [ "10:30", "11:00", "15:00", "12:00" ];
        $reservedTimes = $this->appointmentsOf($date)->pluck("time")->flatten()->toArray();
        $availableTimes = [];

        foreach ($workingTimes as $time)
        {
            $availableTimes[] = [
                "text" => $time,
                "is_reserved" => collect($reservedTimes)->contains($time),
                "is_disabled" => ! collect($workingTimes)->contains($time),
            ];
        }

        return $availableTimes;
    }
}
