<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;

class InscriptionController extends Controller
{
    
    public function index()
    {
        return Inertia::render('inscriptions/index', [
            'inscriptions' => Inscription::all()
        ]);
    }
    public function create()
    {
        return Inertia::render('inscriptions/create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'adresse' => 'required|string|max:100',
            'age' => 'required|integer|min:1|max:100',
            'sexe' => 'required|string',
            'cin' => 'string|max:12',
            'telephone' => 'string|max:10',
            'email' => 'required|email',
            'mots_de_passe' => 'required|string|min:8',
            'confirmation_de_mots_de_passe',
        ]);
        $validated['mots_de_passe'] = Hash::make($validated['mots_de_passe']);
        unset($validated['confirmation_de_mots_de_passe']);
        Inscription::create($validated);
        return redirect()->route('conexion')
            ->with('success', 'Inscription effectuée avec succès');
    }

public function show($id)
{
    
    $inscription = Inscription::find($id);
    return Inertia::render('inscriptions/show', [
        'inscription' => $inscription
    ]);
}


  public function edit($id)
    {
        $inscription = Inscription::findOrFail($id);
        return inertia('inscriptions/edit', [
            'inscription' => $inscription
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse' => 'required|string|max:500',
            'sexe' => 'required|in:HOMME,FEMININ',
            'age' => 'required|integer|min:0',
            'cin' => 'required|string|max:20',
            'telephone' => 'nullable|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        $inscription = Inscription::findOrFail($id);
        $inscription->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'adresse' => $request->adresse,
            'sexe' => $request->sexe,
            'age' => $request->age,
            'cin' => $request->cin,
            'telephone' => $request->telephone,
            'email' => $request->email,
        ]);
        return redirect()->route('inscriptions.show', $inscription->id) ->with('success', 'Inscription modifiée avec succès.');
    }
 public function destroy($id)
    {
        $inscription = Inscription::find($id);

        if (!$inscription) {
            return redirect()->route('conexion')->with('error', 'Utilisateur introuvable');
        }
        $inscription->delete();
        return redirect()->route('conexion')->with('success', 'Compte supprimé avec succès');
    }

}
