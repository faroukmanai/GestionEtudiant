@extends('layouts.app')
@section('title', 'voir un étudiant')
@section('titleHeader', "Les informations d'un étudiant")
@section('content')

<div class="container">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $etudiant->nom }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $etudiant->email }}</h6>
            <p class="card-text">
                Adresse: {{ $etudiant->adresse }}<br>
                Téléphone: {{ $etudiant->phone }}<br>
                Date de Naissance: {{ $etudiant->date_de_naissance }}<br>
                
            </p>
            <a href="{{ route('etudiants.index') }}" class="card-link">Retour</a>
        </div>
    </div>
</div>
@endsection







