<?php

namespace App\Mail;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentCreated extends Mailable
{
    use Queueable, SerializesModels;

    public Appointment $appointment;
    public User $user;

    /**
     * Create a new message instance.
     *
     * @param Appointment $appointment
     * @param User $user
     */
    public function __construct(Appointment $appointment, User $user)
    {
        $this->appointment = $appointment;

        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.appointment-created')->from("doctor.lib@test.com");
    }
}
