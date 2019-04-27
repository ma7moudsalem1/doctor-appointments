<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Appointment;
use App\Events\AcceptAppointment;

class DateRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::orderBy('doctor_seen', 'asc')->get();
        return view('panel.date_register.index', compact('appointments'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['doctor_seen' => 1]);
        $appointments = Appointment::where('register_at', 'like', $appointment->register_date . '%')
                                    ->where('id', '!=', $appointment->id)
                                    ->get();
        return view('panel.date_register.show', compact('appointment', 'appointments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate Request
        $request->validate([
            'register_at' => 'required'
        ]);

        // Fetch An appointment.
        $appointment = Appointment::findOrFail($id);

         // Update An appointment
         $appointment->update(['doctor_approve'=> 1, 'register_at' => $request->register_at]);

        // Fire event if doctor choose note by email.
        if($request->noteByEmail){
            event(new AcceptAppointment($appointment));
        }

        // Redirect back with message
        return redirect()->back()->withFlashMessage('The appointment has been approved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Fetch An appointment and delete.
        $appointment = Appointment::findOrFail($id)->delete();
        $message     = 'appointment deleted !!';
        return request()->ajax() ? response()->json([$message]) : redirect()->back()->withFlashMessage($message);
    }
}
