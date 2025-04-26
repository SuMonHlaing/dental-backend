@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-tachometer-alt me-2"></i>Dashboard</span>
                </div>
                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4 class="mb-3">Welcome to Dental Care Admin Panel</h4>
                    <p class="text-muted mb-4">You are logged in!</p>

                    <a href="{{ route('doctors.create') }}" class="btn btn-danger">
                        <i class="fas fa-user-md"></i> Create Doctor
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
