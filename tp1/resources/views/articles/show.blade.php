@extends('layouts.app')
@section('title', 'Détails de l'article')
@section('titleHeader', 'Détails de l'article')
@section('content')

<div class="content-wrapper">
    php
    Copy code
    <div class="custom-card ">
        <a href="{{ route('article.edit', $article->id) }}" class="btn btn-primary m-2">Modifier</a>
        <form action="{{ route('article.destroy', $article->id) }}" method="post" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
        <div class="article-info bg-success">
            <h3 class="text-white text-center">Informations sur l'article</h3>
            <ul class="list-group">
                <li class="list-group-item">
                    <span class="font-weight-bold">ID de l'article :</span> {{ $article->id }}<br>
                    <span class="font-weight-bold">Titre :</span> {{ $article->titre }}<br>
                    <span class="font-weight-bold">Contenu :</span> {{ $article->contenu }}<br>
                    <span class="font-weight-bold">Date de création :</span> {{ $article->date_de_creation }}<br>
                    <span class="font-weight-bold">Langue :</span> {{ $article->langue }}<br>
                    <span class="font-weight-bold">ID de l'étudiant :</span> {{ $article->etudient_id }}<br>
                    <span class="font-weight-bold">Créé le :</span> {{ $article->created_at }}<br>
                    <span class="font-weight-bold">Mis à jour le :</span> {{ $article->updated_at }}
                </li>
            </ul>
        </div>

        <a href="{{ route('article.index') }}" class="btn btn-primary mt-3">
            <i class="fas fa-arrow-left"></i> Retour à la liste des articles
        </a>
    </div>
</div>
@endsection