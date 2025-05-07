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

            <!-- Date Filter -->
            <form method="GET" action="{{ route('admin.dashboard') }}" class="mb-4 d-flex align-items-center gap-2">
                <label for="date" class="me-2 mb-0 fw-bold">Filter Bookings by Date:</label>
                <input type="date" id="date" name="date" value="{{ $filteredDate }}" class="form-control" style="max-width: 200px;">
                <button type="submit" class="btn btn-primary ms-2">Filter</button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary ms-2">Reset</a>
            </form>

            <!-- Dashboard Cards (Total Counts) -->
            <div class="mb-3">
                <h4 class="fw-bold mb-3 text-primary">
                    <i class="fas fa-chart-bar me-2"></i>Total Counts
                </h4>
            </div>
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
                            <h4 class="mb-0">{{ $totalBookingCount }}</h4>
                            <div class="text-muted">Total Bookings</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm text-center h-100">
                        <div class="card-body">
                            <span class="rounded-circle bg-warning bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-2" style="width:48px; height:48px;">
                                <i class="fas fa-users fa-lg text-warning"></i>
                            </span>
                            <h4 class="mb-0">{{ $totalUserCount }}</h4>
                            <div class="text-muted">Total Users</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Doctor Booking Count Table for Filtered Date -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-3">Doctor Booking Count for {{ $filteredDate }}</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Doctor Name</th>
                                    <th>Booking Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($doctors as $index => $doctor)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $doctor->name }}</td>
                                        <td>
                                            <span class="badge bg-info">{{ $doctor->booking_count }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Total Summary Chart -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-4">Total Summary Chart</h5>
                    <canvas id="totalChart" height="100"></canvas>
                </div>
            </div>

            <!-- Filtered Chart for Selected Date -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-4">Filtered Chart for {{ $filteredDate }}</h5>
                    <canvas id="filteredChart" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Total Count Chart
    new Chart(document.getElementById('totalChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: ['Services', 'Doctors', 'Bookings', 'Users'],
            datasets: [{
                label: 'Total Count',
                data: [
                    {{ $serviceCount }},
                    {{ $doctorCount }},
                    {{ $totalBookingCount }},
                    {{ $totalUserCount }}
                ],
                backgroundColor: [
                    'rgba(40, 167, 69, 0.7)',
                    'rgba(0, 123, 255, 0.7)',
                    'rgba(23, 162, 184, 0.7)',
                    'rgba(255, 193, 7, 0.7)'
                ],
                borderColor: [
                    'rgba(40, 167, 69, 1)',
                    'rgba(0, 123, 255, 1)',
                    'rgba(23, 162, 184, 1)',
                    'rgba(255, 193, 7, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });

    // Filtered Chart (Bookings & Users)
    new Chart(document.getElementById('filteredChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: ['Bookings', 'Users'],
            datasets: [{
                label: 'Count for {{ $filteredDate }}',
                data: [
                    {{ $filteredBookingCount }},
                    {{ $filteredUserRoleCount }}
                ],
                backgroundColor: [
                    'rgba(23, 162, 184, 0.7)',
                    'rgba(255, 193, 7, 0.7)'
                ],
                borderColor: [
                    'rgba(23, 162, 184, 1)',
                    'rgba(255, 193, 7, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: { y: { beginAtZero: true } }
        }
    });
});
</script>
@endsection
