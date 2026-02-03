<?php
namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReservationController extends Controller
{
    // Lisitry ny reservation rehetra
    public function index()
    {
        $reservations = Reservation::latest()->get();
        return Inertia::render('reservations/index', compact('reservations'));
    }

    // Formulaire hanampiana reservation vaovao
    public function create()
    {
        return Inertia::render('reservations/create');
    }

    // Mitahiry reservation vaovao
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'email' => 'required|email',
            'telephone' => 'required|string',
            'np' => 'required|integer|min:1',
            'type_evenement' => 'required|string',
            'date' => 'required|date',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
        ]);

        $reservation = Reservation::create($request->all());
        return redirect()->route('reservations.show', $reservation->id)
                         ->with('success', 'Réservation créée avec succès');
    }

    
    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);

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
    $reservation->update($request->all());
    return Inertia::render('reservations/show', [
        'reservation' => $reservation
    ]);
}

public function destroy(Reservation $reservation)
{
    $reservation->delete();

    return Inertia::render('conexion/login', [
        'reservations' => Reservation::all(),
        'message' => 'Réservation supprimée avec succès',
    ]);
}

}
