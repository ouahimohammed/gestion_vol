<!-- resources/views/pilotes/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Modifier un Pilote')

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h1>Modifier le pilote: {{ $pilote->NomPrénomPil }}</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('pilotes.update', $pilote->MatPil) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="MatPil" class="form-label">Matricule du pilote</label>
                    <input type="text" id="MatPil" class="form-control" value="{{ $pilote->MatPil }}" disabled>
                    <small class="text-muted">Le matricule du pilote ne peut pas être modifié</small>
                </div>

                <div class="mb-3">
                    <label for="NomPrénomPil" class="form-label">Nom et prénom du pilote</label>
                    <input type="text" name="NomPrénomPil" id="NomPrénomPil" class="form-control @error('NomPrénomPil') is-invalid @enderror" value="{{ old('NomPrénomPil', $pilote->NomPrénomPil) }}" maxlength="50">
                    @error('NomPrénomPil')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="AdressePil" class="form-label">Adresse du pilote</label>
                    <textarea name="AdressePil" id="AdressePil" class="form-control @error('AdressePil') is-invalid @enderror" maxlength="150">{{ old('AdressePil', $pilote->AdressePil) }}</textarea>
                    @error('AdressePil')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="TelPil" class="form-label">Téléphone du pilote</label>
                    <input type="text" name="TelPil" id="TelPil" class="form-control @error('TelPil') is-invalid @enderror" value="{{ old('TelPil', $pilote->TelPil) }}" maxlength="8">
                    @error('TelPil')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('pilotes.index') }}" class="btn btn-secondary">Annuler</a>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
@endsection
