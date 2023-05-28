@extends('layouts.app')
@section('title', 'Ajouter un étudiant')
@section('titleHeader', 'Ajouter un nouvel étudiant')
@section('content')
<div class="container">
    <form method="POST" action="{{ route('etudiants.store') }}">
        @csrf
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" required>
        </div>
        <div class="form-group">
            <label for="phone">Numéro de Téléphone</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="date_de_naissance">Date de Naissance</label>
            <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance" required>
        </div>
        <div class="form-group">
            <label for="ville_id">Ville</label>
            <select class="form-control" id="ville_id" name="ville_id">
                @foreach($villes as $ville)
                    <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-5">Ajouter</button>
        <a href="{{ route('etudiants.index') }}" class="btn btn-danger mt-5">Retour</a>
    </form>
</div>
@endsection
