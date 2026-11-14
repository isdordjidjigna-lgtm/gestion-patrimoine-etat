<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AffectationController extends Controller
{
    private $mouvements = [
        [
            'reference' => 'MVT-2026-1048', 'bien' => 'Toyota Land Cruiser 300',
            'type' => 'Affectation', 'entite' => 'Ministère de la Santé',
            'statut' => 'en_validation', 'statut_label' => 'En validation',
            'date' => '10 nov. 2026'
        ],
        [
            'reference' => 'MVT-2026-1034', 'bien' => 'Groupe électrogène 80 kVA',
            'type' => 'Retour de maintenance', 'entite' => 'Préfecture des Plateaux',
            'statut' => 'valide', 'statut_label' => 'Validé',
            'date' => '8 nov. 2026'
        ],
        [
            'reference' => 'MVT-2026-1019', 'bien' => 'Mobilier de bureau - lot 17',
            'type' => 'Transfert', 'entite' => 'Université de Kara',
            'statut' => 'valide', 'statut_label' => 'Validé',
            'date' => '4 nov. 2026'
        ],
        [
            'reference' => 'MVT-2026-0996', 'bien' => 'Serveur de sauvegarde',
            'type' => 'Mise hors service', 'entite' => 'Direction des systèmes d\'information',
            'statut' => 'a_completer', 'statut_label' => 'À compléter',
            'date' => '28 oct. 2026'
        ],
    ];

    public function index(Request $request)
    {
        $search = $request->input('search');
        $mouvements = collect($this->mouvements);

        if ($search) {
            $mouvements = $mouvements->filter(function ($m) use ($search) {
                return stripos($m['bien'], $search) !== false
                    || stripos($m['reference'], $search) !== false
                    || stripos($m['entite'], $search) !== false;
            });
        }

        return view('affectations', ['mouvements' => $mouvements]);
    }
}