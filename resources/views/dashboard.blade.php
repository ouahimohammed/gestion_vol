@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="card-title mb-0">📊 Dashboard</h1>
        </div>
        <div class="card-body">
            <!-- Statistiques principales -->
            <div class="row">
                <!-- Avions -->
                <div class="col-md-4">
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body text-center">
                            <h3 class="card-title">✈️ Avions</h3>
                            <h2 class="display-4 text-primary">{{ $avionsCount }}</h2>
                            <a href="{{ route('avions.index') }}" class="btn btn-primary btn-lg">
                                <i class="fas fa-eye me-2"></i>Voir les avions
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Pilotes -->
                <div class="col-md-4">
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body text-center">
                            <h3 class="card-title">👨‍✈️ Pilotes</h3>
                            <h2 class="display-4 text-success">{{ $pilotesCount }}</h2>
                            <a href="{{ route('pilotes.index') }}" class="btn btn-success btn-lg">
                                <i class="fas fa-eye me-2"></i>Voir les pilotes
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Vols -->
                <div class="col-md-4">
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body text-center">
                            <h3 class="card-title">🛫 Vols</h3>
                            <h2 class="display-4 text-warning">{{ $volsCount }}</h2>
                            <a href="{{ route('vols.index') }}" class="btn btn-warning btn-lg">
                                <i class="fas fa-eye me-2"></i>Voir les vols
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistiques supplémentaires -->
            <div class="row mt-4">
                <!-- Statut des vols -->
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-info text-white">
                            <h3 class="card-title mb-0">📊 Statut des vols</h3>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-around">
                                <div class="text-center">
                                    <h4>✅ Réalisés</h4>
                                    <h3 class="text-success">{{ $volsRealises }}</h3>
                                </div>
                                <div class="text-center">
                                    <h4>⏳ Non réalisés</h4>
                                    <h3 class="text-warning">{{ $volsNonRealises }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions rapides -->
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-purple text-white">
                            <h3 class="card-title mb-0 text-black">⚡ Actions rapides</h3>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-3">
                                <a href="{{ route('avions.create') }}" class="btn btn-outline-primary btn-lg">
                                    <i class="fas fa-plus me-2"></i>Ajouter un avion
                                </a>
                                <a href="{{ route('pilotes.create') }}" class="btn btn-outline-success btn-lg">
                                    <i class="fas fa-plus me-2"></i>Ajouter un pilote
                                </a>
                                <a href="{{ route('vols.create') }}" class="btn btn-outline-warning btn-lg">
                                    <i class="fas fa-plus me-2"></i>Ajouter un vol
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
