@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-secondary">New Type</h2>
        <a href="{{ route('admin.types.index') }}" class="btn btn-outline-secondary">
            <i class="fa-solid fa-arrow-left me-2"></i>Back
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.types.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="form-label fw-bold">Type Name</label>
                    <input type="text" name="type" class="form-control" placeholder="e.g. Full Stack" required>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fa-solid fa-save me-2"></i>Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
