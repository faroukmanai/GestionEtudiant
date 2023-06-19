@extends('layouts.app')

@section('title', 'Articles')

@section('content')
    <div class="container">
        <h1>Articles</h1>
            
        @foreach($articles as $article)
            <div class="card mt-5">
                <div class="card-header">
                    <h4>{{ $article->{'title_'.app()->getLocale()} }}</h4>
                </div>
                <div class="card-body">
                    <p>{{ $article->{'content_'.app()->getLocale()} }}</p>
                    <p>@lang('lang.text_written_by') : <span class="fw-bold">{{ $article->etudiant->nom }}</span></p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('articles.show', $article->id) }}" class="text-black">@lang('lang.text_view')</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
