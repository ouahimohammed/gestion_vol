@extends('layouts.app')

@section('title', 'Liste des Avions')

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h1>Liste des Avions</h1>
            <a href="{{ route('avions.create') }}" class="btn btn-light">Ajouter un avion</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Modèle</th>
                            <th>Capacité</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($avions as $avion)
                            <tr>
                                <td>{{ $avion->CodeAv }}</td>
                                <td>{{ $avion->ModèleAv }}</td>
                                <td>{{ $avion->CapacitéAv }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('avions.edit', $avion->CodeAv) }}" class="btn btn-sm btn-primary">Modifier</a>
                                        <form action="{{ route('avions.destroy', $avion->CodeAv) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet avion?')">
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
