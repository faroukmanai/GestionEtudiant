@extends('layouts.app')

@section('title', trans('lang.text_edit'))

@section('content')
    <div class="container">
        <h1>@lang('lang.text_edit')</h1>
        <form action="{{ route('articles.update', $article->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="title_fr">Titre (français)</label>
                <input type="text" name="title_fr" id="title_fr" class="form-control" value="{{ $article->title_fr }}" required>
            </div>
            
            <div class="form-group">
                <label for="content_fr">Contenu (français)</label>
                <textarea name="content_fr" id="content_fr" class="form-control" required>{{ $article->content_fr }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="title_en">Title (English)</label>
                <input type="text" name="title_en" id="title_en" class="form-control" value="{{ $article->title_en }}" required>
            </div>
            
            <div class="form-group">
                <label for="content_en">Content (English)</label>
                <textarea name="content_en" id="content_en" class="form-control" required>{{ $article->content_en }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-warning mt-3">Save</button>
        </form>
    </div>
@endsection
