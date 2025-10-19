@extends('layouts.admin')

@section('content')
    <h1 class="py-3">Edit Project</h1>

    @include('partials.validation_errors')

    <form action="{{ route('admin.projects.update', $projects->slug) }}" method="post" enctype="multipart/form-data" >
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                aria-describedby="titleHelper" placeholder="Learn php" value="{{ old('title', $projects->title) }}">
            <small id="titleHelper" class="form-text text-muted">Type the post title max 150 characters - must be
                unique</small>
        </div>
        <div class="mb-3">
            <label for="cover_image" class="form-label">Image</label>
            <input type="text" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image"
                id="cover_image" aria-describedby="cover_imageHelper" placeholder="Learn php"
                value="{{ old('cover_image', $projects->cover_image) }}">
            <small id="cover_imageHelper" class="form-text text-muted">Type the post cover_image max 150 characters - must
                be unique</small>
        </div>
        <div class="mb-3">
            <label for="full_image" class="form-label">Image</label>
            <input type="text" class="form-control @error('full_image') is-invalid @enderror" name="full_image"
                id="full_image" aria-describedby="full_imageHelper" placeholder="Learn php"
                value="{{ old('full_image', $projects->full_image) }}">
            <small id="full_imageHelper" class="form-text text-muted">Type the post full_image max 150 characters - must
                be unique</small>
        </div>
        <div class="mb-3">
            <label for="git" class="form-label">Image</label>
            <input type="text" class="form-control @error('git') is-invalid @enderror" name="git"
                id="git" aria-describedby="gitHelper" placeholder="Learn php"
                value="{{ old('git', $projects->git) }}">
            <small id="gitHelper" class="form-text text-muted">Type the post git max 150 characters - must
                be unique</small>
        </div>

        <div class="form-group">
            <label class="mb-2" for="technologies">Technologies</label>
            <br>
                @foreach ($technologies as $technology)
                    <div class="form-check-inline">
                        <input class="form-check-input" type="checkbox" name="technologies[]" value="{{ $technology->id }}"
                            id="technology_{{ $technology->id }}"
                            {{ in_array($technology->id, $selectedTechnologies) ? 'checked' : '' }}>
                        <label class="form-check-label" for="technology_{{ $technology->id }}">
                            {{ $technology->name }}
                        </label>
                    </div>
                @endforeach
            
        </div>
        
        <div class="form-group">
            <label class="mb-2" for="types">Types</label>
            <br>
                @foreach ($types as $type)
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="type_id" value="{{ $type->id }}"
                            id="type_{{ $type->id }}"
                            {{ in_array($type->id, $selectedTypes) ? 'checked' : '' }}>
                        <label class="form-check-label" for="type_{{ $type->id }}">
                            {{ $type->type }}
                        </label>
                    </div>
                @endforeach
            
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="3">{{ old('content', $projects->content) }}</textarea>
        </div>

        <button type="submit" class="btn btn-dark">Save</button>

    </form>
@endsection
