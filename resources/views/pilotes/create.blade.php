<!-- resources/views/pilotes/create.blade.php -->
@extends('layouts.app')

@section('title', 'Ajouter un Pilote')

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h1>Ajouter un Pilote</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('pilotes.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="MatPil" class="form-label">Matricule du pilote</label>
                    <input type="text" name="MatPil" id="MatPil" class="form-control @error('MatPil') is-invalid @enderror" value="{{ old('MatPil') }}" maxlength="8" required>
                    <small class="form-text text-muted">Format recommandé: PIL00001</small>
                    @error('MatPil')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="NomPrénomPil" class="form-label">Nom et prénom du pilote</label>
                    <input type="text" name="NomPrénomPil" id="NomPrénomPil" class="form-control @error('NomPrénomPil') is-invalid @enderror" value="{{ old('NomPrénomPil') }}" maxlength="50" required>
                    @error('NomPrénomPil')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="AdressePil" class="form-label">Adresse du pilote</label>
                    <textarea name="AdressePil" id="AdressePil" class="form-control @error('AdressePil') is-invalid @enderror" maxlength="150" required>{{ old('AdressePil') }}</textarea>
                    @error('AdressePil')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="TelPil" class="form-label">Téléphone du pilote</label>
                    <input type="text" name="TelPil" id="TelPil" class="form-control @error('TelPil') is-invalid @enderror" value="{{ old('TelPil') }}" maxlength="8" required>
                    <small class="form-text text-muted">Format: 8 chiffres sans espaces</small>
                    @error('TelPil')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('pilotes.index') }}" class="btn btn-secondary">Annuler</a>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
@endsection
