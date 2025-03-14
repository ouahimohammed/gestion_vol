@extends('layouts.app')

@section('title', 'Ajouter un Vol')

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h1>Ajouter un Vol</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('vols.store') }}" method="POST">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="CodeAv" class="form-label">Avion</label>
                        <select name="CodeAv" id="CodeAv" class="form-select @error('CodeAv') is-invalid @enderror">
                            <option value="">Sélectionner un avion</option>
                            @foreach($avions as $avion)
                                <option value="{{ $avion->CodeAv }}" {{ old('CodeAv') == $avion->CodeAv ? 'selected' : '' }}>
                                    {{ $avion->CodeAv }} - {{ $avion->ModèleAv }} (Capacité: {{ $avion->CapacitéAv }})
                                </option>
                            @endforeach
                        </select>
                        @error('CodeAv')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="MatPil" class="form-label">Pilote</label>
                        <select name="MatPil" id="MatPil" class="form-select @error('MatPil') is-invalid @enderror">
                            <option value="">Sélectionner un pilote</option>
                            @foreach($pilotes as $pilote)
                                <option value="{{ $pilote->MatPil }}" {{ old('MatPil') == $pilote->MatPil ? 'selected' : '' }}>
                                    {{ $pilote->MatPil }} - {{ $pilote->NomPrénomPil }}
                                </option>
                            @endforeach
                        </select>
                        @error('MatPil')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="DateVol" class="form-label">Date du vol</label>
                        <input type="date" name="DateVol" id="DateVol" class="form-control @error('DateVol') is-invalid @enderror" value="{{ old('DateVol') }}">
                        @error('DateVol')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="VilleDép" class="form-label">Ville de départ</label>
                        <input type="text" name="VilleDép" id="VilleDép" class="form-control @error('VilleDép') is-invalid @enderror" value="{{ old('VilleDép') }}">
                        @error('VilleDép')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="VilleArr" class="form-label">Ville d'arrivée</label>
                        <input type="text" name="VilleArr" id="VilleArr" class="form-control @error('VilleArr') is-invalid @enderror" value="{{ old('VilleArr') }}">
                        @error('VilleArr')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="NbrePass" class="form-label">Nombre de passagers</label>
                        <input type="number" name="NbrePass" id="NbrePass" class="form-control @error('NbrePass') is-invalid @enderror" value="{{ old('NbrePass', 41) }}" min="41">
                        @error('NbrePass')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <div class="form-check mt-4">
                            <input type="checkbox" name="VolRéalisé" id="VolRéalisé" class="form-check-input" value="1" {{ old('VolRéalisé') ? 'checked' : '' }}>
                            <label for="VolRéalisé" class="form-check-label">Vol réalisé</label>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('vols.index') }}" class="btn btn-secondary">Annuler</a>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
@endsection
