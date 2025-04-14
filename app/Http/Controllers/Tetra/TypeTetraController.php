<?php

namespace App\Http\Controllers\Tetra;

use App\Http\Controllers\Controller;
use App\Models\TypeTetra;
use Illuminate\Http\Request;


class TypeTetraController extends Controller
{
    public function index()
    {
        $types = TypeTetra::all();
        return view('type.tetra', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:type_tetras,name',
        ]);

        TypeTetra::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Type de Tetra ajouté avec succès.');
    }

    public function update(Request $request, TypeTetra $typeTetra)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:type_tetras,name,' . $typeTetra->id,
        ]);

        $typeTetra->update([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Type de Tetra mis à jour avec succès.');
    }

    public function destroy(TypeTetra $typeTetra)
    {
        $typeTetra->delete();

        return redirect()->back()->with('success', 'Type de Tetra supprimé avec succès.');
    }
}

