@extends('admin.dashboard')

@section('content')
<div class="container py-4">

    <h2 class="fw-bold mb-4">Nuova Tecnologia</h2>

    <form action="{{ route('admin.technologies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Logo (opzionale)</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-success">Salva</button>
        <a href="{{ route('admin.technologies.index') }}" class="btn btn-secondary">Annulla</a>
    </form>

</div>
@endsection
