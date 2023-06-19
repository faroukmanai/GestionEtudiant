<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = Etudiant::all();

        return view('etudiants.index', ['etudiants' => $etudiants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = \App\Models\Ville::all();
        return view('etudiants.create', ['villes' => $villes]);
        // return view('login');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//     public function store(Request $request)
// {
//     $etudiant = Etudiant::create([
//         'nom' => $request->nom,
//         'adresse' => $request->adresse,
//         'phone' => $request->phone,
//         'email' => $request->email,
//         'date_de_naissance' => $request->date_de_naissance,
//         'ville_id' => $request->ville_id,
//     ]);

//     return redirect()->route('etudiants.show', $etudiant->id);
// }
public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'adresse' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'date_de_naissance' => 'required|date',
            'ville_id' => 'required|exists:villes,id',
            'password' => 'required|min:6|regex:/^(?=.*[A-Z])(?=.*\d).+$/',
        ], [
            'required' => 'Veuillez remplir tous les champs.',
            'string' => 'Le champ :attribute doit être une chaîne de caractères.',
            'email' => 'Veuillez entrer une adresse email valide.',
            'unique' => 'Cette adresse email est déjà utilisée.',
            'date' => 'Veuillez entrer une date valide.',
            'exists' => 'La :attribute sélectionnée est invalide.',
            'min' => 'Le champ :attribute doit contenir au moins :min caractères.',
            'regex' => 'Le champ :attribute doit contenir au moins une lettre majuscule et un chiffre.',
        ]);

        // Créer un utilisateur avec le nom, l'email et le mot de passe
        $user = User::create([
            'name' => $validatedData['nom'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Créer un étudiant lié à l'utilisateur avec les autres données
        $etudiant = Etudiant::create([
            'nom' => $validatedData['nom'],
            'adresse' => $validatedData['adresse'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'date_de_naissance' => $validatedData['date_de_naissance'],
            'ville_id' => $validatedData['ville_id'],
            'user_id' => $user->id,
        ]);

        return redirect()->route('etudiants.show', $etudiant->id)->with('success', 'Étudiant créé avec succès');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etudiant = Etudiant::find($id);
        return view('etudiants.show', ['etudiant' => $etudiant]);
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        $villes = \App\Models\Ville::all();
        return view('etudiants.edit', ['etudiant' => $etudiant, 'villes' => $villes]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'adresse' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $etudiant->user_id,
            'date_de_naissance' => 'required|date',
            'ville_id' => 'required|exists:villes,id',
        ], [
            'required' => 'Veuillez remplir tous les champs.',
            'string' => 'Le champ :attribute doit être une chaîne de caractères.',
            'email' => 'Veuillez entrer une adresse email valide.',
            'unique' => 'Cette adresse email est déjà utilisée.',
            'date' => 'Veuillez entrer une date valide.',
            'exists' => 'La :attribute sélectionnée est invalide.',
        ]);

        $etudiant->update($validatedData);

        return redirect()->route('etudiants.show', $etudiant->id)->with('success', 'Étudiant mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();

        return redirect()->route('etudiants.index');
    }
}
