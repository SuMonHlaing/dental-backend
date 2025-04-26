@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Create New Service</h3>
        <a href="{{ route('services.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

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
        <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data" class="p-4">
            @csrf

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter service name" value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" placeholder="Service details...">{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Doctors</label>
                <div class="row">
                    @foreach ($doctors as $doctor)
                        <div class="col-md-4 mb-2">
                            <div class="form-check">
                                <input type="checkbox" name="doctor_ids[]" value="{{ $doctor->id }}" class="form-check-input" id="doctor_{{ $doctor->id }}">
                                <label for="doctor_{{ $doctor->id }}" class="form-check-label">{{ $doctor->name }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Icon (image)</label>
                <input type="file" name="icon" class="form-control">
            </div>

            <div class="mt-4 text-end">
                <button class="btn btn-success">
                    <i class="fas fa-save"></i> Save Service
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
