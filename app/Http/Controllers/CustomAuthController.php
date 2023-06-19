<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Récupère toutes les villes
        $villes = Ville::all();

        // Passe les villes à la vue
        return view('auth.create', compact('villes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'nom' => 'required|string',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|regex:/^(?=.*[A-Z])(?=.*\d).+$/',
    ], [
        'required' => 'Veuillez remplir tous les champs.',
        'string' => 'Le champ :attribute doit être une chaîne de caractères.',
        'email' => 'Veuillez entrer une adresse email valide.',
        'unique' => 'Cette adresse email est déjà utilisée.',
        'min' => 'Le champ :attribute doit contenir au moins :min caractères.',
        'regex' => 'Le champ :attribute doit contenir au moins une lettre majuscule et un chiffre.',
    ]);

    $user = new User;
    $user->fill($request->all());
    $user->password = Hash::make($request->password);
    $user->save();

    // Crée un nouvel étudiant lié à cet utilisateur
    $etudiant = new Etudiant;
    $etudiant->fill($request->all());
    $etudiant->user_id = $user->id;
    $etudiant->save();

    return redirect()->route('welcome')->with('success', 'Utilisateur créé avec succès');
}

    // Authentification
    public function authentification(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentification réussie, rediriger l'utilisateur
            return redirect()->intended(route('welcome'));
        } else {
            // Informations d'identification incorrectes, rediriger avec un message d'erreur
            return redirect()->back()->withErrors([
                'email' => trans('auth.failed'),
            ]);
        }
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }

    // Lister tous les utilisateurs
    public function userList()
    {
        $users = User::select()
            ->orderBy('id')
            ->paginate(20);

        return view('auth.user-list', ['users' => $users]);
    }
}
