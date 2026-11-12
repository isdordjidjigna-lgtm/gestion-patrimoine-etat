<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Localisation;
use App\Models\Bien;
use App\Models\Mouvement;
use Illuminate\Database\Seeder;

class PatrimoineSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Catégories
        $categories = [
            ['code' => 'IMM', 'nom' => 'Immobilier administratif', 'icone' => 'building'],
            ['code' => 'VEH', 'nom' => 'Véhicules et engins', 'icone' => 'car'],
            ['code' => 'EQU', 'nom' => 'Équipements techniques', 'icone' => 'wrench'],
            ['code' => 'MOB', 'nom' => 'Mobilier de bureau', 'icone' => 'chair'],
            ['code' => 'INF', 'nom' => 'Informatique', 'icone' => 'laptop'],
        ];
        foreach ($categories as $cat) {
            Categorie::create($cat);
        }

        // 2. Localisations
        $localisations = [
            ['region' => 'Golfe', 'ville' => 'Lomé', 'adresse' => 'Boulevard du 13 janvier'],
            ['region' => 'Kozah', 'ville' => 'Kara', 'adresse' => 'Quartier administratif'],
            ['region' => 'Plateaux', 'ville' => 'Atakpamé', 'adresse' => 'Centre-ville'],
            ['region' => 'Agoè-Nyivé', 'ville' => 'Lomé', 'adresse' => 'Zone industrielle'],
            ['region' => 'Sotouboua', 'ville' => 'Centrale', 'adresse' => 'Route nationale'],
        ];
        foreach ($localisations as $loc) {
            Localisation::create($loc);
        }

        // 3. Biens (données du Figma)
        $biens = [
            [
                'reference' => 'PAT-IMM-0042', 'designation' => 'Immeuble administratif Lomé II',
                'categorie_id' => 1, 'localisation_id' => 1, 'valeur' => 3820000000,
                'date_acquisition' => '2014-04-18', 'mode_acquisition' => 'Construction publique',
                'immatriculation' => 'TF N° 18 764 Golfe', 'surface' => 4260,
                'duree_amortissement' => 30, 'responsable' => 'DSG', 'statut' => 'conforme',
                'description' => 'Immeuble administratif - Direction des services généraux',
            ],
            [
                'reference' => 'PAT-VEH-0268', 'designation' => 'Toyota Land Cruiser 300',
                'categorie_id' => 2, 'localisation_id' => 2, 'valeur' => 78500000,
                'date_acquisition' => '2023-05-10', 'mode_acquisition' => 'Achat public',
                'immatriculation' => 'TG 1234 AB', 'statut' => 'a_verifier',
                'description' => 'Véhicule de service - Ministère de la Santé',
            ],
            [
                'reference' => 'PAT-INF-1184', 'designation' => 'Groupe électrogène 80 kVA',
                'categorie_id' => 3, 'localisation_id' => 3, 'valeur' => 24800000,
                'date_acquisition' => '2020-09-15', 'mode_acquisition' => 'Achat public',
                'statut' => 'conforme', 'description' => 'Équipement de secours',
            ],
            [
                'reference' => 'PAT-MOB-8402', 'designation' => 'Mobilier de bureau - lot 17',
                'categorie_id' => 4, 'localisation_id' => 4, 'valeur' => 6400000,
                'date_acquisition' => '2019-11-20', 'mode_acquisition' => 'Achat public',
                'statut' => 'degrade', 'description' => 'Lot de mobilier usagé',
            ],
            [
                'reference' => 'PAT-IMM-0197', 'designation' => 'Centre de formation administrative',
                'categorie_id' => 1, 'localisation_id' => 5, 'valeur' => 1270000000,
                'date_acquisition' => '2018-02-12', 'mode_acquisition' => 'Construction publique',
                'surface' => 1800, 'statut' => 'conforme',
                'description' => 'Centre de formation régionale',
            ],
            [
                'reference' => 'PAT-IT-5421', 'designation' => 'Serveur de sauvegarde ministère',
                'categorie_id' => 5, 'localisation_id' => 1, 'valeur' => 18900000,
                'date_acquisition' => '2022-06-30', 'mode_acquisition' => 'Achat public',
                'statut' => 'a_verifier', 'description' => 'Serveur HP ProLiant',
            ],
        ];
        foreach ($biens as $b) {
            Bien::create($b);
        }

        // 4. Mouvements (données du Figma)
        $mouvements = [
            [
                'bien_id' => 2, 'type' => 'affectation', 'entite_destinataire' => 'Ministère de la Santé',
                'statut' => 'en_validation', 'date_mouvement' => '2026-11-10',
                'notes' => 'Affectation en cours de validation',
            ],
            [
                'bien_id' => 1, 'type' => 'revaluation', 'entite_destinataire' => 'Direction des services généraux',
                'statut' => 'valide', 'date_mouvement' => '2026-11-09',
                'notes' => 'Mise à jour de la valeur comptable',
            ],
            [
                'bien_id' => 3, 'type' => 'retour_maintenance', 'entite_destinataire' => 'Préfecture des Plateaux',
                'statut' => 'valide', 'date_mouvement' => '2026-11-08',
                'notes' => 'Retour de maintenance après réparation',
            ],
        ];
        foreach ($mouvements as $m) {
            Mouvement::create($m);
        }
    }
}
