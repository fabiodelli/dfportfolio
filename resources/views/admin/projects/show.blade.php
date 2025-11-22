@extends('layouts.admin')

@section('content')
    <div class="container p-4">
        <div class="row">
            <div class="col ">
                <div class="card d-flex p-3">
                    <h2>{{ $project->title }}</h2>
                    <img  class="mt-2 mb-2" src="{{asset('img/' . $project->cover_image) }}" alt="{{ $project->title }}">
                    <strong>Content</strong>
                    <p>{{ $project->content }}</p>
                    @if ($project->type)
                        <strong>Project Type: <span class="bg-primary rounded-5 p-1 ps-2 pe-2 text-white ">{{ $project->type->type }}</span></strong>
                    @else
                        <p>No Type associated</p>
                    @endif
                    <span class="mt-2">
                        <strong class="mb-3">Technologies:</strong>
                        @foreach ($technologies as $technology)
                            <img class="me-3" height="30" src="{{ $technology->logo ?? 'N/A' }}"
                                alt="{{ $technology->name ?? 'N/A' }}">
                        @endforeach
                    </span>

                </div>
            </div>
        </div>
    </div>
@endsection
