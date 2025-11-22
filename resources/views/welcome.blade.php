@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">
        <h1 class="display-5 fw-bold">
            Portfolio Backend API
        </h1>

        <p class="col-md-8 fs-4">This is the administrative backend for the Portfolio application. Use the dashboard to manage projects, technologies, and types.</p>
        
        @guest
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg" type="button">Login</a>
        @else
            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-lg" type="button">Go to Dashboard</a>
        @endguest
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <i class="fa-solid fa-folder-open fa-3x text-primary mb-3"></i>
                        <h3 class="h5">Projects</h3>
                        <p class="text-muted">Manage your portfolio projects, including descriptions, images, and links.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <i class="fa-solid fa-microchip fa-3x text-success mb-3"></i>
                        <h3 class="h5">Technologies</h3>
                        <p class="text-muted">Add and update the technologies you use, complete with logos and icons.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <i class="fa-solid fa-layer-group fa-3x text-warning mb-3"></i>
                        <h3 class="h5">Types</h3>
                        <p class="text-muted">Categorize your work into different types like "Full Stack", "Front End", etc.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection