@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Edit Doctor</h3>
        <a href="{{ route('doctors.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

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
        <form action="{{ route('doctors.update', $doctor->id) }}" method="POST" enctype="multipart/form-data" class="p-4">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $doctor->name) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Experience</label>
                    <input type="text" name="experience" class="form-control" value="{{ old('experience', $doctor->experience) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone', $doctor->phone) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $doctor->email) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Location</label>
                    <input type="text" name="location" class="form-control" value="{{ old('location', $doctor->location) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Working Hours</label>
                    <input type="text" name="working_hours" class="form-control" value="{{ old('working_hours', $doctor->working_hours) }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Certifications</label>
                    <textarea name="certifications" class="form-control" rows="2">{{ old('certifications', $doctor->certifications) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">About</label>
                    <textarea name="about" class="form-control" rows="2">{{ old('about', $doctor->about) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                    @if ($doctor->image)
                        <img src="{{ asset('storage/' . $doctor->image) }}" width="100" class="mt-2 img-thumbnail">
                    @endif
                </div>
                <div class="col-md-6">
                    <label class="form-label">Bookings Count</label>
                    <input type="number" name="bookings_count" class="form-control" 
                        value="{{ isset($bookings_count) ? $bookings_count : 0 }}">
                </div>
            </div>

            <div class="mt-4 text-end">
                <button class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Doctor
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
