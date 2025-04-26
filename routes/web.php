<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('services', ServiceController::class);
Route::resource('doctors', DoctorController::class);

Route::middleware(['auth'])->group(function () {
   
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});
Route::resource('doctors', DoctorController::class);
Route::resource('services', ServiceController::class);
Route::resource('bookings', BookingController::class);
Route::resource('users', UserController::class);