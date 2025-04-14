<?php

namespace App\Http\Controllers\Tetra;

use App\Http\Controllers\Controller;
use App\Models\ModelTetra;
use Illuminate\Http\Request;

class ModelTetraController extends Controller
{
    // public function index()
    // {
    //     $models = ModelTetra::all();
    //     return view('model.tetra', compact('models'));
    // }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:model_tetras,name',
        ]);

        ModelTetra::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Modèle de Tetra ajouté avec succès.');
    }

    public function update(Request $request, ModelTetra $modelTetra)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:model_tetras,name,' . $modelTetra->id,
        ]);

        $modelTetra->update([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Modèle de Tetra mis à jour avec succès.');
    }

    public function destroy(ModelTetra $modelTetra)
    {
        $modelTetra->delete();

        return redirect()->back()->with('success', 'Modèle de Tetra supprimé avec succès.');
    }
}
