@extends('admin.dashboard')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Tecnologie</h2>
        <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary">+ Nuova Tecnologia</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Logo</th>
                <th>Nome</th>
                <th class="text-end">Azioni</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($technologies as $technology)
                <tr>
                    <td>
                        @if($technology->image)
                            <img src="{{ asset('storage/' . $technology->image) }}" width="40">
                        @endif
                    </td>
                    <td>{{ $technology->name }}</td>
                    <td class="text-end">

                        <a href="{{ route('admin.technologies.edit', $technology->id) }}" 
                           class="btn btn-warning btn-sm">Modifica</a>

                        <form action="{{ route('admin.technologies.destroy', $technology->id) }}" 
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Eliminare tecnologia?')" class="btn btn-danger btn-sm">
                                Elimina
                            </button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr><td colspan="3">Nessuna tecnologia trovata.</td></tr>
            @endforelse
        </tbody>

    </table>

</div>
@endsection
