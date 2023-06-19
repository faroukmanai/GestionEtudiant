@extends('layouts.app')

@section('title', 'Liste des utilisateurs')

@section('content')
    <div class="card mt-3">
        <div class="card-body">
        <ul class="list-group">
            @foreach($users as $user)
                <li class="list-group-item">
                    <div class="d-flex align-items-center justify-content-between">
                        <span>{{ $user->id }}</span>
                        <span>{{ $user->name }}</span>
                        <span>{{ $user->email }}</span>
                    </div>
                </li>
            @endforeach
        </ul>
        </div>
    </div>

    <div class="mt-3">
    {{ $users->render('pagination::simple-bootstrap-4') }}
</div>

@endsection
