@extends('layouts.app')

@section('title', 'Registre du patrimoine - Patrimoine État')

@section('content')

<header class="flex items-center justify-between gap-6 mb-8">
    <div>
        <p class="text-sm text-muted-foreground">Inventaire national • 12 846 enregistrements</p>
        <h1 class="text-2xl font-bold">Registre du patrimoine</h1>
    </div>
    <a href="#" class="bg-gradient-to-r from-primary to-tertiary text-foreground px-5 py-3 rounded-lg font-semibold flex items-center gap-2 hover:shadow-lg transition" style="background: linear-gradient(135deg, #10A8D4 0%, #16B6AE 100%);">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        Ajouter un bien
    </a>
</header>

<div class="bg-card border border-border rounded-xl p-4 mb-6">
    <div class="flex gap-3 mb-3">
        <div class="flex-1 relative">
            <svg class="absolute left-3 top-3 text-muted-foreground" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="text" placeholder="Référence, désignation, site..." class="w-full pl-10 pr-4 py-2.5 border border-input rounded-lg focus:ring-2 focus:ring-primary">
        </div>
        <select class="px-4 py-2.5 border border-input rounded-lg">
            <option>Catégorie</option>
            <option>Immobilier</option>
            <option>Véhicules</option>
            <option>Équipements</option>
            <option>Mobilier</option>
            <option>Informatique</option>
        </select>
        <select class="px-4 py-2.5 border border-input rounded-lg">
            <option>État</option>
            <option>Conforme</option>
            <option>Dégradé</option>
            <option>À vérifier</option>
        </select>
        <select class="px-4 py-2.5 border border-input rounded-lg">
            <option>Localisation</option>
            <option>Golfe • Lomé</option>
            <option>Kozah • Kara</option>
        </select>
    </div>
    <div class="flex items-center justify-between text-sm text-muted-foreground">
        <span>Affichage de 1–6 sur 12 846 biens</span>
        <a href="#" class="text-primary font-medium flex items-center gap-1 hover:underline">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
            Exporter le registre
        </a>
    </div>
</div>

<div class="bg-card border border-border rounded-xl overflow-hidden mb-6">
    <table class="w-full text-sm">
        <thead class="bg-muted text-muted-foreground text-xs uppercase">
            <tr>
                <th class="px-6 py-3 text-left font-medium">Référence</th>
                <th class="px-6 py-3 text-left font-medium">Désignation</th>
                <th class="px-6 py-3 text-left font-medium">Catégorie</th>
                <th class="px-6 py-3 text-left font-medium">Localisation</th>
                <th class="px-6 py-3 text-left font-medium">Valeur nette</th>
                <th class="px-6 py-3 text-left font-medium">État</th>
                <th class="px-6 py-3"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-border">
            @forelse($biens as $bien)
            <tr class="hover:bg-muted/50">
                <td class="px-6 py-4 font-mono text-xs">{{ $bien['reference'] }}</td>
                <td class="px-6 py-4 font-medium">{{ $bien['designation'] }}</td>
                <td class="px-6 py-4">{{ $bien['categorie']['nom'] ?? '-' }}</td>
                <td class="px-6 py-4">{{ $bien['localisation']['ville'] ?? '-' }}</td>
                <td class="px-6 py-4 font-medium">{{ number_format($bien['valeur'], 0, ',', ' ') }} FCFA</td>
                <td class="px-6 py-4">
                    @if($bien['statut'] == 'conforme')
                        <span class="bg-tertiary text-tertiary-foreground px-2.5 py-1 rounded-full text-xs font-medium">Conforme</span>
                    @elseif($bien['statut'] == 'degrade')
                        <span class="bg-destructive text-destructive-foreground px-2.5 py-1 rounded-full text-xs font-medium">Dégradé</span>
                    @else
                        <span class="bg-secondary text-secondary-foreground px-2.5 py-1 rounded-full text-xs font-medium">À vérifier</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-right"><a href="/biens/{{ $bien['id'] }}" class="text-primary font-medium hover:underline">Ouvrir</a></td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="px-6 py-8 text-center text-muted-foreground">Aucun bien enregistré.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="flex items-center justify-between text-sm text-muted-foreground">
    <span>Mise à jour des données : 10 nov. 2026 à 08:30</span>
    <div class="flex items-center gap-1">
        <button class="w-9 h-9 flex items-center justify-center border border-border rounded-lg hover:bg-muted">&lsaquo;</button>
        <button class="w-9 h-9 flex items-center justify-center bg-primary text-primary-foreground rounded-lg font-medium">1</button>
        <button class="w-9 h-9 flex items-center justify-center border border-border rounded-lg hover:bg-muted">2</button>
        <button class="w-9 h-9 flex items-center justify-center border border-border rounded-lg hover:bg-muted">3</button>
        <button class="w-9 h-9 flex items-center justify-center border border-border rounded-lg hover:bg-muted">&rsaquo;</button>
    </div>
</div>

@endsection