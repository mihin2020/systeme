<?php

namespace App\Http\Controllers\Tetra;

use App\Exports\TetrasExport;
use App\Http\Controllers\Controller;
use App\Models\Entite;
use App\Models\ModelTetra;
use App\Models\Tetra;
use App\Models\TypeTetra;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class GestionTetraController extends Controller
{
    public function index()
    {
        $entites = Entite::all();
        $models = ModelTetra::all();
        $tetras = Tetra::with(['entite', 'modelTetra'])->get();
        return view('gestionTetra.index', compact('entites', 'models', 'tetras'));
    }

    public function export() 
{
    return Excel::download(new TetrasExport, 'tetras.xlsx');
}
    

    public function create()
    {
        // $types = TypeTetra::all();
        $entites = Entite::all();
        $models = ModelTetra::all();
    
        return view('gestionTetra.create', compact('entites', 'models'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'serie' => 'required|string',
            // 'type_tetra_id' => 'required|exists:type_tetras,id',
            'model_tetra_id' => 'required|exists:model_tetras,id|unique:tetras,model_tetra_id',
            'entite_id' => 'required|exists:entites,id',
            'numero_appel' => 'required|string',
            'security_group' => 'required|string',
            'numero_group' => 'required|string',
            'talk_group' => 'required|string',
        ]);
    
        Tetra::create($request->all());
    
        return redirect()->route('gestion_tetra.index')->with('success', 'Tetra enregistré avec succès !');
    }

    public function edit($id)
    {
        // Récupère le modèle tetra et les autres données nécessaires
        $tetra = Tetra::findOrFail($id);
        // $types = TypeTetra::all();
        $entites = Entite::all();
        $models = ModelTetra::all();

        return view('gestionTetra.edit', compact('tetra', 'entites', 'models'));
    }


     // Met à jour le modèle tetra
     public function update(Request $request, $id)
     {
         // Validation des données envoyées
         $request->validate([
             'serie' => 'required|string',
            //  'type_tetra_id' => 'required|exists:type_tetras,id',
             'entite_id' => 'required|exists:entites,id',
             'numero_appel' => 'required|string',
             'security_group' => 'required|string',
             'numero_group' => 'required|string',
             'model_tetra_id' => 'required|exists:model_tetras,id',
             'talk_group' => 'required|string',
         ]);
 
         // Trouver le modèle tetra à mettre à jour
         $tetra = Tetra::findOrFail($id);
 
         // Mise à jour des données du modèle
         $tetra->update([
             'serie' => $request->serie,
            //  'type_tetra_id' => $request->type_tetra_id,
             'entite_id' => $request->entite_id,
             'numero_appel' => $request->numero_appel,
             'security_group' => $request->security_group,
             'numero_group' => $request->numero_group,
             'model_tetra_id' => $request->model_tetra_id,
             'talk_group' => $request->talk_group,
         ]);
 
         // Retourner un message de succès et rediriger
         return redirect()->route('gestion_tetra.index')->with('success', 'Tetra mis à jour avec succès.');
     }


     public function show($id)
{
    $tetra = Tetra::with(['entite', 'modelTetra'])->findOrFail($id);

    return view('gestionTetra.show', compact('tetra'));
}

      // Supprime un modèle tetra
    public function destroy($id)
    {
        // Trouver le modèle tetra et le supprimer
        $tetra = Tetra::findOrFail($id);
        $tetra->delete();

        // Retourner un message de succès et rediriger
        return redirect()->route('gestion_tetra.index')->with('success', 'Tetra supprimé avec succès.');
    }
}
