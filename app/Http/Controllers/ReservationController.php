<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'np' => 'required|string|max:20',
            'telephone' => 'required|string|max:20',
            'date' => 'required|date',
            'heure_debut' => 'required',
            'heure_fin' => 'required|after:heure_debut',
            'type_evenement' => 'required|string|max:255',
        ]);

        // Vérifier si date déjà réservée
        $dateExiste = Reservation::where('date', $request->date)->exists();
        if ($dateExiste) {
            return back()->withErrors([
                'date' => 'Cette date est déjà réservée.'
            ]);
        }

        Reservation::create([
            'nom'   => Auth::user()->name,   // 👈 user connecté
            'email' => Auth::user()->email,  // 👈 user connecté
            'np' => $request->np,
            'telephone' => $request->telephone,
            'date' => $request->date,
            'heure_debut' => $request->heure_debut,
            'heure_fin' => $request->heure_fin,
            'type_evenement' => $request->type_evenement,
        ]);

        return redirect()->route('reservations.show')
            ->with('success', 'Réservation enregistrée avec succès');
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
            ]);
        }

        $reservation->update([
            'nom'   => Auth::user()->name,
            'email' => Auth::user()->email,
            'np' => $request->np,
            'telephone' => $request->telephone,
            'date' => $request->date,
            'heure_debut' => $request->heure_debut,
            'heure_fin' => $request->heure_fin,
            'type_evenement' => $request->type_evenement,
        ]);

        return redirect()->route('reservations.index')
            ->with('success', 'Réservation modifiée');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservations.index')
            ->with('success', 'Réservation supprimée');
    }
}
