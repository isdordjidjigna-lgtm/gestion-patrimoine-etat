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
    <form method="GET" action="/affectations" class="flex gap-3">
        <div class="flex-1 relative">
            <svg class="absolute left-3 top-3 text-muted-foreground" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher un bien ou une référence..." class="w-full pl-10 pr-4 py-2.5 border border-input rounded-lg focus:ring-2 focus:ring-primary">
        </div>
        <button type="submit" class="px-5 py-2.5 rounded-lg text-white font-semibold transition" style="background: linear-gradient(135deg, #10A8D4 0%, #16B6AE 100%);">
            Rechercher
        </button>
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
    </form>
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
            @forelse($mouvements as $mouvement)
            <tr class="hover:bg-muted/50">
                <td class="px-6 py-4 font-mono text-xs">{{ $mouvement['reference'] }}</td>
                <td class="px-6 py-4 font-medium">{{ $mouvement['bien'] }}</td>
                <td class="px-6 py-4">{{ $mouvement['type'] }}</td>
                <td class="px-6 py-4">{{ $mouvement['entite'] }}</td>
                <td class="px-6 py-4">
                    @if($mouvement['statut'] == 'en_validation')
                        <span class="bg-secondary text-secondary-foreground px-2.5 py-1 rounded-full text-xs font-medium">En validation</span>
                    @elseif($mouvement['statut'] == 'valide')
                        <span class="bg-tertiary text-tertiary-foreground px-2.5 py-1 rounded-full text-xs font-medium">Validé</span>
                    @else
                        <span class="bg-destructive text-destructive-foreground px-2.5 py-1 rounded-full text-xs font-medium">À compléter</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-muted-foreground">{{ $mouvement['date'] }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-6 py-8 text-center text-muted-foreground">Aucun mouvement enregistré.</td>
            </tr>
            @endforelse
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