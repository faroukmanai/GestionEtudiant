@extends('layouts.app')
@section('title', 'Liste des étudiants')
@section('titleHeader', 'Liste des étudiants')
@section('content')
<div class="container">
<h3><a href="{{ route('etudiants.create') }}">Ajouter un étudiant</a></h3>
   <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Télephone</th>
                <!-- <th>adresse</th> -->
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
                    <!-- <td>{{ $etudiant->adresse }}</td> -->
                    <td>
                        <a href="{{ route('etudiants.edit', $etudiant->id) }}">Modifier</a>
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
