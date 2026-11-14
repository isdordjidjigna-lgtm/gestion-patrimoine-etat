@extends('layouts.app')

@section('title', $bien['designation'] . ' - Patrimoine État')

@section('content')

<header class="flex items-start justify-between gap-6 mb-8">
    <div>
        <a href="/registre" class="text-sm text-primary flex items-center gap-2 font-medium">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
            Retour au registre
        </a>
        <div class="flex items-center gap-3 mt-5">
            <p class="font-mono text-xs text-muted-foreground">{{ $bien['reference'] }}</p>
            <span class="rounded-full bg-accent px-3 py-1 text-xs font-semibold text-accent-foreground">Actif · Bon état</span>
        </div>
        <h1 class="text-2xl font-bold mt-2">{{ $bien['designation'] }}</h1>
        <p class="text-sm text-muted-foreground mt-2">{{ $bien['categorie']['nom'] ?? '-' }} · {{ $bien['description'] ?? '' }}</p>
    </div>
    <a href="/ajouter-affectation" class="min-h-11 rounded-full p-[2px] shadow-md inline-flex" style="background: linear-gradient(135deg, #10A8D4 0%, #16B6AE 100%);">
        <span class="min-h-10 rounded-full bg-white px-5 flex items-center gap-2 font-semibold text-gray-800">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Nouvelle affectation
        </span>
    </a>
</header>

<section class="grid grid-cols-1 xl:grid-cols-3 gap-6">
    {{-- COLONNE GAUCHE --}}
    <div class="xl:col-span-2 space-y-6">

        {{-- VALEUR + ACQUISITION (bordure dégradée) --}}
        <div class="rounded-xl p-[2px] shadow-md" style="background: linear-gradient(135deg, #10A8D4 0%, #16B6AE 100%);">
            <div class="rounded-xl bg-white p-6">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <div>
                        <p class="text-sm text-muted-foreground">Valeur nette comptable</p>
                        <p class="text-2xl font-bold mt-2">{{ number_format($bien['valeur'], 0, ',', ' ') }} FCFA</p>
                        <p class="text-xs text-tertiary font-semibold mt-2">+ 4,7 % depuis 2025</p>
                    </div>
                    <div class="sm:border-l sm:border-border sm:pl-6">
                        <p class="text-sm text-muted-foreground">Date d’acquisition</p>
                        <p class="font-semibold mt-2">{{ \Carbon\Carbon::parse($bien['date_acquisition'])->format('d M Y') }}</p>
                        <p class="text-xs text-muted-foreground mt-2">{{ $bien['mode_acquisition'] ?? '-' }}</p>
                    </div>
                    <div class="sm:border-l sm:border-border sm:pl-6">
                        <p class="text-sm text-muted-foreground">État physique</p>
                        <p class="font-semibold text-tertiary mt-2 flex items-center gap-2">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            {{ ucfirst($bien['statut']) }}
                        </p>
                        <p class="text-xs text-muted-foreground mt-2">Inspection : sept. 2026</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- INFORMATIONS ADMINISTRATIVES --}}
        <div class="bg-card border border-border rounded-xl p-6 shadow-md">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold">Informations administratives</h2>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-0 mt-5 text-sm">
                <div class="flex justify-between gap-5 border-b border-border py-3">
                    <span class="text-muted-foreground">Catégorie</span>
                    <span class="font-semibold text-right">{{ $bien['categorie']['nom'] ?? '-' }}</span>
                </div>
                <div class="flex justify-between gap-5 border-b border-border py-3">
                    <span class="text-muted-foreground">Surface bâtie</span>
                    <span class="font-semibold">{{ $bien['surface'] ? number_format($bien['surface'], 0, ',', ' ') . ' m²' : '-' }}</span>
                </div>
                <div class="flex justify-between gap-5 border-b border-border py-3">
                    <span class="text-muted-foreground">Immatriculation</span>
                    <span class="font-semibold text-right">{{ $bien['immatriculation'] ?? '-' }}</span>
                </div>
                <div class="flex justify-between gap-5 border-b border-border py-3">
                    <span class="text-muted-foreground">Durée d’amortissement</span>
                    <span class="font-semibold">{{ $bien['duree_amortissement'] ?? '-' }} ans</span>
                </div>
                <div class="flex justify-between gap-5 border-b border-border py-3">
                    <span class="text-muted-foreground">Mode d’acquisition</span>
                    <span class="font-semibold text-right">{{ $bien['mode_acquisition'] ?? '-' }}</span>
                </div>
                <div class="flex justify-between gap-5 border-b border-border py-3">
                    <span class="text-muted-foreground">Responsable</span>
                    <span class="font-semibold">{{ $bien['responsable'] ?? '-' }}</span>
                </div>
            </div>
        </div>

        {{-- HISTORIQUE --}}
        <div class="bg-card border border-border rounded-xl p-6 shadow-md">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold">Historique des mouvements</h2>
                <a href="/affectations" class="text-sm font-semibold text-primary">Voir tout</a>
            </div>
            <div class="mt-5 space-y-5 text-sm">
                @forelse($bien['mouvements'] ?? [] as $mouvement)
                <div class="flex gap-4">
                    <div class="h-9 w-9 rounded-full bg-accent shrink-0 flex items-center justify-center">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#16B6AE" stroke-width="2"><path d="M23 4v6h-6"/><path d="M1 20v-6h6"/><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"/></svg>
                    </div>
                    <div>
                        <p class="font-semibold capitalize">{{ $mouvement['type'] }}</p>
                        <p class="text-muted-foreground mt-1">{{ $mouvement['notes'] ?? '-' }} · {{ \Carbon\Carbon::parse($mouvement['date_mouvement'])->format('d M Y') }}</p>
                    </div>
                </div>
                @empty
                <p class="text-muted-foreground">Aucun mouvement enregistré.</p>
                @endforelse
            </div>
        </div>
    </div>

    {{-- COLONNE DROITE --}}
    <aside class="space-y-6">
        {{-- LOCALISATION --}}
        <div class="rounded-xl p-[2px] shadow-md" style="background: linear-gradient(135deg, #10A8D4 0%, #16B6AE 100%);">
            <div class="rounded-xl bg-white p-6">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold">Localisation</h2>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#10A8D4" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                </div>
                <div class="h-40 rounded-lg bg-secondary mt-4 flex flex-col items-center justify-center">
                    <div class="h-11 w-11 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #10A8D4 0%, #16B6AE 100%);">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <p class="text-xs text-secondary-foreground mt-3">{{ $bien['localisation']['region'] ?? '-' }} · {{ $bien['localisation']['ville'] ?? '-' }}</p>
                </div>
                <p class="font-semibold mt-4">{{ $bien['localisation']['adresse'] ?? '-' }}</p>
                <p class="text-sm text-muted-foreground mt-1">{{ $bien['localisation']['ville'] ?? '-' }}, République togolaise</p>
            </div>
        </div>

        {{-- DOCUMENTS --}}
        <div class="bg-card border border-border rounded-xl p-6 shadow-md">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold">Documents</h2>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#16B6AE" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
            </div>
            <div class="mt-4 space-y-3">
                <a href="#" class="flex items-center gap-3 text-sm hover:underline">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#10A8D4" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                    <span class="font-medium">Titre foncier.pdf</span>
                </a>
                <a href="#" class="flex items-center gap-3 text-sm hover:underline">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#10A8D4" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                    <span class="font-medium">Rapport d’évaluation.pdf</span>
                </a>
            </div>
        </div>
    </aside>
</section>

@endsection
