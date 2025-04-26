@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Dashboard
            </a>
            <h3 class="mb-0">All Services</h3>
            <a href="{{ route('services.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Add Service
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Icon</th>
                            <th>Name</th>
                            <th >Description</th>
                            <th>Doctors</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($services as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                <td>
                                    @if ($service->icon)
                                        <img src="{{ asset('storage/' . $service->icon) }}" width="40"
                                            class="img-thumbnail">
                                    @endif
                                </td>
                                <td>{{ $service->name }}</td>
                                <td style="max-width: 180px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    {{ $service->description }}
                                </td>
                                <td>
                                    @if ($service->doctors->isNotEmpty())
                                        <ul class="list-unstyled mb-0">
                                            @foreach ($service->doctors as $doctor)
                                                <li>{{ $doctor->name }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <span>N/A</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('services.show', $service->id) }}"
                                        class="btn btn-sm btn-info text-white"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('services.edit', $service->id) }}"
                                        class="btn btn-sm btn-warning text-white"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('services.destroy', $service->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No services found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection