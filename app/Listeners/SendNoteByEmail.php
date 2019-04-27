<?php

namespace App\Listeners;

use App\Events\AcceptAppointment;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
use App\Mail\ClientEmail;
class SendNoteByEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AcceptAppointment  $event
     * @return void
     */
    public function handle(AcceptAppointment $event)
    {
        Mail::to($event->appointment->email)->send(new ClientEmail($event->appointment));
    }
}
