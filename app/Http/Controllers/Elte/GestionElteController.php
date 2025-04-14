<?php

namespace App\Http\Controllers\Elte;

use App\Exports\EltesExport;
use App\Http\Controllers\Controller;
use App\Models\Elte;
use App\Models\Entite;
use App\Models\ModelElte;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class GestionElteController extends Controller
{
    public function index()
    {
        $eltes = Elte::orderBy('created_at', 'desc')->get();
        $entites = Entite::all();
        $models = ModelElte::all();
        return view('gestionElte.index', compact('eltes', 'entites', 'models'));
    }

    public function export()
    {
        return Excel::download(new EltesExport, 'elte-list.xlsx');
    }

    public function create()
    {

        $entites = Entite::all();
        $models = ModelElte::all();

        return view('gestionElte.create', compact('entites', 'models'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'serie' => 'required|string',
            'model_elte_id' => 'required|exists:model_eltes,id',
            'entite_id' => 'required|exists:entites,id',
            'numero_appel' => 'required|string',
        ]);

        Elte::create($request->all());

        return redirect()->route('elte.index')->with('success', 'E-lte  enregistré avec succès !');
    }

    public function edit($id)
    {
        $elte = Elte::findOrFail($id);
        $entites = Entite::all();
        $models = ModelElte::all();

        return view('gestionElte.edit', compact('elte',  'entites', 'models'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'serie' => 'required|string',
            'model_elte_id' => 'required|exists:model_eltes,id',
            'entite_id' => 'required|exists:entites,id',
            'numero_appel' => 'required|string',
        ]);

        $elte = Elte::findOrFail($id);
        $elte->update($validatedData);

        return redirect()->route('elte.index')->with('success', 'E-lte mis à jour avec succès !');
    }


    public function show($id)
    {
        $elte = Elte::findOrFail($id);
        return view('gestionElte.show', compact('elte'));
    }

    public function destroy($id)
    {
        $elte = Elte::findOrFail($id);
        $elte->delete();

        return redirect()->route('elte.index')->with('success', 'E-lte supprimé avec succès !');
    }
}
