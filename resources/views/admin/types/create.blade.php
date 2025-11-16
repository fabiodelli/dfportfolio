@extends('admin.dashboard')

@section('content')
<div class="container py-4">

    <h2 class="fw-bold mb-4">Nuovo Tipo</h2>

    <form action="{{ route('admin.types.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nome Tipo</label>
            <input type="text" name="type" class="form-control" required>
        </div>

        <button class="btn btn-success">Salva</button>
        <a href="{{ route('admin.types.index') }}" class="btn btn-secondary">Annulla</a>
    </form>

</div>
@endsection
