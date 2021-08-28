<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Laboratory;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appointment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $appointment_at = rand(0,1);
        $data = [];
        if ($appointment_at == 0)
        {
            $data["appointment_at_id"] = Doctor::all()->random()->id;
            $data["appointment_at_type"] = Doctor::class;
        }else {
            $data["appointment_at_id"] = Laboratory::all()->random()->id;
            $data["appointment_at_type"] = Laboratory::class;
        }

        return  array_merge( $data ,[
            "date" => Carbon::today()->addDays(rand(0, 10))->format("Y-m-d"),
            "time" => $this->faker->randomElement(["08:00", "08:30", "09:00", "09:30", "10:00", "10:30", "11:00", "11:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30",]),
            "patient_id" => Patient::all()->random()->id,
            "state" => "accepted",
            "metas" => [],
        ]);
    }
}
