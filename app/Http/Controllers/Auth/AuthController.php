<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->statut != true) {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Votre compte est désactivé. Veuillez contacter l\'administrateur.',
                ])->onlyInput('email');
            }

            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Ces identifiants sont incorrects.',
        ])->onlyInput('email');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.create');
    }

    public function register()
    {
        return view('auth.register');
    }


    public function store(Request $request)
    {
        // Validation des données du formulaire
        $validated = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ]);

        // Création de l'utilisateur
        User::create([
            'firstname' => $validated['firstname'],
            'lastname' => $validated['lastname'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'statut' => true, // Valeur par défaut, optionnel
        ]);

        // Redirection vers le tableau de bord ou autre page
        return redirect()->route('auth.create')->with('success', 'Compte créé avec succès !');
    }
}
