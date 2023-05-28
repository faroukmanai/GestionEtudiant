@extends('layouts.app')
@section('title', 'Modifier un étudiant')

@section('content')
<div class="container">
    <h1>Modifier l'étudiant : {{ $etudiant->nom }}</h1>
    <form method="POST" action="{{ route('etudiants.update', $etudiant->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $etudiant->nom }}" required>
        </div>
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $etudiant->adresse }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Téléphone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $etudiant->phone }}" required>
        </div>
        <div class="form-group">
            <label for="email">Courriel</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $etudiant->email }}" required>
        </div>
        <div class="form-group">
            <label for="ville_id">Ville</label>
            <select class="form-control" id="ville_id" name="ville_id">
                @foreach($villes as $ville)
                    <option value="{{ $ville->id }}" {{ $etudiant->ville_id == $ville->id ? 'selected' : '' }}>{{ $ville->nom }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-5">Mettre à jour</button>
        <a href="{{ route('etudiants.index') }}" class="btn btn-danger mt-5">Retour</a>
    </form>
</div>
@endsection
