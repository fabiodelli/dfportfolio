@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-secondary">Technologies</h2>
        <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus me-2"></i>New Technology
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="ps-4">Logo</th>
                            <th scope="col">Name</th>
                            <th scope="col" class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($technologies as $technology)
                            <tr>
                                <td class="ps-4">
                                    @if($technology->image)
                                        @if(str_starts_with($technology->image, 'http'))
                                            <img src="{{ $technology->image }}" alt="{{ $technology->name }}" 
                                                 class="rounded" style="width: 40px; height: 40px; object-fit: contain;">
                                        @else
                                            <img src="{{ asset('storage/' . $technology->image) }}" alt="{{ $technology->name }}" 
                                                 class="rounded" style="width: 40px; height: 40px; object-fit: contain;">
                                        @endif
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted" 
                                             style="width: 40px; height: 40px;">
                                            <i class="fa-solid fa-microchip"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="fw-semibold">{{ $technology->name }}</td>
                                <td class="text-end pe-4">
                                    <a href="{{ route('admin.technologies.edit', $technology->id) }}" class="btn btn-sm btn-outline-secondary me-1" title="Edit">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    
                                    <form action="{{ route('admin.technologies.destroy', $technology->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure you want to delete this technology?')" class="btn btn-sm btn-outline-danger" title="Delete">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-5 text-muted">
                                    <i class="fa-solid fa-microchip fa-2x mb-3 d-block"></i>
                                    No technologies found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
