<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::orderBy('type')->get();
        return view('admin.types.index', compact('types'));
    }

    public function create()
    {
        return view('admin.types.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|string|max:255|unique:types,type',
        ]);

        Type::create($data);

        return redirect()->route('admin.types.index')
                         ->with('success', 'Tipo creato');
    }

    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        $data = $request->validate([
            'type' => 'required|string|max:255|unique:types,type,' . $type->id,
        ]);

        $type->update($data);

        return redirect()->route('admin.types.index')
                         ->with('success', 'Tipo aggiornato');
    }

    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('admin.types.index')
                         ->with('success', 'Tipo eliminato');
    }
}
