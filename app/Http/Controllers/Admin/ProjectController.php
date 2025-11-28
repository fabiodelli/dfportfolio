<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateProjectRequest;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Models\Project;
use App\Models\Type;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderByDesc('id')->paginate(8);

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $technologies = Technology::all();
        $selectedTechnologies = [];

        $types = Type::all();
        $selectedTypes = [];

        return view('admin.projects.create', compact(
            'technologies',
            'selectedTechnologies',
            'types',
            'selectedTypes'
        ));
    }

    public function store(StoreProjectRequest $request)
    {
        $val_data = $request->validated();

        $slug = Project::generateSlug($val_data['title']);
        $val_data['slug'] = $slug;
        $val_data['is_featured'] = $request->has('is_featured');

        // crea il progetto
        $project = Project::create($val_data);

        // TECHNOLOGIES (pivot)
        $technologies = $request->input('technologies', []);
        if (!empty($technologies)) {
            $project->technologies()->attach($technologies);
        }

        // TYPE (belongsTo)
        $typeId = $request->input('type_id');
        if ($typeId) {
            $type = Type::find($typeId);
            if ($type) {
                $project->type()->associate($type);
                $project->save();
            }
        }

        return to_route('admin.projects.index')
            ->with('message', 'Project created successfully');
    }

    public function show(Project $project)
    {
        $types = $project->type;               // single type (belongsTo)
        $technologies = $project->technologies;

        return view('admin.projects.show', compact(
            'project',
            'technologies',
            'types'
        ));
    }

    public function edit(Project $project)
    {
        $technologies = Technology::all();
        $selectedTechnologies = $project->technologies()->pluck('id')->toArray();

        $types = Type::all();
        // se il progetto ha un type, prendo il suo id, altrimenti array vuoto
        $selectedTypes = $project->type ? [$project->type->id] : [];

        return view('admin.projects.edit', compact(
            'project',
            'types',
            'selectedTypes',
            'technologies',
            'selectedTechnologies'
        ));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $val_data = $request->validated();

        $slug = Project::generateSlug($val_data['title']);
        $val_data['slug'] = $slug;
        $val_data['is_featured'] = $request->has('is_featured');

        // aggiorna campi base
        $project->update($val_data);

        // TECHNOLOGIES (pivot sync)
        $technologies = $request->input('technologies', []);
        $project->technologies()->sync($technologies);

        // TYPE (belongsTo)
        $typeId = $request->input('type_id');
        if ($typeId) {
            $type = Type::find($typeId);
            if ($type) {
                $project->type()->associate($type);
                $project->save();
            }
        } else {
            // se deselezioni il type
            $project->type()->dissociate();
            $project->save();
        }

        return to_route('admin.projects.index')
            ->with('message', 'Project: ' . $project->title . ' updated');
    }

    public function destroy(Project $project)
    {
        $title = $project->title;

        // stacco le tecnologie prima di cancellare (opzionale ma pulito)
        $project->technologies()->detach();

        $project->delete();

        return to_route('admin.projects.index')
            ->with('message', 'Project: ' . $title . ' deleted');
    }
}
