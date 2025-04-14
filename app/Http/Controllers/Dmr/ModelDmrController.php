<?php

namespace App\Http\Controllers\Dmr;

use App\Http\Controllers\Controller;
use App\Models\ModelDmr;
use Illuminate\Http\Request;

class ModelDmrController extends Controller
{
    public function index()
    {
        $models = ModelDmr::all();
        return view('model.dmr', compact('models'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:model_dmrs,name',
        ]);

        ModelDmr::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Modèle de Dmr ajouté avec succès.');
    }

    public function update(Request $request, ModelDmr $modelDmr)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:model_dmrs,name,' . $modelDmr->id,
        ]);
        $modelDmr->update([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Modèle de Dmr mis à jour avec succès.');
    }

    public function destroy(ModelDmr $modelDmr)
    {
        $modelDmr->delete();

        return redirect()->back()->with('success', 'Modèle de Dmr supprimé avec succès.');
    }
}
