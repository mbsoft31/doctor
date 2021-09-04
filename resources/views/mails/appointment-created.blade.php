<div>
    <div>
        Hello {{ $user->name }},
    </div>

    <div>
        Date: {{ $appointment->date }}
    </div>

    <div>
        time: {{ $appointment->time }}
    </div>

    <div>
        Appointment at {{ $appointment->appointment_at->name }}.
    </div>

    <div>
        Appointment for {{ $appointment->patient->name }}.
    </div>

    <div>
        regards
    </div>
</div>
