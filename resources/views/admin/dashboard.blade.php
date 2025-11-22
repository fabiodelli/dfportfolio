@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>

    <!-- STATS CARDS -->
    <div class="row g-4 mb-5">
        <div class="col-12 col-md-4">
            <div class="card h-100 border-primary border-start-0 border-end-0 border-top-0 border-5 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title text-muted mb-3">Total Projects</h5>
                    <p class="display-4 fw-bold text-primary mb-0">{{ $totalProjects }}</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card h-100 border-success border-start-0 border-end-0 border-top-0 border-5 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title text-muted mb-3">Technologies</h5>
                    <p class="display-4 fw-bold text-success mb-0">{{ $totalTechnologies }}</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card h-100 border-warning border-start-0 border-end-0 border-top-0 border-5 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title text-muted mb-3">Types</h5>
                    <p class="display-4 fw-bold text-warning mb-0">{{ $totalTypes }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- RECENT ACTIVITY -->
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">{{ __('Recent Projects') }}</h5>
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary btn-sm">
                        <i class="fa-solid fa-plus me-1"></i> New Project
                    </a>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="ps-4">Title</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Technologies</th>
                                    <th scope="col">Last Update</th>
                                    <th scope="col" class="text-end pe-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($recentProjects as $project)
                                    <tr>
                                        <td class="ps-4 fw-semibold">{{ $project->title }}</td>
                                        <td>
                                            @if($project->type)
                                                <span class="badge bg-info text-dark">{{ $project->type->type }}</span>
                                            @else
                                                <span class="text-muted small">N/A</span>
                                            @endif
                                        </td>
                                        <td>
                                            @forelse($project->technologies as $tech)
                                                <span class="badge bg-secondary">{{ $tech->name }}</span>
                                            @empty
                                                <span class="text-muted small">-</span>
                                            @endforelse
                                        </td>
                                        <td class="text-muted small">{{ $project->updated_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-end pe-4">
                                            <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-sm btn-outline-primary me-1" title="View">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                                                <i class="fa-solid fa-pencil"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-muted">
                                            No projects found. Start by creating one!
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white text-center py-3">
                    <a href="{{ route('admin.projects.index') }}" class="text-decoration-none fw-bold">View All Projects &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
