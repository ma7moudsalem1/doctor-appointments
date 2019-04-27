<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Appointment;
use App\User;

class HomeController extends Controller
{
    public function index()
    {
        $countAppointments = Appointment::count();
        $countDoctors      = user::count();
        $todayAppoiments   = Appointment::where('register_at', 'like', date('d-m-Y') . '%')->orderBy('doctor_seen')->get();
        return view('panel.home.index', compact('countAppointments', 'countDoctors', 'todayAppoiments'));
    }
}
