@extends('layouts.app')

@section('title', 'Modifier l\'article')
@section('titleHeader', 'Modifier l\'article')

@section('content')
<form action="{{ route('article.update', $article->id) }}" method="POST" class="needs-validation" novalidate>
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="titre">Titre :</label>
        <input type="text" class="form-control" id="titre" name="titre" value="{{ $article->titre }}" required>
        <div class="invalid-feedback">
            Veuillez entrer un titre.
        </div>
    </div>

    <div class="form-group">
        <label for="contenu">Contenu :</label>
        <textarea class="form-control" id="contenu" name="contenu" required>{{ $article->contenu }}</textarea>
        <div class="invalid-feedback">
            Veuillez entrer le contenu.
        </div>
    </div>

    <div class="form-group">
        <label for="date_de_creation">Date de création :</label>
        <input type="date" id="date_de_creation" name="date_de_creation" class="form-control" value="{{ $article->date_de_creation }}">
        <div class="invalid-feedback">
            Veuillez entrer une date de création valide.
        </div>
    </div>

    <div class="form-group">
        <label for="langue">Langue :</label>
        <select class="form-control" id="langue" name="langue" required>
            <option value="en" {{ $article->langue == 'en' ? 'selected' : '' }}>Anglais</option>
            <option value="fr" {{ $article->langue == 'fr' ? 'selected' : '' }}>Français</option>
        </select>
        <div class="invalid-feedback">
            Veuillez sélectionner une langue.
        </div>
    </div>

    <div class="form-group">
        <label for="etudient_id">Étudiant :</label>
        <select class="form-control" id="etudient_id" name="etudient_id" required>
            @foreach($etudiants as $etudiant)
            <option value="{{ $etudiant->id }}" {{ $article->etudient_id == $etudiant->id ? 'selected' : '' }}>{{ $etudiant->nom }}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            Veuillez sélectionner un étudiant valide.
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>
@endsection