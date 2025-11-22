@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-secondary">Types</h2>
        <a href="{{ route('admin.types.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus me-2"></i>New Type
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
                            <th scope="col" class="ps-4">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col" class="text-end pe-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($types as $type)
                            <tr>
                                <td class="ps-4 text-muted">#{{ $type->id }}</td>
                                <td class="fw-semibold">{{ $type->type }}</td>
                                <td class="text-end pe-4">
                                    <a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-sm btn-outline-secondary me-1" title="Edit">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>

                                    <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure you want to delete this type?')" class="btn btn-sm btn-outline-danger" title="Delete">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center py-5 text-muted">
                                    <i class="fa-solid fa-layer-group fa-2x mb-3 d-block"></i>
                                    No types found.
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
