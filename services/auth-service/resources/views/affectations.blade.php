@extends('layouts.app')

@section('title', 'Affectations et mouvements - Patrimoine État')

@section('content')

<header class="flex items-center justify-between gap-6 mb-8">
    <div>
        <p class="text-sm text-muted-foreground">Traçabilité des mises à disposition et transferts</p>
        <h1 class="text-2xl font-bold">Affectations et mouvements</h1>
    </div>
    <a href="/ajouter-affectation" class="bg-gradient-to-r from-primary to-tertiary text-foreground px-5 py-3 rounded-lg font-semibold flex items-center gap-2 hover:shadow-lg transition" style="background: linear-gradient(135deg, #10A8D4 0%, #16B6AE 100%);">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        Nouvelle affectation
    </a>
</header>

{{-- FILTRES --}}
<div class="bg-card border border-border rounded-xl p-4 mb-6">
    <div class="flex gap-3">
        <div class="flex-1 relative">
            <svg class="absolute left-3 top-3 text-muted-foreground" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="text" placeholder="Rechercher un bien ou une référence..." class="w-full pl-10 pr-4 py-2.5 border border-input rounded-lg focus:ring-2 focus:ring-primary">
        </div>
        <select class="px-4 py-2.5 border border-input rounded-lg">
            <option>Type de mouvement</option>
            <option>Affectation</option>
            <option>Transfert</option>
            <option>Retour de maintenance</option>
            <option>Mise hors service</option>
        </select>
        <select class="px-4 py-2.5 border border-input rounded-lg">
            <option>Statut</option>
            <option>En validation</option>
            <option>Validé</option>
            <option>À compléter</option>
        </select>
    </div>
</div>

{{-- TABLEAU --}}
<div class="bg-card border border-border rounded-xl overflow-hidden mb-6">
    <table class="w-full text-sm">
        <thead class="bg-muted text-muted-foreground text-xs uppercase">
            <tr>
                <th class="px-6 py-3 text-left font-medium">Référence</th>
                <th class="px-6 py-3 text-left font-medium">Bien concerné</th>
                <th class="px-6 py-3 text-left font-medium">Mouvement</th>
                <th class="px-6 py-3 text-left font-medium">Entité destinataire</th>
                <th class="px-6 py-3 text-left font-medium">Statut</th>
                <th class="px-6 py-3 text-left font-medium">Date</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-border">
            <tr class="hover:bg-muted/50">
                <td class="px-6 py-4 font-mono text-xs">MVT-2026-1048</td>
                <td class="px-6 py-4 font-medium">Toyota Land Cruiser 300</td>
                <td class="px-6 py-4">Affectation</td>
                <td class="px-6 py-4">Ministère de la Santé</td>
                <td class="px-6 py-4"><span class="bg-secondary text-secondary-foreground px-2.5 py-1 rounded-full text-xs font-medium">En validation</span></td>
                <td class="px-6 py-4 text-muted-foreground">10 nov. 2026</td>
            </tr>
            <tr class="hover:bg-muted/50">
                <td class="px-6 py-4 font-mono text-xs">MVT-2026-1034</td>
                <td class="px-6 py-4 font-medium">Groupe électrogène 80 kVA</td>
                <td class="px-6 py-4">Retour de maintenance</td>
                <td class="px-6 py-4">Préfecture des Plateaux</td>
                <td class="px-6 py-4"><span class="bg-tertiary text-tertiary-foreground px-2.5 py-1 rounded-full text-xs font-medium">Validé</span></td>
                <td class="px-6 py-4 text-muted-foreground">8 nov. 2026</td>
            </tr>
            <tr class="hover:bg-muted/50">
                <td class="px-6 py-4 font-mono text-xs">MVT-2026-1019</td>
                <td class="px-6 py-4 font-medium">Mobilier de bureau - lot 17</td>
                <td class="px-6 py-4">Transfert</td>
                <td class="px-6 py-4">Université de Kara</td>
                <td class="px-6 py-4"><span class="bg-tertiary text-tertiary-foreground px-2.5 py-1 rounded-full text-xs font-medium">Validé</span></td>
                <td class="px-6 py-4 text-muted-foreground">4 nov. 2026</td>
            </tr>
            <tr class="hover:bg-muted/50">
                <td class="px-6 py-4 font-mono text-xs">MVT-2026-0996</td>
                <td class="px-6 py-4 font-medium">Serveur de sauvegarde</td>
                <td class="px-6 py-4">Mise hors service</td>
                <td class="px-6 py-4">Direction des systèmes d'information</td>
                <td class="px-6 py-4"><span class="bg-destructive text-destructive-foreground px-2.5 py-1 rounded-full text-xs font-medium">À compléter</span></td>
                <td class="px-6 py-4 text-muted-foreground">28 oct. 2026</td>
            </tr>
        </tbody>
    </table>
</div>

{{-- CARTES DE RÉSUMÉ --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-card border border-border rounded-xl p-6 shadow-theme">
        <p class="text-sm text-muted-foreground">En validation</p>
        <p class="text-2xl font-bold mt-2">42</p>
    </div>
    <div class="bg-card border border-border rounded-xl p-6 shadow-theme">
        <p class="text-sm text-muted-foreground">Validés ce mois</p>
        <p class="text-2xl font-bold mt-2">186</p>
    </div>
    <div class="bg-card border border-border rounded-xl p-6 shadow-theme">
        <p class="text-sm text-muted-foreground">Délai moyen de traitement</p>
        <p class="text-2xl font-bold mt-2">2,4 jours</p>
    </div>
</div>

@endsection