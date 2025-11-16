<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;


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
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('technologies', 'public');
        }

        Technology::create($data);

        return redirect()->route('admin.technologies.index')
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
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($technology->image) {
                \Storage::disk('public')->delete($technology->image);
            }
            $data['image'] = $request->file('image')->store('technologies', 'public');
        }

        $technology->update($data);

        return redirect()->route('admin.technologies.index')
                         ->with('success', 'Tecnologia aggiornata');
    }

    public function destroy(Technology $technology)
    {
        if ($technology->image) {
            \Storage::disk('public')->delete($technology->image);
        }
        $technology->delete();

        return redirect()->route('admin.technologies.index')
                         ->with('success', 'Tecnologia eliminata');
    }
}
