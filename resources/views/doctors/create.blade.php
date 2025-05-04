@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Create New Doctor</h3>
        <a href="{{ route('doctors.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>
    <p class="text-muted mb-4">Fill in the details of the new doctor below.</p>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <form action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data" class="p-4">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter doctor's name" value="{{ old('name') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Experience</label>
                    <input type="text" name="experience" class="form-control" placeholder="Enter experience details" value="{{ old('experience') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="Enter phone number" value="{{ old('phone') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter email address" value="{{ old('email') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Location</label>
                    <input type="text" name="location" class="form-control" placeholder="Enter clinic location" value="{{ old('location') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Working Hours</label>
                    <input type="text" name="working_hours" class="form-control" placeholder="e.g., Mon–Fri, 9am–5pm" value="{{ old('working_hours') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Certifications</label>
                    <textarea name="certifications" class="form-control" placeholder="List certifications">{{ old('certifications') }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">About</label>
                    <textarea name="about" class="form-control" placeholder="Write something about the doctor">{{ old('about') }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label"> Bookings Count</label>
                    <input type="number" name="bookings_count" class="form-control" value="{{ old('bookings_count', 0) }}">
                </div>
            </div>
            <div class="mt-4 text-end">
                <button class="btn btn-success">
                    <i class="fas fa-save"></i> Save Doctor
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
