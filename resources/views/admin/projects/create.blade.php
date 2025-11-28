@extends('layouts.admin')




@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-secondary">Create Project</h2>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-outline-secondary">
            <i class="fa-solid fa-arrow-left me-2"></i>Back
        </a>
    </div>

    @include('partials.validation_errors')

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row g-4">
                    <!-- Title (IT) -->
                    <div class="col-md-6">
                        <label for="title" class="form-label fw-bold">Title (IT)</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                            placeholder="e.g. Portfolio Vue/Laravel" value="{{ old('title') }}">
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        <small class="text-muted">Max 150 characters, must be unique.</small>
                    </div>

                    <!-- Title (EN) -->
                    <div class="col-md-6">
                        <label for="title_en" class="form-label fw-bold">Title (EN)</label>
                        <input type="text" class="form-control @error('title_en') is-invalid @enderror" name="title_en" id="title_en"
                            placeholder="e.g. Portfolio Vue/Laravel (English)" value="{{ old('title_en') }}">
                        @error('title_en') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Images -->
                    <div class="col-md-6">
                        <label for="cover_image" class="form-label fw-bold">Cover Image</label>
                        <input type="text" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image"
                            id="cover_image" placeholder="e.g. dashboard.png" value="{{ old('cover_image') }}">
                        @error('cover_image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="full_image" class="form-label fw-bold">Full Image</label>
                        <input type="text" class="form-control @error('full_image') is-invalid @enderror" name="full_image"
                            id="full_image" placeholder="e.g. dashboard-full.png" value="{{ old('full_image') }}">
                        @error('full_image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Git -->
                    <div class="col-12">
                        <label for="git" class="form-label fw-bold">GitHub Link</label>
                        <input type="text" class="form-control @error('git') is-invalid @enderror" name="git"
                            id="git" placeholder="https://github.com/username/repo" value="{{ old('git') }}">
                        @error('git') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Featured -->
                    <div class="col-12">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold" for="is_featured">In Evidenza (Featured)</label>
                        </div>
                    </div>

                    <!-- Technologies -->
                    <div class="col-12">
                        <label class="form-label fw-bold d-block mb-2">Technologies</label>
                        <div class="d-flex flex-wrap gap-3 p-3 border rounded bg-light">
                            @foreach ($technologies as $technology)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="technologies[]" value="{{ $technology->id }}"
                                        id="technology_{{ $technology->id }}"
                                        {{ in_array($technology->id, $selectedTechnologies) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="technology_{{ $technology->id }}">
                                        {{ $technology->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Types -->
                    <div class="col-12">
                        <label class="form-label fw-bold d-block mb-2">Type</label>
                        <div class="d-flex flex-wrap gap-3 p-3 border rounded bg-light">
                            @foreach ($types as $type)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type_id" value="{{ $type->id }}"
                                        id="type_{{ $type->id }}" {{ in_array($type->id, $selectedTypes) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="type_{{ $type->id }}">
                                        {{ $type->type }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Content (IT) -->
                    <div class="col-md-6">
                        <label for="content" class="form-label fw-bold">Content (IT)</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="5" placeholder="Descrizione del progetto...">{{ old('content') }}</textarea>
                        @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Content (EN) -->
                    <div class="col-md-6">
                        <label for="content_en" class="form-label fw-bold">Content (EN)</label>
                        <textarea class="form-control @error('content_en') is-invalid @enderror" name="content_en" id="content_en" rows="5" placeholder="Project description (English)...">{{ old('content_en') }}</textarea>
                        @error('content_en') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Actions -->
                    <div class="col-12 text-end mt-4">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fa-solid fa-save me-2"></i>Save Project
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
