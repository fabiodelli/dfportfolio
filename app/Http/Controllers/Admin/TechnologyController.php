<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::orderBy('name')->get();

        return view('admin.technologies.index', compact('technologies'));
    }

    public function create()
    {
        return view('admin.technologies.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'  => 'required|string|max:255|unique:technologies,name',
            'image' => 'nullable|string|max:255', // Changed to string for URL
        ]);

        // slug dal nome
        $data['slug'] = Technology::generateSlug($data['name']);

        // Image is now a simple string (URL) assignment
        // $data['image'] is already in $data from validate if present

        Technology::create($data);

        return redirect()
            ->route('admin.technologies.index')
            ->with('success', 'Tecnologia creata');
    }


    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    public function update(Request $request, Technology $technology)
    {
        $data = $request->validate([
            'name'  => 'required|string|max:255|unique:technologies,name,' . $technology->id,
            'image' => 'nullable|string|max:255', // Changed to string for URL
        ]);

        // aggiorna slug se cambia il nome
        $data['slug'] = Technology::generateSlug($data['name']);

        // Image is updated automatically via $technology->update($data)
        // No need to handle file storage or deletion

        $technology->update($data);

        return redirect()
            ->route('admin.technologies.index')
            ->with('success', 'Tecnologia aggiornata');
    }

    public function destroy(Technology $technology)
    {
        // No file to delete since we are using URLs
        // If you were deleting local files before, you might want to keep that logic ONLY if it detects a local path,
        // but for now we are switching to URLs as requested.

        $technology->delete();

        return redirect()
            ->route('admin.technologies.index')
            ->with('success', 'Tecnologia eliminata');
    }
}
