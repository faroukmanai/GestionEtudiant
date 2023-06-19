@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <div class="container">
        
        <div class="d-flex justify-content-between align-items-center">
            <h1>{{ $article->title }}</h1>
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Retour</a>
        </div>
        
        <ul class="nav nav-tabs mt-4">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#english">View in English</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#french">Voir en français</a>
            </li>
        </ul>
        
        <div class="tab-content mt-4">
            <div class="tab-pane fade show active" id="english">
                <div class="card">
                    <div class="card-body">
                        <h4>{{ $article->title_en }}</h4>
                        <p>{{ $article->content_en }}</p>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="french">
                <div class="card">
                    <div class="card-body">
                        <h4>{{ $article->title_fr }}</h4>
                        <p>{{ $article->content_fr }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card-footer d-flex justify-content-between mt-3">
            @auth
                @if ($article->etudiant_id === Auth::user()->etudiant->id)
                <div>
                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-link text-black">Modifier</a>
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link text-black">Supprimer</button>
                    </form>
                </div>  
                @endif
            @endauth
            <div>
                <a href="{{ route('showPdf', $article->id) }}" class="btn btn-warning " target="_blank">Voir en PDF</a>
            </div>
        </div>
    </div>
@endsection
