@props(["times" => null, "doctor" => null, "patient" => Auth::user(), "doctors" => \App\Models\User::allDoctors()])

<div class="space-y-6">

    <div>
        <label for="appointment_date">
            {{ __("Start date") }}
        </label>
        <input class="mt-4 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-64 rounded-none rounded-r-md sm:text-sm border-gray-300" type="date" id="start" name="start">
    </div>

    @if(isset($times) && $times != null)
        <div>
            <label for="time">
                {{ __("Time") }}
            </label>
            <x-input.time id="time" :available="$times" />
        </div>
    @endif

    @if(isset($doctor) && ! is_null($doctor))
        <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
    @else
        <div>
            <label for="doctor">
                {{ __("Doctor") }}
            </label>
            <select name="doctor_id" id="doctor">
                @foreach($doctors as $doctor_model)
                    @if( !is_null($doctor) && $doctor_model->is($doctor))
                        <option value="{{$doctor_model->id}}" selected>{{$doctor_model->name}}</option>
                    @else
                        <option value="{{$doctor_model->id}}">{{$doctor_model->name}}</option>
                    @endif
                @endforeach
            </select>
{{--            <input class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" type="text" id="doctor" name="doctor_id">--}}
        </div>
    @endif

    @if(isset($patient) && ! is_null($patient))
        <input type="hidden" name="patient_id" value="{{ $patient->id }}">
    @else
        <div>
            <label for="patient">
                {{ __("Patient") }}
            </label>
            <input class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" type="text" id="patient" name="patient_id">
        </div>
    @endif

    <input type="hidden" name="status" id="status" value="pending">

</div>
