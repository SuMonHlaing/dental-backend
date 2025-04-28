<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $appointments = \App\Models\Appointment::with('user', 'doctor')
            ->orderBy('created_at', 'desc') // Sort latest to oldest
            ->get();
        return view('bookings.index', compact('appointments'));
    }

    public function destroy($id)
    {
        $appointment = \App\Models\Appointment::findOrFail($id);
        $appointment->delete();
        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
    }
}
