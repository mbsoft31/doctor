<div>
    <div>
        Hello {{ $user->name }},
    </div>

    Your appointment: -------------------------------------------------

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

    ------------------------------------------------------------------

    Has been canceled.

    <div>
        regards
    </div>
</div>
