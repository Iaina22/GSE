<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscription;
use Illuminate\Support\Facades\Hash;

class connexionController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'prenom' => 'required',
            'mots_de_passe' => 'required',
        ]);

        $user = Inscription::where('prenom', $request->prenom)->first();

        if (!$user || !Hash::check($request->mots_de_passe, $user->mots_de_passe)) {
            return back()->withErrors([
                'prenom' => 'Prenom ou mot de passe incorrect'
            ]);
        }
        return redirect()->route('user.dashboard');
    }
    public function logout(Request $request)
{
    $request->session()->forget('user_id');
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('conexion');
}

}
