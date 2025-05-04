<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Appointment::with(['user', 'doctor']);
    
        if ($request->filled('date')) {
            $query->whereDate('preferred_date', $request->date);
        }
        if ($request->filled('doctor_id')) {
            $query->where('doctor_id', $request->doctor_id);
        }
    
        $appointments = $query->orderBy('created_at', 'desc')->paginate(10);
    
        // Get all doctors for the filter dropdown
        $doctors = \App\Models\Doctor::orderBy('name')->get();
    
        return view('bookings.index', compact('appointments', 'doctors'));
    }
    public function destroy($id)
    {
        $appointment = \App\Models\Appointment::findOrFail($id);
        $appointment->delete();
        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
    }
}
