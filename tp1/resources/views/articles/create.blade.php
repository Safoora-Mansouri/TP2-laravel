@extends('layouts.app')

@section('title', 'Ajouter un article')
@section('titleHeader', 'Ajouter un article')

@section('content')
<form action="{{ route('article.store') }}" method="POST" class="needs-validation" novalidate>
    @csrf

    <div class="form-group">
        <label for="titre">Titre :</label>
        <input type="text" class="form-control" id="titre" name="titre" required>
        <div class="invalid-feedback">
            Veuillez entrer un titre.
        </div>
    </div>

    <div class="form-group">
        <label for="contenu">Contenu :</label>
        <input type="text" class="form-control" id="contenu" name="contenu" required>
        <div class="invalid-feedback">
            Veuillez entrer un contenu.
        </div>
    </div>

    <div class="form-group">
        <label for="date_de_creation">Date de création :</label>
        <input type="date" class="form-control" id="date_de_creation" name="date_de_creation" required>
        <div class="invalid-feedback">
            Veuillez entrer une date de création.
        </div>
    </div>

    <div class="form-group">
        <label for="langue">Langue :</label>

        <select class="form-control" id="langue" name="langue" required>
            <option value="fr">fr</option>
            <option value="en">en</option>
        </select>
        <div class="invalid-feedback">
            Veuillez choisir une langue valide.
        </div>
    </div>

    <!-- <input type="hidden" name="etudient_id" value="{{ @Auth::id() }}"> -->

    <button type="submit" class="btn btn-primary" value="save">Enregistrer</button>
</form>
@endsection