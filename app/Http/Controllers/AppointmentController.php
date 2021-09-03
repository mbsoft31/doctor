<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Laboratory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\Role;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        if (Auth::user()->hasRole("patient"))
        {
            return view("patient.appointment.index", [
                "patient" => Auth::user()->patient,
                "appointments" => Auth::user()->patient->appointments()->orderBy("appointments.date")->get(),
                "selected" => Auth::user()->patient->appointments()->orderBy("appointments.date")->first(),
            ]);
        }

        if (Auth::user()->hasRole("doctor"))
        {
            return view("doctor.appointment.index", [
                "doctor" => Auth::user()->doctor,
                "appointments" => Auth::user()->doctor->appointments()->orderBy("appointments.date")->get(),
                "selected" => Auth::user()->doctor->appointments()->orderBy("appointments.date")->first(),
            ]);
        }

        if (Auth::user()->hasRole("laboratory"))
        {
            return view("laboratory.appointment.index", [
                "laboratory" => Auth::user()->laboratory,
                "appointments" => Auth::user()->laboratory->appointments()->orderBy("appointments.date")->get(),
                "selected" => Auth::user()->laboratory->appointments()->orderBy("appointments.date")->first(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create($type, $model)
    {
        if ($type == 'doctor') $model = Doctor::findOrFail($model);
        if ($type == 'laboratory') $model = Laboratory::findOrFail($model);
        $type = ($type == 'doctor') ? Doctor::class : Laboratory::class;
        return view("static.appointment.create", compact("type", "model"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Appointment $appointment
     * @return Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Appointment $appointment
     * @return Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Appointment $appointment
     * @return Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Appointment $appointment
     * @return Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
