@extends('layouts.app')
@section('title', 'Liste des étudiants')
@section('titleHeader', 'Liste des étudiants')
@section('content')
<div class="container">
    <div>
        <p class="mt-5">Cliquez sur ce bouton si vous voulez ajouter un étudiant</p>
        <a href="{{ route('etudiants.create') }}" class="btn btn-warning ">Ajouter</a>
    </div>

   <table class="table text-white mt-5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Télephone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($etudiants as $etudiant)
                <tr>
                    <td>{{ $etudiant->id }}</td>
                    <td>{{ $etudiant->nom }}</td>
                    <td>{{ $etudiant->email }}</td>
                    <td>{{ $etudiant->phone }}</td>
                    <td>
                        <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="text-warning">Modifier</a>
                        <form method="POST" action="{{ route('etudiants.destroy', $etudiant->id) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
