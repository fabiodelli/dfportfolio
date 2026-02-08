@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-secondary">Edit Technology</h2>
        <a href="{{ route('admin.technologies.index') }}" class="btn btn-outline-secondary">
            <i class="fa-solid fa-arrow-left me-2"></i>Back
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.technologies.update', $technology->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-bold">Name</label>
                    <input type="text" name="name" value="{{ $technology->name }}" class="form-control" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Current Logo</label>
                    <div class="mb-2">
                        @if($technology->image)
                            <div class="p-2 border rounded bg-light d-inline-block">
                                {{-- Check if image starts with http (URL) or not (Storage path) --}}
                                @if(Str::startsWith($technology->image, 'http'))
                                    <img src="{{ $technology->image }}" class="rounded" width="60" alt="{{ $technology->name }}">
                                @else
                                    <img src="{{ asset('storage/' . $technology->image) }}" class="rounded" width="60" alt="{{ $technology->name }}">
                                @endif
                            </div>
                        @else
                            <span class="text-muted fst-italic">No logo set</span>
                        @endif
                    </div>
                    <label class="form-label fw-bold mt-2">Logo URL (Optional)</label>
                    <input type="text" name="image" class="form-control" value="{{ old('image', $technology->image) }}" placeholder="https://example.com/logo.png">
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fa-solid fa-save me-2"></i>Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
