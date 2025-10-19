@extends('layouts.app')
@section('content')

<div class="conatiner">
    <div class="row">
        {{-- @forelse ($projects as $project)
        <div class="col">
            <div class="card">
                <img class="card-img-top" src="{{$project->cover_image}}" alt="Title">
                <div class="card-body">
                    <h4 class="card-title">{{$project->title}}</h4>
                    <p class="card-text">{{$project->type}}</p>
                </div>
            </div>
        </div>
        @empty
        <strong>No project to show yet</strong>
        @endforelse --}}
        <h1 class="text-center mt-5">Welcome</h1>
    </div>
</div>

@endsection