@extends('layouts.app')

@section('title', 'Rapports - Patrimoine État')

@section('content')

<header class="flex items-center justify-between gap-6 mb-8">
    <div>
        <p class="text-sm text-muted-foreground">Analyse et pilotage du patrimoine national</p>
        <h1 class="text-2xl font-bold">Rapports</h1>
    </div>
    <div class="flex items-center gap-3">
        <button class="px-5 py-2.5 rounded-lg border border-border font-medium hover:bg-muted transition flex items-center gap-2">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
            Exporter
        </button>
        <button class="px-5 py-2.5 rounded-lg text-white font-semibold shadow-md transition" style="background: linear-gradient(135deg, #10A8D4 0%, #16B6AE 100%);">
            Générer le rapport
        </button>
    </div>
</header>

{{-- FILTRES --}}
<div class="bg-card border border-border rounded-xl p-4 mb-6">
    <div class="flex gap-3">
        <select class="px-4 py-2.5 border border-input rounded-lg">
            <option>Exercice 2026</option>
            <option>Exercice 2025</option>
        </select>
        <select class="px-4 py-2.5 border border-input rounded-lg">
            <option>Toutes catégories</option>
            <option>Immobilier</option>
            <option>Véhicules</option>
        </select>
        <select class="px-4 py-2.5 border border-input rounded-lg">
            <option>Toutes régions</option>
            <option>Golfe</option>
            <option>Kozah</option>
        </select>
        <select class="px-4 py-2.5 border border-input rounded-lg">
            <option>Situation au 10 nov. 2026</option>
        </select>
    </div>
</div>

{{-- KPI CARDS --}}
<div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-6">
    <div class="bg-card border border-border rounded-xl p-5 shadow-theme">
        <p class="text-sm text-muted-foreground">Valeur patrimoniale</p>
        <p class="font-bold text-2xl mt-2">48,6 Md FCFA</p>
        <p class="text-sm text-tertiary mt-2">+4,2 % annuel</p>
    </div>
    <div class="bg-card border border-border rounded-xl p-5 shadow-theme">
        <p class="text-sm text-muted-foreground">Taux de conformité</p>
        <p class="font-bold text-2xl mt-2">85,2 %</p>
        <p class="text-sm text-primary mt-2">10 938 biens conformes</p>
    </div>
    <div class="bg-card border border-border rounded-xl p-5 shadow-theme">
        <p class="text-sm text-muted-foreground">Biens à régulariser</p>
        <p class="font-bold text-2xl mt-2">317</p>
        <p class="text-sm text-destructive mt-2">Priorité de contrôle</p>
    </div>
    <div class="bg-card border border-border rounded-xl p-5 shadow-theme">
        <p class="text-sm text-muted-foreground">Mouvements traités</p>
        <p class="font-bold text-2xl mt-2">1 846</p>
        <p class="text-sm text-tertiary mt-2">Depuis janvier</p>
    </div>
</div>

{{-- GRAPHIQUES --}}
<div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-6">

    {{-- Graphique Évolution --}}
    <div class="xl:col-span-2 bg-card border border-border rounded-xl p-6 shadow-theme">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-lg font-semibold">Évolution de la valeur patrimoniale</h2>
                <p class="text-sm text-muted-foreground mt-1">En milliards de FCFA</p>
            </div>
            <span class="text-sm font-semibold text-tertiary">+4,2 %</span>
        </div>
        <div class="flex items-end justify-between h-48 gap-2 mt-8">
            <div class="flex flex-col items-center justify-end flex-1 h-full">
                <div class="w-full bg-secondary rounded-t-md h-[30%]"></div>
                <p class="text-xs text-muted-foreground mt-2">Jan.</p>
            </div>
            <div class="flex flex-col items-center justify-end flex-1 h-full">
                <div class="w-full bg-[#93c5fd] rounded-t-md h-[45%]"></div>
                <p class="text-xs text-muted-foreground mt-2">Mars</p>
            </div>
            <div class="flex flex-col items-center justify-end flex-1 h-full">
                <div class="w-full bg-primary rounded-t-md h-[60%]"></div>
                <p class="text-xs text-muted-foreground mt-2">Mai</p>
            </div>
            <div class="flex flex-col items-center justify-end flex-1 h-full">
                <div class="w-full bg-[#5eead4] rounded-t-md h-[75%]"></div>
                <p class="text-xs text-muted-foreground mt-2">Juil.</p>
            </div>
            <div class="flex flex-col items-center justify-end flex-1 h-full">
                <div class="w-full bg-tertiary rounded-t-md h-[90%]"></div>
                <p class="text-xs text-muted-foreground mt-2">Nov.</p>
            </div>
        </div>
    </div>

    {{-- Répartition par catégorie --}}
    <div class="bg-card border border-border rounded-xl p-6 shadow-theme">
        <h2 class="text-lg font-semibold mb-5">Répartition par catégorie</h2>
        <div class="space-y-4">
            <div>
                <div class="flex justify-between text-sm mb-1">
                    <span>Immobilier</span>
                    <span class="font-semibold">58 %</span>
                </div>
                <div class="w-full bg-muted rounded-full h-2">
                    <div class="bg-primary h-2 rounded-full w-[58%]"></div>
                </div>
            </div>
            <div>
                <div class="flex justify-between text-sm mb-1">
                    <span>Véhicules et engins</span>
                    <span class="font-semibold">18 %</span>
                </div>
                <div class="w-full bg-muted rounded-full h-2">
                    <div class="bg-tertiary h-2 rounded-full w-[18%]"></div>
                </div>
            </div>
            <div>
                <div class="flex justify-between text-sm mb-1">
                    <span>Équipements</span>
                    <span class="font-semibold">14 %</span>
                </div>
                <div class="w-full bg-muted rounded-full h-2">
                    <div class="bg-primary h-2 rounded-full w-[14%]"></div>
                </div>
            </div>
            <div>
                <div class="flex justify-between text-sm mb-1">
                    <span>Mobilier et IT</span>
                    <span class="font-semibold">10 %</span>
                </div>
                <div class="w-full bg-muted rounded-full h-2">
                    <div class="bg-[#5eead4] h-2 rounded-full w-[10%]"></div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- RAPPORTS DISPONIBLES --}}
<div class="bg-card border border-border rounded-xl p-6 shadow-theme">
    <h2 class="text-lg font-semibold mb-5">Rapports disponibles</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="border border-border rounded-lg p-5">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#10A8D4" stroke-width="2" class="mb-3"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
            <p class="font-semibold text-sm">Inventaire national consolidé</p>
            <p class="text-xs text-muted-foreground mt-1">Situation au 10 novembre 2026</p>
            <button class="mt-4 text-primary text-sm font-medium hover:underline">Télécharger</button>
        </div>
        <div class="border border-border rounded-lg p-5">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#16B6AE" stroke-width="2" class="mb-3"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
            <p class="font-semibold text-sm">Mouvements mensuels</p>
            <p class="text-xs text-muted-foreground mt-1">Affectations et transferts</p>
            <button class="mt-4 text-primary text-sm font-medium hover:underline">Télécharger</button>
        </div>
        <div class="border border-border rounded-lg p-5">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#B42318" stroke-width="2" class="mb-3"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            <p class="font-semibold text-sm">Biens à régulariser</p>
            <p class="text-xs text-muted-foreground mt-1">Liste des contrôles prioritaires</p>
            <button class="mt-4 text-primary text-sm font-medium hover:underline">Télécharger</button>
        </div>
    </div>
</div>

@endsection
