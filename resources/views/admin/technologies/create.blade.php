@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-secondary">New Technology</h2>
        <a href="{{ route('admin.technologies.index') }}" class="btn btn-outline-secondary">
            <i class="fa-solid fa-arrow-left me-2"></i>Back
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.technologies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="e.g. Vue.js" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Logo URL (Optional)</label>
                    <input type="text" name="image" class="form-control" placeholder="https://example.com/logo.png">
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
