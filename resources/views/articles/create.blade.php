@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>@lang('lang.text_create')</h1>
        <form action="{{ route('articles.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title (English)</label>
                <input type="text" name="title_en" id="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="content">Content (English)</label>
                <textarea name="content_en" id="content" class="form-control" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="title">Title (French)</label>
                <input type="text" name="title_fr" id="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="content">Content (French)</label>
                <textarea name="content_fr" id="content" class="form-control" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-warning mt-4">@lang('lang.text_create')</button>
        </form>
    </div>
@endsection
