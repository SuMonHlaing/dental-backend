<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Appointment; // or Booking if your model is Booking
class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'serviceCount' => Service::count(),
            'doctorCount' => Doctor::count(),
            'userCount' => User::count(),
            'appointmentCount' => Appointment::count(), // or Booking::count() if your model is Booking
        ]);
    }
}
