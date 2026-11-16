<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    // Liste des utilisateurs (statique pour la démo)
    private $utilisateurs = [
        ['id' => 1, 'nom' => 'Koffi Mensah', 'email' => 'admin@gouv.tg', 'role' => 'Administrateur', 'actif' => true],
        ['id' => 2, 'nom' => 'Ama Doe', 'email' => 'gestionnaire@gouv.tg', 'role' => 'Gestionnaire', 'actif' => true],
        ['id' => 3, 'nom' => 'Yao Koffi', 'email' => 'agent@gouv.tg', 'role' => 'Agent', 'actif' => true],
    ];

    public function index()
    {
        return view('utilisateurs', ['utilisateurs' => $this->utilisateurs]);
    }

    public function store(Request $request)
    {
        // Simulation d'ajout (dans un vrai projet, on ferait un INSERT)
        return redirect('/utilisateurs')->with('success', 'Utilisateur ajouté avec succès.');
    }

    public function edit($id)
{
    // Simulation : on récupère l'utilisateur par son ID
    $utilisateur = collect($this->utilisateurs)->firstWhere('id', (int) $id);
    
    if (!$utilisateur) {
        abort(404);
    }
    
    return view('utilisateurs-modifier', compact('utilisateur'));
}

public function update(Request $request, $id)
{
    // Simulation : on redirige avec un message de succès
    return redirect('/utilisateurs')->with('success', 'Utilisateur modifié avec succès.');
}
}