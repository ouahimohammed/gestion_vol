<!-- resources/views/pilotes/index.blade.php -->
@extends('layouts.app')

@section('title', 'Liste des Pilotes')

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h1>Liste des Pilotes</h1>
            <a href="{{ route('pilotes.create') }}" class="btn btn-light">Ajouter un pilote</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Matricule</th>
                            <th>Nom et Prénom</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pilotes as $pilote)
                            <tr>
                                <td>{{ $pilote->MatPil }}</td>
                                <td>{{ $pilote->NomPrénomPil }}</td>
                                <td>{{ $pilote->AdressePil }}</td>
                                <td>{{ $pilote->TelPil }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('pilotes.edit', $pilote->MatPil) }}" class="btn btn-sm btn-primary">Modifier</a>
                                        <form action="{{ route('pilotes.destroy', $pilote->MatPil) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce pilote?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
