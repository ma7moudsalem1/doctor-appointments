<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;

class DateRegisterController extends Controller
{
    public function dateRegisterView()
    {
        return view('date_register');
    }

    public function dateRegister(Request $request)
    {
        // Inputs validation
        $data = $request->validate([
            'name'          => 'required|string|min:3|max:30',
            'email'         => 'required|email|max:80',
            'register_at'   => 'required',
            'phone'         => 'nullable|numeric',
            'info'          => 'nullable|max:150',
        ]);

        // Create new record
        Appointment::create($data);
        
        // Redirect back with message to user
        return redirect()->back()->withFlashMessage('Your request has been sent.');

    }
}
