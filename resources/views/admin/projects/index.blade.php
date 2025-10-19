@extends('layouts.admin')


@section('content')
    <h1>Show projects table</h1>
    <a class="btn btn-dark" href="{{ route('admin.projects.create') }}" role="button">Create project</a>

    @include('partials.session_message')

    <div class="table-responsive">
        <table class="table table-striped
    table-hover
    table-borderless
    table-primary
    align-middle">
            <thead class="table-light">

                <tr>
                    <th>ID</th>
                    <th>IMG</th>
                    <th>NAME</th>
                    <th>ACTIONS</th>

                </tr>
            </thead>
            <tbody class="table-group-divider">


                @forelse ($projects as $project)
                    <tr class="table-primary">
                        <td scope="row">{{ $project->id }}</td>
                        <td><img height="100" src={{ asset('img/' . $project->cover_image) }} alt="{{ $project->title }}"></td>
                        <td>{{ $project->title }}</td>

                        <td>
                            <a name="show" id="show" class="btn btn-primary"
                                href="{{ route('admin.projects.show', $project->slug) }}" role="button"><i
                                    class="fas fa-eye"></i></a>
                            <a name="edit" id="edit" class="btn btn-success"
                                href="{{ route('admin.projects.edit', $project->slug) }}" role="button"><i
                                    class="fas fa-edit"></i></a>

                            <button type="button" class="btn btn-danger " data-bs-toggle="modal"
                                data-bs-target="#modal-{{ $project->id }}">
                                <i class="fas fa-trash fa-sm fa-fw"></i>
                            </button>
                            <!-- Modal Body -->
                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                            <div class="modal fade" id="modal-{{ $project->id }}" tabindex="-1" data-bs-backdrop="static"
                                data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{ $project->id }}"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitle-{{ $project->id }}">Delete this project
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            {{$project->title}}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>


                                            <form action="{{ route('admin.projects.destroy', $project) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Confirm</button>
                                            </form>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>

                    </tr>
                @empty
                    <tr class="table-primary">
                        <td scope="row">No projects yet.</td>

                    </tr>
                @endforelse
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>
@endsection
