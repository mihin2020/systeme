<?php

namespace App\Http\Controllers\Dmr;

use App\Http\Controllers\Controller;
use App\Models\TypeDmr;
use Illuminate\Http\Request;

class TypeDmrController extends Controller
{
    public function index()
    {
        $types = TypeDmr::all();
        return view('type.dmr', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:type_dmrs,name',
        ]);

        TypeDmr::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Type de dmr ajouté avec succès.');
    }

    public function update(Request $request, TypeDmr $typeDmr)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:type_dmrs,name,' . $typeDmr->id,
        ]);

        $typeDmr->update([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Type de Dmr mis à jour avec succès.');
    }

    public function destroy(TypeDmr $typeDmr)
    {
        $typeDmr->delete();

        return redirect()->back()->with('success', 'Type de Dmr supprimé avec succès.');
    }
}
