@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 mb-4 mb-md-0">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body p-0">
                    <nav class="nav flex-column py-3">
                        <a class="nav-link {{ request()->is('admin/dashboard') ? 'active fw-bold text-primary' : '' }}" href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                        </a>
                        <a class="nav-link {{ request()->is('doctors*') ? 'active fw-bold text-primary' : '' }}" href="{{ route('doctors.index') }}">
                            <i class="fas fa-user-md me-2"></i> Doctors
                        </a>
                        <a class="nav-link {{ request()->is('services*') ? 'active fw-bold text-success' : '' }}" href="{{ route('services.index') }}">
                            <i class="fas fa-stethoscope me-2"></i> Services
                        </a>
                        <a class="nav-link {{ request()->is('bookings*') ? 'active fw-bold text-info' : '' }}" href="{{ route('bookings.index') }}">
                            <i class="fas fa-calendar-check me-2"></i> Bookings
                        </a>
                        <a class="nav-link {{ request()->is('users*') ? 'active fw-bold text-warning' : '' }}" href="{{ route('users.index') }}">
                            <i class="fas fa-users me-2"></i> Users
                        </a>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Main Content -->
        <div class="col-md-9 col-lg-10">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Admin Dashboard</h2>
            </div>
            <!-- Dashboard Cards -->
            <div class="row mb-4">
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm text-center h-100">
                        <div class="card-body">
                            <span class="rounded-circle bg-success bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-2" style="width:48px; height:48px;">
                                <i class="fas fa-stethoscope fa-lg text-success"></i>
                            </span>
                            <h4 class="mb-0">{{ $serviceCount }}</h4>
                            <div class="text-muted">Services</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm text-center h-100">
                        <div class="card-body">
                            <span class="rounded-circle bg-primary bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-2" style="width:48px; height:48px;">
                                <i class="fas fa-user-md fa-lg text-primary"></i>
                            </span>
                            <h4 class="mb-0">{{ $doctorCount }}</h4>
                            <div class="text-muted">Doctors</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm text-center h-100">
                        <div class="card-body">
                            <span class="rounded-circle bg-info bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-2" style="width:48px; height:48px;">
                                <i class="fas fa-calendar-check fa-lg text-info"></i>
                            </span>
                            <h4 class="mb-0">{{ $appointmentCount}}</h4>
                            <div class="text-muted">Bookings</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm text-center h-100">
                        <div class="card-body">
                            <span class="rounded-circle bg-warning bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-2" style="width:48px; height:48px;">
                                <i class="fas fa-users fa-lg text-warning"></i>
                            </span>
                            <h4 class="mb-0">{{ $userCount }}</h4>
                            <div class="text-muted">Users</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
