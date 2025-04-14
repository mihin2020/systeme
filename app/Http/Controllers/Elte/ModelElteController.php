<?php

namespace App\Http\Controllers\Elte;

use App\Http\Controllers\Controller;
use App\Models\ModelElte;
use Illuminate\Http\Request;

class ModelElteController extends Controller
{
    public function index()
    {
        $models = ModelElte::all();
        return view('model.elte', compact('models'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:model_eltes,name',
        ]);

        ModelElte::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Modèle Elte ajouté avec succès.');
    }

    public function update(Request $request, ModelElte $modelElte)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:model_eltes,name,' . $modelElte->id,
        ]);

        $modelElte->update([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Modèle E-lte mis à jour avec succès.');
    }

    public function destroy(ModelElte $modelElte)
    {
        $modelElte->delete();

        return redirect()->back()->with('success', 'Modèle E-lte supprimé avec succès.');
    }
}
