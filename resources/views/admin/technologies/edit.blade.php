@extends('admin.dashboard')

@section('content')
<div class="container py-4">

    <h2 class="fw-bold mb-4">Modifica Tecnologia</h2>

    <form action="{{ route('admin.technologies.update', $technology->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="name" value="{{ $technology->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Logo attuale</label><br>
            @if($technology->image)
                <img src="{{ asset('storage/' . $technology->image) }}" width="60">
            @else
                <em>Nessun logo</em>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Nuovo Logo (opzionale)</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-success">Aggiorna</button>
        <a href="{{ route('admin.technologies.index') }}" class="btn btn-secondary">Annulla</a>
    </form>

</div>
@endsection
