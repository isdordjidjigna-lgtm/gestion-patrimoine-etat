<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegistreController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/registre', [RegistreController::class, 'index'])->middleware('auth');
Route::get('/biens/{id}', [RegistreController::class, 'show'])->middleware('auth');

Route::get('/ajouter-bien', function () {
    return view('ajouter-bien');
})->middleware('auth');

Route::get('/affectations', function () {
    return view('affectations');
})->middleware('auth');

Route::get('/ajouter-affectation', function () {
    return view('ajouter-affectation');
})->middleware('auth');

Route::get('/rapports', function () {
    return view('rapports');
})->middleware('auth');

// Export CSV pour le bouton "Exporter" de la page Rapports
Route::get('/rapports/export', function () {
    $biens = [
        ['reference' => 'PAT-IMM-0042', 'designation' => 'Immeuble administratif Lomé II', 'valeur' => '3 820 000 000'],
        ['reference' => 'PAT-VEH-0268', 'designation' => 'Toyota Land Cruiser 300', 'valeur' => '78 500 000'],
        ['reference' => 'PAT-INF-1184', 'designation' => 'Groupe électrogène 80 kVA', 'valeur' => '24 800 000'],
    ];

    $filename = 'rapport_patrimoine_' . date('Y-m-d') . '.csv';
    $handle = fopen('php://output', 'w');

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    fputcsv($handle, ['Référence', 'Désignation', 'Valeur (FCFA)']);

    foreach ($biens as $bien) {
        fputcsv($handle, [$bien['reference'], $bien['designation'], $bien['valeur']]);
    }

    fclose($handle);
    exit;
})->middleware('auth');

// Téléchargement du titre foncier
Route::get('/documents/titre-foncier', function () {
    $filename = 'titre_foncier.pdf';
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    echo "TITRE FONCIER\n\nImmeuble administratif Lomé II\nTF N° 18 764 Golfe\nBoulevard du 13 janvier, Lomé";
    exit;
})->middleware('auth');

// Téléchargement du rapport d'évaluation
Route::get('/documents/rapport-evaluation', function () {
    $filename = 'rapport_evaluation.pdf';
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    echo "RAPPORT D'EVALUATION\n\nImmeuble administratif Lomé II\nValeur : 3 820 000 000 FCFA\nDate : 30 septembre 2026";
    exit;
})->middleware('auth');

// Export CSV pour le bouton "Exporter le registre" de la page Registre
Route::get('/registre/export', function () {
    $biens = [
        ['reference' => 'PAT-IMM-0042', 'designation' => 'Immeuble administratif Lomé II', 'categorie' => 'Immobilier', 'localisation' => 'Golfe • Lomé', 'valeur' => '3 820 000 000', 'statut' => 'Conforme'],
        ['reference' => 'PAT-VEH-0268', 'designation' => 'Toyota Land Cruiser 300', 'categorie' => 'Véhicule', 'localisation' => 'Kozah • Kara', 'valeur' => '78 500 000', 'statut' => 'À vérifier'],
        ['reference' => 'PAT-INF-1184', 'designation' => 'Groupe électrogène 80 kVA', 'categorie' => 'Équipement', 'localisation' => 'Plateaux • Atakpamé', 'valeur' => '24 800 000', 'statut' => 'Conforme'],
        ['reference' => 'PAT-MOB-8402', 'designation' => 'Mobilier de bureau - lot 17', 'categorie' => 'Mobilier', 'localisation' => 'Agoè-Nyivé • Lomé', 'valeur' => '6 400 000', 'statut' => 'Dégradé'],
        ['reference' => 'PAT-IMM-0197', 'designation' => 'Centre de formation administrative', 'categorie' => 'Immobilier', 'localisation' => 'Sotouboua • Centrale', 'valeur' => '1 270 000 000', 'statut' => 'Conforme'],
        ['reference' => 'PAT-IT-5421', 'designation' => 'Serveur de sauvegarde ministère', 'categorie' => 'Informatique', 'localisation' => 'Golfe • Lomé', 'valeur' => '18 900 000', 'statut' => 'À vérifier'],
    ];
    
    $filename = 'registre_patrimoine_' . date('Y-m-d') . '.csv';
    
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    
    $handle = fopen('php://output', 'w');
    fputcsv($handle, ['Référence', 'Désignation', 'Catégorie', 'Localisation', 'Valeur (FCFA)', 'Statut']);
    
    foreach ($biens as $bien) {
        fputcsv($handle, [
            $bien['reference'],
            $bien['designation'],
            $bien['categorie'],
            $bien['localisation'],
            $bien['valeur'],
            $bien['statut']
        ]);
    }
    
    fclose($handle);
    exit;
})->middleware('auth');

Route::post('/ajouter-bien', function (Illuminate\Http\Request $request) {
    return redirect('/registre')->with('success', 'Le bien a été enregistré avec succès.');
})->middleware('auth');