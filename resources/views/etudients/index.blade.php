@extends('layouts.app')
@section('title', 'list the students')
@section('titleHeader', __('lang.text_header_studentList'))
@section('content')

<div class="container">

    <!-- @lang('lang.text_header_studentList')
    {{ __('lang.text_header_studentList') }} -->
    <h4 class="text-center p-3" style="background-color: #F7FAFC;">You can see list of the students here . For more details, click on the select button.</h4>

    <a href="{{ route('etudient.create') }}" class="btn btn-success m-2">Create</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <!-- <th>Adresse</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Date de Naissance</th>
                <th>Ville ID</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach($etudients as $etudient)
            <tr>
                <td>{{ $etudient->id }}</td>
                <td>{{ $etudient->nom }}</td>

                <!-- <td>{{ $etudient->adresse }}</td>
                <td>{{ $etudient->phone }}</td>
                <td>{{ $etudient->email }}</td>
                <td>{{ $etudient->date_de_naissance }}</td>
                <td>{{ $etudient->ville->nom }}</td> -->
                <td>
                    <div class="butt">
                        <a href="{{ route('showEtudiant', $etudient->id) }}" class="btn btn-primary">select</a>
                        <!-- <form action="{{ route('etudient.destroy', $etudient->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form> -->
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection