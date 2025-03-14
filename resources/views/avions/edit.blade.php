<!-- resources/views/avions/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Modifier un Avion')

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h1>Modifier l'avion: {{ $avion->CodeAv }}</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('avions.update', $avion->CodeAv) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="CodeAv" class="form-label">Code de l'avion</label>
                    <input type="text" id="CodeAv" class="form-control" value="{{ $avion->CodeAv }}" disabled>
                    <small class="text-muted">Le code de l'avion ne peut pas être modifié</small>
                </div>

                <div class="mb-3">
                    <label for="ModèleAv" class="form-label">Modèle de l'avion</label>
                    <input type="text" name="ModèleAv" id="ModèleAv" class="form-control @error('ModèleAv') is-invalid @enderror" value="{{ old('ModèleAv', $avion->ModèleAv) }}" maxlength="50">
                    @error('ModèleAv')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="CapacitéAv" class="form-label">Capacité de l'avion</label>
                    <input type="number" name="CapacitéAv" id="CapacitéAv" class="form-control @error('CapacitéAv') is-invalid @enderror" value="{{ old('CapacitéAv', $avion->CapacitéAv) }}" min="50">
                    @error('CapacitéAv')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('avions.index') }}" class="btn btn-secondary">Annuler</a>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
@endsection
