@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Service Details</h3>
        <a href="{{ route('services.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>
    <div class="card shadow-sm p-4">
        <div class="row">
            <div class="col-md-3 text-center mb-3 mb-md-0">
                @if ($service->icon)
                    <img src="{{ asset('storage/' . $service->icon) }}" class="img-fluid rounded border" style="max-width: 120px;" alt="Service Icon">
                @else
                    <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width:120px; height:120px;">
                        <i class="fas fa-tooth fa-2x text-muted"></i>
                    </div>
                @endif
            </div>
            <div class="col-md-9">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th>Name:</th>
                        <td>{{ $service->name }}</td>
                    </tr>
                    <tr>
                        <th>Description:</th>
                        <td>{{ $service->description }}</td>
                    </tr>
                    <tr>
                        <th>Doctors:</th>
                        <td>
                            @if($service->doctors && $service->doctors->count())
                                @foreach($service->doctors as $doctor)
                                    <span class="badge bg-primary">{{ $doctor->name }}</span>
                                @endforeach
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
