@extends('layouts.app')

@section('title', 'Liste des Vols')

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h1>Liste des Vols</h1>
            <a href="{{ route('vols.create') }}" class="btn btn-light">Ajouter un vol</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Numéro</th>
                            <th>Modèle de l'avion</th>
                            <th>Nom du pilote</th>
                            <th>Date du vol</th>
                            <th>Départ</th>
                            <th>Arrivée</th>
                            <th>Passagers</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vols as $vol)
                            <tr>
                                <td>{{ $vol->NumVol }}</td>
                                <td>{{ $vol->ModèleAv }}</td>
                                <td>{{ $vol->NomPrénomPil }}</td>
                                <td>{{ date('d/m/Y', strtotime($vol->DateVol)) }}</td>
                                <td>{{ $vol->VilleDép }}</td>
                                <td>{{ $vol->VilleArr }}</td>
                                <td>{{ $vol->NbrePass }}</td>
                                <td>
                                    @if($vol->VolRéalisé)
                                        <span class="badge bg-success">Réalisé</span>
                                    @else
                                        <span class="badge bg-warning">Non réalisé</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('vols.edit', $vol->NumVol) }}" class="btn btn-sm btn-primary">Modifier</a>
                                        <form action="{{ route('vols.destroy', $vol->NumVol) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce vol?')">
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
