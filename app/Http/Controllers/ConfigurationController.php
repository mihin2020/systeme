<?php

namespace App\Http\Controllers;

use App\Models\Entite;
use App\Models\User;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    public function index()
    {
        return view('configuration.index');
    }

    public function userList()
    {
        $users = User::where('role', '!=', 'Super administrateur')->get();
        return view('configuration.users', compact('users'));
    }


    public function desactiverUser($id)
    {
        $user = User::findOrFail($id);
        $user->statut = false;
        $user->save();

        return redirect()->back()->with('success', 'Utilisateur désactivé avec succès.');
    }
    public function activerUser($id)
    {
        $user = User::findOrFail($id);
        $user->statut = true;
        $user->save();

        return redirect()->back()->with('success', 'Utilisateur activé avec succès.');
    }


    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255|unique:entites,name,' ,
    ]);

    $entite = Entite::findOrFail($id);
    $entite->name = $request->name;
    $entite->save();

    return redirect()->back()->with('success', 'Entité mise à jour avec succès.');
}


        public function destroy($id)
        {
            // Find the configuration by ID
            $entite = Entite::find($id);

            if (!$entite) {
                return redirect()->back()->with('error', 'Configuration not found.');
            }

            // Delete the configuration
            $entite->delete();

            return redirect()->route('configuration.index')->with('success', 'Configuration deleted successfully.');
        }
    
}
