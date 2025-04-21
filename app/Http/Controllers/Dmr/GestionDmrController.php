<?php

namespace App\Http\Controllers\Dmr;

use App\Exports\DmrsExport;
use App\Http\Controllers\Controller;
use App\Models\Dmr;
use App\Models\Entite;
use App\Models\ModelDmr;
use App\Models\TypeDmr;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GestionDmrController extends Controller
{
    public function index()
    {
        $entites = Entite::all();
        $models = ModelDmr::all();
        $types = TypeDmr::all();
        $dmrs = Dmr::with(['entite', 'modelDmr', 'typeDmr'])->get();
        return view('gestionDmr.index', compact('dmrs', 'entites', 'models', 'types'));
    }


    public function export()
    {
        return Excel::download(new DmrsExport, 'liste-dmr.xlsx');
    }

    public function create()
    {
        $types = TypeDmr::all();
        $entites = Entite::all();
        $models = ModelDmr::all();

        return view('gestionDmr.create', compact('types', 'entites', 'models'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'serie' => 'required|string',
            'no_ip' => 'required|string',
            'type_dmr_id' => 'required|exists:type_dmrs,id',
            'model_dmr_id' => 'required|exists:model_dmrs,id',
            'entite_id' => 'required|exists:entites,id',
        ]);

        Dmr::create($request->all());

        return redirect()->route('gestion_dmr.index')->with('success', 'Dmr  enregistré avec succès !');
    }

    public function edit($id)
    {
        $dmr = Dmr::findOrFail($id);
        $types = TypeDmr::all();
        $entites = Entite::all();
        $models = ModelDmr::all();

        return view('gestionDmr.edit', compact('dmr', 'types', 'entites', 'models'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'serie' => 'required|string',
            'no_ip' => 'required|string',
            'type_dmr_id' => 'required|exists:type_dmrs,id',
            'model_dmr_id' => 'required|exists:model_dmrs,id',
            'entite_id' => 'required|exists:entites,id',
        ]);

        $dmr = Dmr::findOrFail($id);
        $dmr->update($validatedData);

        return redirect()->route('gestion_dmr.index')->with('success', 'DMR mis à jour avec succès !');
    }


    public function show($id)
    {
        $dmr = Dmr::with(['typeDmr', 'modelDmr', 'entite'])->findOrFail($id);
        return view('gestionDmr.show', compact('dmr'));
    }

    public function destroy($id)
    {
        $dmr = Dmr::findOrFail($id);
        $dmr->delete();

        return redirect()->route('gestion_dmr.index')->with('success', 'Dmr supprimé avec succès !');
    }
}
