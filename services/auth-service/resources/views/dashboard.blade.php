@extends('layouts.app')

@section('title', 'Tableau de bord - Patrimoine État')

@section('content')

<header class="flex items-center justify-between gap-6 mb-8">
    <div>
        <p class="text-sm text-muted-foreground">Direction du patrimoine public</p>
        <h1 class="text-2xl font-bold">Tableau de bord</h1>
    </div>
    <div class="flex items-center gap-3">
        <div class="min-w-72 bg-card border border-input rounded-lg px-4 py-3 text-sm text-muted-foreground">
            <svg class="inline mr-2" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            Rechercher un bien, un code…
        </div>
        <button class="w-11 h-11 rounded-lg bg-card border border-border flex items-center justify-center">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
        </button>
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-teal-400 to-cyan-500 flex items-center justify-center text-white font-bold text-xs">KM</div>
            <div class="text-sm">
                <p class="font-semibold">{{ auth()->user()->name ?? 'Koffi Mensah' }}</p>
                <p class="text-muted-foreground text-xs">Administrateur</p>
            </div>
        </div>
    </div>
</header>

<section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">
    <div class="bg-card border border-border rounded-xl p-5 shadow-theme">
        <p class="text-sm text-muted-foreground">Valeur brute gérée</p>
        <p class="font-bold text-2xl mt-2">48,6 Md FCFA</p>
        <p class="text-sm text-tertiary mt-2">+4,2 % depuis janvier</p>
    </div>
    <div class="bg-card border border-border rounded-xl p-5 shadow-theme">
        <p class="text-sm text-muted-foreground">Biens inventoriés</p>
        <p class="font-bold text-2xl mt-2">12 846</p>
        <p class="text-sm text-primary mt-2">96 % fiches complètes</p>
    </div>
    <div class="bg-card border border-border rounded-xl p-5 shadow-theme">
        <p class="text-sm text-muted-foreground">État conforme</p>
        <p class="font-bold text-2xl mt-2">10 938</p>
        <p class="text-sm text-tertiary mt-2">85,2 % du parc</p>
    </div>
    <div class="bg-card border border-border rounded-xl p-5 shadow-theme">
        <p class="text-sm text-muted-foreground">À régulariser</p>
        <p class="font-bold text-2xl mt-2">317</p>
        <p class="text-sm text-destructive mt-2">42 mouvements en attente</p>
    </div>
</section>

<section class="grid grid-cols-1 xl:grid-cols-3 gap-6 mt-6">
    <div class="xl:col-span-2 bg-card border border-border rounded-xl p-6 shadow-theme">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-lg font-semibold">Répartition de la valeur patrimoniale</h2>
                <p class="text-sm text-muted-foreground mt-1">Par catégorie de bien • exercice 2026</p>
            </div>
            <a href="/rapports" class="text-sm text-primary font-semibold">Voir les rapports</a>
        </div>
        <div class="space-y-5">
            <div>
                <div class="flex justify-between text-sm mb-2">
                    <span>Immobilier administratif</span>
                    <span class="font-semibold">28,4 Md FCFA</span>
                </div>
                <div class="h-3 rounded-full bg-muted overflow-hidden">
                    <div class="h-full w-5/6 bg-primary rounded-full"></div>
                </div>
            </div>
            <div>
                <div class="flex justify-between text-sm mb-2">
                    <span>Véhicules et engins</span>
                    <span class="font-semibold">8,9 Md FCFA</span>
                </div>
                <div class="h-3 rounded-full bg-muted overflow-hidden">
                    <div class="h-full w-1/2 bg-tertiary rounded-full"></div>
                </div>
            </div>
            <div>
                <div class="flex justify-between text-sm mb-2">
                    <span>Équipements techniques</span>
                    <span class="font-semibold">6,7 Md FCFA</span>
                </div>
                <div class="h-3 rounded-full bg-muted overflow-hidden">
                    <div class="h-full w-1/3 bg-primary rounded-full"></div>
                </div>
            </div>
            <div>
                <div class="flex justify-between text-sm mb-2">
                    <span>Mobilier et informatique</span>
                    <span class="font-semibold">4,6 Md FCFA</span>
                </div>
                <div class="h-3 rounded-full bg-muted overflow-hidden">
                    <div class="h-full w-1/4 bg-secondary rounded-full"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-card border border-border rounded-xl p-6 shadow-theme">
        <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold">Alertes prioritaires</h2>
            <span class="bg-destructive text-destructive-foreground rounded-full px-2 py-1 text-xs font-semibold">3</span>
        </div>
        <div class="mt-5 space-y-4">
            <div class="border-l-4 border-destructive pl-3">
                <p class="font-semibold text-sm">Contrôle à échéance</p>
                <p class="text-xs text-muted-foreground mt-1">17 véhicules sans contrôle technique valide.</p>
            </div>
            <div class="border-l-4 border-primary pl-3">
                <p class="font-semibold text-sm">Écarts d’inventaire</p>
                <p class="text-xs text-muted-foreground mt-1">9 biens à rapprocher avec les sites régionaux.</p>
            </div>
            <div class="border-l-4 border-tertiary pl-3">
                <p class="font-semibold text-sm">Mouvements à valider</p>
                <p class="text-xs text-muted-foreground mt-1">42 demandes transmises par les ministères.</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-card border border-border rounded-xl p-6 shadow-theme mt-6">
    <div class="flex items-center justify-between mb-5">
        <div>
            <h2 class="text-lg font-semibold">Derniers mouvements enregistrés</h2>
            <p class="text-sm text-muted-foreground">Traçabilité des opérations récentes</p>
        </div>
        <a href="/affectations" class="min-h-11 px-5 rounded-full text-foreground text-sm font-semibold shadow-md inline-flex items-center" style="background: linear-gradient(135deg, #10A8D4 0%, #16B6AE 100%);">
         Consulter les mouvements
    <svg class="ml-1" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
    </a>
    </div>
    <div class="overflow-hidden border border-border rounded-lg">
        <table class="w-full text-sm">
            <thead class="bg-muted text-muted-foreground">
                <tr>
                    <th class="text-left p-3 font-medium">Référence</th>
                    <th class="text-left p-3 font-medium">Bien</th>
                    <th class="text-left p-3 font-medium">Opération</th>
                    <th class="text-left p-3 font-medium">Statut</th>
                    <th class="text-left p-3 font-medium">Date</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t border-border">
                    <td class="p-3 font-mono text-xs">PAT-VEH-0268</td>
                    <td class="p-3">Toyota Land Cruiser</td>
                    <td class="p-3">Affectation • Ministère de la Santé</td>
                    <td class="p-3"><span class="bg-secondary text-secondary-foreground rounded-full px-2 py-1 text-xs">En validation</span></td>
                    <td class="p-3 text-muted-foreground">10 nov. 2026</td>
                </tr>
                <tr class="border-t border-border">
                    <td class="p-3 font-mono text-xs">PAT-IMM-0042</td>
                    <td class="p-3">Immeuble administratif Lomé II</td>
                    <td class="p-3">Mise à jour de valeur</td>
                    <td class="p-3"><span class="bg-tertiary text-tertiary-foreground rounded-full px-2 py-1 text-xs">Conforme</span></td>
                    <td class="p-3 text-muted-foreground">9 nov. 2026</td>
                </tr>
                <tr class="border-t border-border">
                    <td class="p-3 font-mono text-xs">PAT-INF-1184</td>
                    <td class="p-3">Groupe électrogène 80 kVA</td>
                    <td class="p-3">Sortie de maintenance</td>
                    <td class="p-3"><span class="bg-tertiary text-tertiary-foreground rounded-full px-2 py-1 text-xs">Conforme</span></td>
                    <td class="p-3 text-muted-foreground">8 nov. 2026</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

@endsection