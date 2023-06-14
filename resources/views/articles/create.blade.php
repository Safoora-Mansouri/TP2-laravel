@extends('layouts.app')
@section('title',trans('lang.text_titleCreatPage'))
@section('titleHeader', trans('lang.text_titleCreatPage'))
@section('content')


<form action="{{ route('article.store') }}" method="POST" class="needs-validation" novalidate>
    <!-- // prevent attack -->
    @csrf

    <div class="form-group">
        <label for="titre_fr">Titre :</label>
        <input type="text" class="form-control" id="titre_fr" name="titre_fr" required>
        <div class="invalid-feedback">
            Veuillez entrer un titre en Français.
        </div>
    </div>

    <div class="form-group">
        <label for="titre_en">Title :</label>
        <input type="text" class="form-control" id="titre_en" name="titre_en" required>
        <div class="invalid-feedback">
            Please insert a Title in English.
        </div>
    </div>

    <div class="form-group">
        <label for="contenu_fr">Contenu :</label>
        <input type="text" class="form-control" id="contenu_fr" name="contenu_fr" required>
        <div class="invalid-feedback">
            Veuillez entrer un contenu en Français.
        </div>
    </div>

    <div class="form-group">
        <label for="contenu_en">Content :</label>
        <input type="text" class="form-control" id="contenu_en" name="contenu_en" required>
        <div class="invalid-feedback">
            Please insert a content in English.
        </div>
    </div>

    <div class="form-group">
        <label for="date_de_creation">{{ __('lang.text_date') }} :</label>

        <input type="date" class="form-control" id="date_de_creation" name="date_de_creation" required>
        <div class="invalid-feedback">
            Veuillez entrer une date de création.
        </div>
    </div>

    <!-- <div class="form-group">
        <label for="langue">Langue :</label>

        <select class="form-control" id="langue" name="langue" required>
            <option value="fr">fr</option>
            <option value="en">en</option>
        </select>
        <div class="invalid-feedback">
            Veuillez choisir une langue valide.
        </div>
    </div> -->

    <!-- <input type="hidden" name="etudient_id" value="{{ @Auth::id() }}"> -->

    <button type="submit" class="btn btn-primary" value="save">{{ __('lang.text_save') }}</button>
</form>
@endsection