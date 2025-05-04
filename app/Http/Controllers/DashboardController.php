<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $filteredDate = $request->input('date', now()->toDateString());

        // Total counts
        $serviceCount = Service::count();
        $doctorCount = Doctor::count();
        $totalBookingCount = Appointment::count();
        $totalUserCount = User::where('role', 'user')->count();

        // Filtered counts
        $filteredBookingCount = Appointment::whereDate('preferred_date', $filteredDate)->count();
        $filteredUserCount = User::whereDate('created_at', $filteredDate)->count();

        // Doctor booking counts for filtered date
        $doctors = Doctor::withCount(['appointments as booking_count' => function ($query) use ($filteredDate) {
            $query->whereDate('preferred_date', $filteredDate);
        }])->get();

        return view('admin.dashboard', [
            'serviceCount' => $serviceCount,
            'doctorCount' => $doctorCount,
            'totalBookingCount' => $totalBookingCount,
            'totalUserCount' => $totalUserCount,
            'filteredDate' => $filteredDate,
            'filteredBookingCount' => $filteredBookingCount,
            'filteredUserCount' => $filteredUserCount,
            'doctors' => $doctors,
        ]);
    }
}
