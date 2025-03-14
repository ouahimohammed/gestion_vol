<?php

use App\Http\Controllers\AvionController;
use App\Http\Controllers\PiloteController;
use App\Http\Controllers\VolController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    // Statistiques pour le dashboard
    $avionsCount = DB::table('avions')->count();
    $pilotesCount = DB::table('pilotes')->count();
    $volsCount = DB::table('vols')->count();

    // Vols réalisés vs non réalisés
    $volsRealises = DB::table('vols')->where('VolRéalisé', true)->count();
    $volsNonRealises = DB::table('vols')->where('VolRéalisé', false)->count();

    return view('dashboard', compact(
        'avionsCount',
        'pilotesCount',
        'volsCount',
        'volsRealises',
        'volsNonRealises'
    ));
})->name('dashboard');

// Routes pour les avions
Route::resource('avions', AvionController::class);

// Routes pour les pilotes
Route::resource('pilotes', PiloteController::class);

// Routes pour les vols
Route::resource('vols', VolController::class);

