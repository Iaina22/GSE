<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Inscription;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return Inertia::render('reservations/index', [
            'reservation' => $reservations
        ]);
    }

    public function create()
    {
          $inscription = Inscription::first(); 

    return Inertia::render('reservations/create', [
        'reservation' => null,
        'inscription' => $inscription
    ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'cin' => 'required|string|max:20',
            'telephone' => 'required|string|max:20',
            'date' => 'required|date',
            'heure_debut' => 'required',
            'heure_fin' => 'required|after:heure_debut',
            'type_evenement' => 'required|string|max:255',
        ]);

        Reservation::create($request->all());

        return redirect()->route('reservations.index');
    }

    public function edit(Reservation $reservation)
    {
        return Inertia::render('Reservations/Form', [
            'reservation' => $reservation
        ]);
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'cin' => 'required|string|max:20',
            'telephone' => 'required|string|max:20',
            'date' => 'required|date',
            'heure_debut' => 'required',
            'heure_fin' => 'required|after:heure_debut',
            'type_evenement' => 'required|string|max:255',
        ]);

        $reservation->update($request->all());

        return redirect()->route('reservations.index')->with('success', 'Reservation modifiée avec succès.');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Reservation supprimée avec succès.');
    }
}
