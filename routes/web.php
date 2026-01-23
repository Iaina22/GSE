<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AuthController;
use App\Models\Inscription;

use Inertia\Inertia;

// Dashboard / Accueil
Route::get('/', function () {
    return Inertia::render('vitrine');
});



Route::get('/vitrine', fn() => Inertia::render('vitrine'));
// Route::get('/inscrire', fn() => Inertia::render('inscriptions/create'));
Route::resource('inscriptions', InscriptionController::class);


// Page inscription
// Route::get('/inscriptions/create', [InscriptionController::class, 'create'])->name('inscriptions.create');
// Route::post('/inscriptions', [InscriptionController::class, 'store'])->name('inscriptions.store');
Route::resource('inscriptions', InscriptionController::class);


Route::get('/inscriptions/{id}/edit', [InscriptionController::class, 'edit'])->name('inscriptions.edit');
Route::put('/inscriptions/{id}/edit', [InscriptionController::class, 'update'])->name('inscriptions.update');
Route::delete('/inscriptions/{id}', [InscriptionController::class, 'destroy'])->name('inscriptions.destroy');
// Login page
Route::get('/conexion', function () {
   return Inertia::render('conexion/login');
})->name('conexion');
Route::post('/conexion', function () {
   return Inertia::render('inscriptions/show');
})->name('login.post');

Route::get('/inscription/show/{id}', [InscriptionController::class, 'show'])
    ->name('inscription.show');
    Route::get('/inscriptions/{id}', [InscriptionController::class, 'show'])
    ->name('inscriptions.show');
Route::get('/inscriptions/{id}/edit', [InscriptionController::class, 'edit'])->name('inscriptions.edit');
Route::put('/inscriptions/{id}', [InscriptionController::class, 'update'])->name('inscriptions.update');
Route::delete('/inscriptions/{id}', [InscriptionController::class, 'destroy'])->name('inscriptions.destroy');


Route::post('/login', [AuthController::class, 'login'])
    ->name('login.post');
Route::get('/user/{id}', function ($id) {
    return Inertia::render('inscriptions/show', [
        'inscription' => Inscription::findOrFail($id)
    ]);
})->name('user.show');
Route::prefix('salle')->group(function () {
    Route::get('/mariage', fn() => Inertia::render('salle/mariage'));
    Route::get('/fiancaille', fn() => Inertia::render('salle/fiancaille'));
    Route::get('/reunion', fn() => Inertia::render('salle/reunion'));
    Route::get('/bapteme', fn() => Inertia::render('salle/bapteme'));
    Route::get('/fete', fn() => Inertia::render('salle/fete'));
});
Route::prefix('offre')->group(function () {
    Route::get('/standard', fn() => Inertia::render('offre/standard'));
    Route::get('/premium', fn() => Inertia::render('offre/premium'));
    Route::get('/air', fn() => Inertia::render('offre/air'));
    Route::get('/prestige', fn() => Inertia::render('offre/prestige'));
});



// Route::get('/reservations/create', function () {
//     return Inertia::render('Reservations/Create');
// })->name('reservations.create');


Route::get('/materiel', fn() => Inertia::render('materiel'));
Route::get('/user', fn() => Inertia::render('user'));

// Route::get('/materiel', fn() => Inertia::render('materiel'));
// Route::get('/reservation', fn() => Inertia::render('reservation'));
// Route::get('/inscriptions/show', fn() => Inertia::render('inscriptions/show'));
// Route::get('/inscriptions/show', fn() => Inertia::render('inscriptions/show'));


Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
Route::get('/reservations/{reservations}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
Route::put('/reservations/{reservations}', [ReservationController::class, 'update'])->name('reservations.update');
Route::delete('/reservations/{reservations}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
