@extends('admin.dashboard')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Tipi</h2>
        <a href="{{ route('admin.types.create') }}" class="btn btn-primary">+ Nuovo Tipo</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th class="text-end">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($types as $type)
                <tr>
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->type }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-warning btn-sm">Modifica</a>

                        <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Eliminare questo tipo?')" class="btn btn-danger btn-sm">
                                Elimina
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3">Nessun tipo trovato</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
