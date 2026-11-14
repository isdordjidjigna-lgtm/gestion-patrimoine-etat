@extends('layouts.app')

@section('title', 'Ajouter un bien - Patrimoine État')

@section('content')

<header class="flex items-center justify-between gap-6 mb-8">
    <div>
        <a href="/registre" class="text-sm text-primary font-medium flex items-center gap-1 hover:underline mb-2">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
            Retour au registre
        </a>
        <h1 class="text-2xl font-bold">Ajouter un bien</h1>
        <p class="text-sm text-muted-foreground mt-1">Enregistrez un nouvel élément du patrimoine de l'État.</p>
    </div>
</header>

<form class="grid grid-cols-1 xl:grid-cols-3 gap-6">
    
    {{-- COLONNE GAUCHE --}}
    <div class="xl:col-span-2 space-y-6">
        
        {{-- IDENTIFICATION --}}
        <div class="bg-card border border-border rounded-xl p-6 shadow-theme">
            <h2 class="text-lg font-semibold mb-4">Identification du bien</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Désignation du bien</label>
                    <input type="text" placeholder="Ex. Véhicule de service Toyota Hilux" class="w-full px-4 py-2.5 border border-input rounded-lg focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Catégorie</label>
                    <select class="w-full px-4 py-2.5 border border-input rounded-lg focus:ring-2 focus:ring-primary">
                        <option>Sélectionner une catégorie</option>
                        <option>Immobilier</option>
                        <option>Véhicules</option>
                        <option>Équipements</option>
                        <option>Mobilier</option>
                        <option>Informatique</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Référence interne</label>
                    <input type="text" placeholder="PAT-XXX-0000" class="w-full px-4 py-2.5 border border-input rounded-lg focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Service gestionnaire</label>
                    <input type="text" placeholder="Ministère ou direction détentrice" class="w-full px-4 py-2.5 border border-input rounded-lg focus:ring-2 focus:ring-primary">
                </div>
            </div>
        </div>

        {{-- ACQUISITION --}}
        <div class="bg-card border border-border rounded-xl p-6 shadow-theme">
            <h2 class="text-lg font-semibold mb-4">Acquisition et valeur</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Date d'acquisition</label>
                    <input type="date" class="w-full px-4 py-2.5 border border-input rounded-lg focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Valeur d'acquisition</label>
                    <input type="text" placeholder="Montant en FCFA" class="w-full px-4 py-2.5 border border-input rounded-lg focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Mode d'acquisition</label>
                    <select class="w-full px-4 py-2.5 border border-input rounded-lg focus:ring-2 focus:ring-primary">
                        <option>Achat public</option>
                        <option>Don</option>
                        <option>Construction publique</option>
                        <option>Héritage</option>
                    </select>
                </div>
            </div>
        </div>

        {{-- LOCALISATION --}}
        <div class="bg-card border border-border rounded-xl p-6 shadow-theme">
            <h2 class="text-lg font-semibold mb-4">Localisation et état</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Région / Préfecture</label>
                    <input type="text" placeholder="Ex. Golfe, Lomé" class="w-full px-4 py-2.5 border border-input rounded-lg focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">État du bien</label>
                    <select class="w-full px-4 py-2.5 border border-input rounded-lg focus:ring-2 focus:ring-primary">
                        <option>Bon état</option>
                        <option>Dégradé</option>
                        <option>À vérifier</option>
                        <option>Réformé</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    {{-- COLONNE DROITE --}}
    <div class="space-y-6">
        {{-- PIÈCES JOINTES --}}
        <div class="bg-card border border-border rounded-xl p-6 shadow-theme">
            <h2 class="text-lg font-semibold mb-4">Pièces jointes</h2>
            <div class="border-2 border-dashed border-border rounded-lg p-6 text-center">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="mx-auto text-primary mb-2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                <p class="text-sm font-medium">Déposer les documents</p>
                <p class="text-xs text-muted-foreground mt-1">Acte, facture, photos ou rapport</p>
            </div>
        </div>

        {{-- BROUILLON --}}
        <div class="bg-card border border-border rounded-xl p-6 shadow-theme">
            <p class="text-sm text-muted-foreground">Brouillon enregistré automatiquement</p>
            <p class="font-semibold mt-2">Aucune erreur détectée</p>
        </div>
    </div>
</form>

<div class="flex justify-end gap-3 mt-6">
    <a href="/registre" class="px-5 py-3 rounded-lg border border-border font-medium hover:bg-muted transition">Annuler</a>
    <button type="submit" class="px-5 py-3 rounded-lg text-white font-semibold shadow-md transition" style="background: linear-gradient(135deg, #10A8D4 0%, #16B6AE 100%);">Enregistrer le bien</button>
</div>

@endsection