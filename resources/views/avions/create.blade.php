<!-- resources/views/avions/create.blade.php -->
@extends('layouts.app')

@section('title', 'Ajouter un Avion')

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h1>Ajouter un Avion</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('avions.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="CodeAv" class="form-label">Code de l'avion</label>
                    <input type="text" name="CodeAv" id="CodeAv" class="form-control @error('CodeAv') is-invalid @enderror" value="{{ old('CodeAv') }}" maxlength="4" required>
                    <small class="form-text text-muted">Format recommandé: 4 caractères (ex: AB01)</small>
                    @error('CodeAv')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="ModèleAv" class="form-label">Modèle de l'avion</label>
                    <input type="text" name="ModèleAv" id="ModèleAv" class="form-control @error('ModèleAv') is-invalid @enderror" value="{{ old('ModèleAv') }}" maxlength="50" required>
                    <small class="form-text text-muted">Ex: Boeing 737-800, Airbus A320, etc.</small>
                    @error('ModèleAv')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="CapacitéAv" class="form-label">Capacité de l'avion</label>
                    <input type="number" name="CapacitéAv" id="CapacitéAv" class="form-control @error('CapacitéAv') is-invalid @enderror" value="{{ old('CapacitéAv', 50) }}" min="50" required>
                    <small class="form-text text-muted">Nombre de passagers (minimum 50)</small>
                    @error('CapacitéAv')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('avions.index') }}" class="btn btn-secondary">Annuler</a>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
@endsection
