@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0">Doctor Details</h3>
            <div>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary me-2">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
                <a href="{{ route('doctors.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
            </div>
        </div>
        <div class="card shadow-sm p-4">
            <div class="row">
                <div class="col-md-3 text-center mb-3 mb-md-0">
                    @if ($doctor->image)
                        <img src="{{ asset('storage/' . $doctor->image) }}" class="img-fluid rounded-circle border" style="max-width: 150px;" alt="Doctor Image">
                    @else
                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width:150px; height:150px;">
                            <i class="fas fa-user-md fa-3x text-muted"></i>
                        </div>
                    @endif
                </div>
                <div class="col-md-9">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <th>Name:</th>
                            <td>{{ $doctor->name }}</td>
                        </tr>
                        <tr>
                            <th>Experience:</th>
                            <td>{{ $doctor->experience }}</td>
                        </tr>
                        <tr>
                            <th>Phone:</th>
                            <td>{{ $doctor->phone }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $doctor->email }}</td>
                        </tr>
                        <tr>
                            <th>Location:</th>
                            <td>{{ $doctor->location }}</td>
                        </tr>
                        <tr>
                            <th>Working Hours:</th>
                            <td>{{ $doctor->working_hours }}</td>
                        </tr>
                        <tr>
                            <th>Certifications:</th>
                            <td>{{ $doctor->certifications }}</td>
                        </tr>
                        <tr>
                            <th>About:</th>
                            <td>{{ $doctor->about }}</td>
                        </tr>
                        <tr>
                            <th>Bookings: Count</th>
                            <td>
                                {{ $doctor->bookings_count }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
