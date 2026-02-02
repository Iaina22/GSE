<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'np' => 'required|integer|min:1',
            'telephone' => 'required|string',
            'type_evenement' => 'required|string',
            'date' => 'required|date',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
        ]);

        Reservation::create([
            'user_id' => Auth::id(),
            'nom' => Auth::user()->name,
            'email' => Auth::user()->email,
            'np' => $request->np,
            'telephone' => $request->telephone,
            'type_evenement' => $request->type_evenement,
            'date' => $request->date,
            'heure_debut' => $request->heure_debut,
            'heure_fin' => $request->heure_fin,
        ]);

        return redirect()->back()->with('success', 'Réservation enregistrée');
    }
}
