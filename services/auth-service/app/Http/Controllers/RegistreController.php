<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistreController extends Controller
{
    private $biens = [
        [
            'id' => 1, 'reference' => 'PAT-IMM-0042', 'designation' => 'Immeuble administratif Lomé II',
            'categorie' => ['nom' => 'Immobilier administratif'],
            'localisation' => ['region' => 'Golfe', 'ville' => 'Lomé', 'adresse' => 'Boulevard du 13 janvier'],
            'valeur' => 3820000000, 'date_acquisition' => '2014-04-18', 'mode_acquisition' => 'Construction publique',
            'immatriculation' => 'TF N° 18 764 Golfe', 'surface' => 4260, 'duree_amortissement' => 30,
            'responsable' => 'DSG', 'statut' => 'conforme', 'description' => 'Immeuble administratif',
            'mouvements' => [['type' => 'revaluation', 'notes' => 'Mise à jour', 'date_mouvement' => '2026-11-09']]
        ],
        [
            'id' => 2, 'reference' => 'PAT-VEH-0268', 'designation' => 'Toyota Land Cruiser 300',
            'categorie' => ['nom' => 'Véhicules et engins'],
            'localisation' => ['region' => 'Kozah', 'ville' => 'Kara', 'adresse' => 'Quartier administratif'],
            'valeur' => 78500000, 'date_acquisition' => '2023-05-10', 'mode_acquisition' => 'Achat public',
            'immatriculation' => 'TG 1234 AB', 'surface' => null, 'duree_amortissement' => null,
            'responsable' => null, 'statut' => 'a_verifier', 'description' => 'Véhicule de service',
            'mouvements' => []
        ],
        [
            'id' => 3, 'reference' => 'PAT-INF-1184', 'designation' => 'Groupe électrogène 80 kVA',
            'categorie' => ['nom' => 'Équipements techniques'],
            'localisation' => ['region' => 'Plateaux', 'ville' => 'Atakpamé', 'adresse' => 'Centre-ville'],
            'valeur' => 24800000, 'date_acquisition' => '2020-09-15', 'mode_acquisition' => 'Achat public',
            'immatriculation' => null, 'surface' => null, 'duree_amortissement' => null,
            'responsable' => null, 'statut' => 'conforme', 'description' => 'Équipement de secours',
            'mouvements' => []
        ],
        [
            'id' => 4, 'reference' => 'PAT-MOB-8402', 'designation' => 'Mobilier de bureau - lot 17',
            'categorie' => ['nom' => 'Mobilier de bureau'],
            'localisation' => ['region' => 'Agoè-Nyivé', 'ville' => 'Lomé', 'adresse' => 'Zone industrielle'],
            'valeur' => 6400000, 'date_acquisition' => '2019-11-20', 'mode_acquisition' => 'Achat public',
            'immatriculation' => null, 'surface' => null, 'duree_amortissement' => null,
            'responsable' => null, 'statut' => 'degrade', 'description' => 'Lot de mobilier usagé',
            'mouvements' => []
        ],
        [
            'id' => 5, 'reference' => 'PAT-IMM-0197', 'designation' => 'Centre de formation administrative',
            'categorie' => ['nom' => 'Immobilier administratif'],
            'localisation' => ['region' => 'Sotouboua', 'ville' => 'Centrale', 'adresse' => 'Route nationale'],
            'valeur' => 1270000000, 'date_acquisition' => '2018-02-12', 'mode_acquisition' => 'Construction publique',
            'immatriculation' => null, 'surface' => 1800, 'duree_amortissement' => null,
            'responsable' => null, 'statut' => 'conforme', 'description' => 'Centre de formation',
            'mouvements' => []
        ],
        [
            'id' => 6, 'reference' => 'PAT-IT-5421', 'designation' => 'Serveur de sauvegarde ministère',
            'categorie' => ['nom' => 'Informatique'],
            'localisation' => ['region' => 'Golfe', 'ville' => 'Lomé', 'adresse' => 'Boulevard du 13 janvier'],
            'valeur' => 18900000, 'date_acquisition' => '2022-06-30', 'mode_acquisition' => 'Achat public',
            'immatriculation' => null, 'surface' => null, 'duree_amortissement' => null,
            'responsable' => null, 'statut' => 'a_verifier', 'description' => 'Serveur HP ProLiant',
            'mouvements' => []
        ]
    ];

    public function index(Request $request)
    {
        $search = $request->input('search');
        $page = $request->input('page', 1);
        $perPage = 4; // 4 biens par page

        $biens = collect($this->biens);

        if ($search) {
            $biens = $biens->filter(function ($bien) use ($search) {
                return stripos($bien['reference'], $search) !== false
                    || stripos($bien['designation'], $search) !== false
                    || stripos($bien['localisation']['ville'] ?? '', $search) !== false;
            });
        }

        $total = $biens->count();
        $totalPages = ceil($total / $perPage);
        $biens = $biens->forPage($page, $perPage);

        return view('registre', [
            'biens' => $biens,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'search' => $search,
        ]);
    }

    public function show($id)
    {
        $bien = collect($this->biens)->firstWhere('id', (int) $id);
        if (!$bien) { abort(404); }
        return view('fiche-bien', compact('bien'));
    }
}