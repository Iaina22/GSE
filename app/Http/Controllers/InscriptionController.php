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



   
    public function show(Inscription $inscription)
    {
        return Inertia::render('inscriptions/show', [
            'inscription' => $inscription
        ]);
    }


    public function edit(Inscription $inscription)
    {
        return Inertia::render('inscriptions/edit', [
            'inscription' => $inscription
        ]);
    }
public function update(Request $request, Inscription $inscription)
{
    $validated = $request->validate([
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'adresse' => 'required|string',
        'sexe' => 'required',
        'age' => 'required|integer',
        'cin' => 'required|string',
        'telephone' => 'required|string',
        'email' => 'required|email',
        'mots_de_passe' => 'required|string|max:8',
    ]);

    $inscription->update($validated);
 
        return redirect()->route('inscriptions.show', $inscription->id);
}


   public function destroy($id)
{
    $inscription = Inscription::findOrFail($id);
    $inscription->delete();

    return redirect()->route('conexion')->with('success', 'Utilisateur supprimé avec succès !');
}

}
