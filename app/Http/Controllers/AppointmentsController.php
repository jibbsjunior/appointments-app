<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    public function index()
    {
        return view('appointments.index');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'email' => 'string|required',
            'date_of_appointment' => 'date|required',
            'time' => 'timezone|required',
            'note' => 'string|required'
        ]);

        Appointment::create([
            'name' => $request->name,
            'email' => $request->email,
            'date_of_appointment' => $request->date,
            'time' => $request->time,
            'notes' => $request->notes
        ]);

        return redirect()->route('dashboard')->with(['message' => 'Appointments book successfully']);
    }
}
