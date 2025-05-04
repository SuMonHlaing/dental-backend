@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">Booking List</h3>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>

        <!-- Filter Form -->
        <form method="GET" action="{{ route('bookings.index') }}" class="row g-2 mb-4 align-items-end">
            <div class="col-md-3">
                <label for="filter_date" class="form-label mb-1">Filter by Date</label>
                <input type="date" id="filter_date" name="date" value="{{ request('date') }}" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="filter_doctor" class="form-label mb-1">Filter by Doctor</label>
                <select id="filter_doctor" name="doctor_id" class="form-select">
                    <option value="">All Doctors</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}" {{ request('doctor_id') == $doctor->id ? 'selected' : '' }}>
                            {{ $doctor->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-filter me-1"></i> Filter
                </button>
            </div>
            <div class="col-md-2">
                <a href="{{ route('bookings.index') }}" class="btn btn-outline-secondary w-100">
                    Reset
                </a>
            </div>
        </form>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>User</th>
                            <th>Doctor</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Preferred Date</th>
                            <th>Preferred Time</th>
                            <th>Notes</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($appointments as $booking)
                            <tr>
                                <td>{{ optional($booking->user)->name ?? '-' }}</td>
                                <td>{{ optional($booking->doctor)->name ?? '-' }}</td>
                                <td>{{ $booking->full_name }}</td>
                                <td>{{ $booking->email }}</td>
                                <td>{{ $booking->phone }}</td>
                                <td>{{ $booking->preferred_date }}</td>
                                <td>{{ $booking->preferred_time }}</td>
                                <td>
                                    <span style="max-width: 180px; display: inline-block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        {{ $booking->notes }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this booking?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="text-center text-muted py-4">No bookings found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="p-3 d-flex justify-content-end align-items-center border-top">
                    <nav aria-label="Bookings pagination">
                     {{ $appointments->onEachSide(1)->links('vendor.pagination.bootstrap-5') }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
