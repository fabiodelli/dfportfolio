@extends('admin.dashboard')

@section('content')
<div class="container py-4">

    <h2 class="fw-bold mb-4">Modifica Tipo</h2>

    <form action="{{ route('admin.types.update', $type->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nome Tipo</label>
            <input type="text" name="type" class="form-control" value="{{ $type->type }}" required>
        </div>

        <button class="btn btn-success">Aggiorna</button>
        <a href="{{ route('admin.types.index') }}" class="btn btn-secondary">Annulla</a>
    </form>

</div>
@endsection
