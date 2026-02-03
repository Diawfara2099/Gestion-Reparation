<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReparationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Ici sont définies toutes les routes web de l'application.
|
*/

// Rediriger la page d'accueil vers la liste des réparations
Route::get('/', function () {
    return redirect()->route('reparations.index');
});

// Dashboard (après login, redirection vers liste des réparations)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('reparations.index');
    })->name('dashboard');
});

// Routes pour les réparations (auth requis)
Route::middleware(['auth'])->prefix('reparations')->group(function () {
    Route::get('/', [ReparationController::class, 'index'])->name('reparations.index');
    Route::get('/create', [ReparationController::class, 'create'])->name('reparations.create');
    Route::post('/', [ReparationController::class, 'store'])->name('reparations.store');
    Route::get('/{reparation}', [ReparationController::class, 'show'])->name('reparations.show');

    // Toggle paiement et récupération
    Route::get('/{reparation}/toggle-paiement', [ReparationController::class, 'togglePaiement'])
        ->name('reparations.togglePaiement');

    Route::get('/{reparation}/toggle-recuperation', [ReparationController::class, 'toggleRecuperation'])
        ->name('reparations.toggleRecuperation');
});

// Routes pour la gestion du profil (auth requis)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes d'authentification (login, register, reset password, etc.)
require __DIR__.'/auth.php';
