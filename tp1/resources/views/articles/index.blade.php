@extends('layouts.app')
@section('title', 'Liste des articles')
@section('titleHeader', 'Liste des articles')
@section('content')

<div class="container">
    javascript
    Copy code
    <h4 class="text-center p-3" style="background-color: #F7FAFC;">Vous pouvez voir la liste des articles ici. Pour plus de détails, cliquez sur le bouton "Sélectionner".</h4>

    @auth
    <a href="{{ route('article.create') }}" class="btn btn-success m-2">Créer</a>
    @endauth

    @guest
    <a class="btn btn-success m-2 disabled">Créer</a>
    @endguest

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Date de création</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td><a href="{{ route('article.edit', ['article' => $article->id]) }}" class="">{{ $article->titre }}</a>
                </td>

                <td>{{ $article->date_de_creation }}</td>
                <td>
                    @if (Auth::check() && $article->etudient_id == $etudiantId)
                    <div class="butt">
                        <!-- <a href="{{ route('showArticle', $article->id) }}" class="btn btn-primary">Sélectionner</a> -->
                        <form action="{{ route('article.destroy', $article->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection