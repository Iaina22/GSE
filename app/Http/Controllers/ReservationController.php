<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReservationController extends Controller
{
    public function index()
    {
        return Inertia::render('reservations/index', [
            'reservations' => Reservation::latest()->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('reservations/create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'np' => 'required|string|max:20',
            'telephone' => 'required|string|max:20',
            'date' => 'required|date',
            'heure_debut' => 'required',
            'heure_fin' => 'required|after:heure_debut',
            'type_evenement' => 'required|string|max:255',
        ]);

        $dateExiste = Reservation::where('date', $request->date)->exists();

        if ($dateExiste) {
            return back()->withErrors([
                'date' => 'Cette date est déjà réservée par une autre personne.'
            ])->withInput();
        }

        Reservation::create($request->all());

        return redirect()->route('reservations.show')
            ->with('success', 'Réservation créée avec succès.');
    }

   
    public function show(Reservation $reservation)
    {
        return Inertia::render('reservations/show', [
            'reservation' => $reservation
        ]);
    }

    public function edit(Reservation $reservation)
    {
        return Inertia::render('reservations/edit', [
            'reservation' => $reservation
        ]);
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'np' => 'required|string|max:20',
            'telephone' => 'required|string|max:20',
            'date' => 'required|date',
            'heure_debut' => 'required',
            'heure_fin' => 'required|after:heure_debut',
            'type_evenement' => 'required|string|max:255',
        ]);

        $dateExiste = Reservation::where('date', $request->date)
            ->where('id', '!=', $reservation->id)
            ->exists();

        if ($dateExiste) {
            return back()->withErrors([
                'date' => 'Cette date est déjà réservée.'
            ])->withInput();
        }

        $reservation->update($request->all());

        return redirect()->route('reservations.show')
            ->with('success', 'Réservation modifiée avec succès.');
    }

   
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservations.index')
            ->with('success', 'Réservation supprimée avec succès.');
    }
    
}
