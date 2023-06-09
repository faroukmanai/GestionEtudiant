@extends('layouts.app')
@section('title', trans('lang.text_registration'))
@section('titleHeader', trans('lang.text_registration'))
@section('content')
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <!-- Champ Nom -->
                        <input type="text" class="form-control mt-3" name="nom" placeholder="Nom de l'étudiant" value="{{ old('nom') }}">
                        @if($errors->has('nom'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('nom') }}
                            </div>
                        @endif

                        <!-- Champ Adresse -->
                        <input type="text" class="form-control mt-3" name="adresse" placeholder="Adresse de l'étudiant" value="{{ old('adresse') }}">
                        @if($errors->has('adresse'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('adresse') }}
                            </div>
                        @endif

                        <!-- Champ Numéro de Téléphone -->
                        <input type="text" class="form-control mt-3" name="phone" placeholder="Numéro de téléphone de l'étudiant" value="{{ old('phone') }}">
                        @if($errors->has('phone'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif

                        <!-- Champ Email -->
                        <input type="email" class="form-control mt-3" name="email" placeholder="Adresse e-mail" value="{{ old('email') }}">
                        @if($errors->has('email'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('email') }}
                            </div>
                        @endif

                        <!-- Champ Date de Naissance -->
                        <input type="date" class="form-control mt-3" name="date_de_naissance" placeholder="Date de naissance de l'étudiant" value="{{ old('date_de_naissance') }}">
                        @if($errors->has('date_de_naissance'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('date_de_naissance') }}
                            </div>
                        @endif

                        <!-- Champ Ville -->
                        <select class="form-control mt-3" name="ville_id">
                            @foreach($villes as $ville)
                                <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('ville_id'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('ville_id') }}
                            </div>
                        @endif

                        <!-- Champ Mot de passe -->
                        <input type="password" class="form-control mt-3" name="password" placeholder="Mot de passe">
                        @if($errors->has('password'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                    <div class="card-footer d-grid mx-auto">
                        <input type="submit" value="Enregistrer" class="btn btn-dark btn-block">
                    </div>
                </form>
            </
