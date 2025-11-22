@extends('layouts.admin')




@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-secondary">Projects</h2>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus me-2"></i>Create Project
        </a>
    </div>

    @include('partials.session_message')

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="ps-4">ID</th>
                            <th scope="col">Cover</th>
                            <th scope="col">Title</th>
                            <th scope="col" class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($projects as $project)
                            <tr>
                                <td class="ps-4 fw-semibold text-muted">#{{ $project->id }}</td>
                                <td>
                                    @if($project->cover_image)
                                        <img src="{{ asset('img/' . $project->cover_image) }}" alt="{{ $project->title }}" 
                                             class="rounded shadow-sm" style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted" 
                                             style="width: 50px; height: 50px;">
                                            <i class="fa-solid fa-image"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="fw-bold">{{ $project->title }}</td>
                                <td class="text-end pe-4">
                                    <a href="{{ route('admin.projects.show', $project->slug) }}" class="btn btn-sm btn-outline-primary me-1" title="View">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-sm btn-outline-secondary me-1" title="Edit">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-{{ $project->id }}" title="Delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="modal-{{ $project->id }}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header border-0">
                                                    <h5 class="modal-title fw-bold">Delete Project</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    Are you sure you want to delete <strong>{{ $project->title }}</strong>?
                                                    <br>This action cannot be undone.
                                                </div>
                                                <div class="modal-footer border-0">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="fa-solid fa-folder-open fa-2x mb-3 d-block"></i>
                                    No projects found. Start by creating one!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if($projects->hasPages())
            <div class="card-footer bg-white border-0 py-3">
                {{ $projects->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
