<?php

namespace App\Http\Livewire\Appointment;

use App\Mail\AppointmentCreated;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Laboratory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Livewire\Component;

class CreateAppointment extends Component
{

    /**
     * @var Doctor|Laboratory $model
     */
    public $model;
    public $type;

    public $state=[];

    public $date;
    public $time;

    public array $times = [];

    protected $queryString = [
        "date",
        "time"
    ];

    public function mount()
    {
        $this->fill([

            "state.first_name" => null,
            "state.last_name" => null,
            "state.gender" => null,
            "state.birthdate" => null,
            "state.birth_place" => null,
            "state.address" => null,
            "state.city" => null,
            "state.zip" => null,
            "state.country" => null,
            "state.phone" => null,
            "state.email" => null,
            "state.password" => null,

            "state.consult_in" => "in_place",
        ]);

        if ( ! isset($this->date) || ! is_null($this->date))
            $this->date = Carbon::today()->format("Y-m-d");

        $this->times = $this->calculate($this->date);
    }

    public function updatedDate()
    {
        $this->times = $this->calculate($this->date);
        $this->time = null;
        $this->emit("dateTimeUpdated");
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

    public function makeAppointment(CreatesNewUsers $creator)
    {
        $patientRules = [
            "first_name" => [ "required", ],
            "last_name" => [ "required", ],
            "gender" => [ "required", ],
            "birthdate" => [ "required", ],
            "birth_place" => [ "required", ],
            "address" => [ "required", ],
            "city" => [ "required", ],
            "zip" => [ "required", ],
            "country" => [ "required", ],

        ];

        $appointmentRules = [
            "appointment_at_id" => ["required"],
            "appointment_at_type" => ["required"],
            "date" => ["required", "date"],
            "time" => ["required", "string"],
            "state" => ["required"],
            "metas" => ["array"],
            "metas.consult_in" => ["required", "in:in_place,online_meeting"],
        ];

        $inputs = [
            "appointment_at_id" => $this->model->id,
            "appointment_at_type" => $this->type,
            "date" => $this->date,
            "time" => $this->time,
            "state" => "accepted",
            "metas" => [
                "consult_in" => $this->state["consult_in"],
            ],
        ];

        if ( Auth::check() && Auth::user()->hasRole("patient") )
        {
            $patient = Auth::user()->patient;
            $inputs["patient_id"] = $patient->id;
        }
        elseif ( Auth::check() && Auth::user()->hasAnyRole(["laboratory", "doctor"]) )
        {
            // TODO: create patient model
            $user = Auth::user();

            $model = $user->doctor ?? $user->laboratory;

            $patientData = [
                "first_name" => $model->first_name,
                "last_name" => $model->last_name,
                "gender" => $model->gender,
                "birthdate" => $model->birthdate,
                "birth_place" => $model->birth_place,
                "address" => $model->address,
                "city" => $model->city,
                "zip" => $model->zip,
                "country" => $model->country,
            ];

            $validator = Validator::make($patientData, $patientRules);

            $data = $validator->validate();

            if ($validator->fails())
                dd($validator->errors());

            $user->assignRole("patient");
            $patient = $user->patient()->create($data);


            $inputs["patient_id"] = Auth::user()->patient->id;

        }elseif (Auth::check() && !Auth::user()->hasAnyRole(["laboratory", "doctor", "patient"])) {

            $patientData = array_merge(
                collect($this->state)
                    ->only(["first_name", "last_name", "gender", "birthdate", "birth_place", "address", "city", "zip", "country"])
                    ->toArray(),
                [
                    "metas" => [],
                ]
            );
            // TODO: create patient model for the current auth user

            $user = Auth::user();

            $validator = Validator::make($patientData, $patientRules);

            $data = $validator->validate();

            if ($validator->fails())
                dd($validator->errors());

            $user->assignRole("patient");
            $patient = $user->patient()->create($data);


            $inputs["patient_id"] = Auth::user()->patient->id;

        }else {
            $collection = collect($this->state)
                ->only(["first_name", "last_name", "gender", "birthdate", "birth_place", "address", "city", "zip", "country", "phone", "email", "password"])
                ->toArray();

            /*$userData = $collection->only(["phone", "email", "password"])->toArray();
            $patientData = $collection->only(["first_name", "last_name", "gender", "birthdate", "birth_place", "address", "city", "zip", "country"])->toArray();*/

            $patientData = array_merge($collection, ["account_type" => "patient"]);

            // TODO: create user model
            $user = $creator->create($patientData);

            // TODO: create patient model for that user

            $validator = Validator::make($patientData, $patientRules);

            $data = $validator->validate();

            if ($validator->fails())
                dd($validator->errors());

            $patient = $user->patient()->create($data);

            Auth::login($user);

            $inputs["patient_id"] = Auth::user()->patient->id;
        }

        try {
            if (!isset($inputs["metas"]))
                $inputs["metas"] = [];
            $data = Validator::make($inputs, $appointmentRules)->validate();
        }catch (ValidationException $e)
        {
            dd($inputs, $e->errors());
        }

        $appointment = $patient->appointments()->create($data);

        $this->emit("appointmentCreated");

        Mail::to($appointment->patient->user)->send(new AppointmentCreated($appointment, $appointment->patient->user));
        Mail::to($appointment->appointment_at->user)->send(new AppointmentCreated($appointment, $appointment->appointment_at->user));

        return redirect()->route("patient.appointment.index");
    }

    public function render()
    {
        return view('livewire.appointment.create-appointment');
    }
}
