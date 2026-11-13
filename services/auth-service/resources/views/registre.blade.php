@extends('layouts.app')

@section('title', 'Registre du patrimoine - Patrimoine État')
@section('page_title', 'Registre du patrimoine')

@section('content')

{{-- Barre d'action (Ajouter + titre) --}}
<div class="flex items-center justify-between mb-6">
    <div>
        <p class="text-xs text-gray-500 uppercase tracking-wide">Inventaire national • 12 846 enregistrements</p>
        <h1 class="text-2xl font-bold text-gray-900">Registre du patrimoine</h1>
    </div>
    <button class="bg-gradient-to-r from-[#0ea5b7] to-[#14b8a6] text-white px-5 py-3 rounded-lg font-semibold flex items-center gap-2 hover:shadow-lg transition">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Ajouter un bien
    </button>
</div>

{{-- Barre de recherche et filtres --}}
<div class="bg-white rounded-xl border border-gray-200 p-4 mb-6">
    <div class="flex gap-3 mb-3">
        <div class="flex-1 relative">
            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <input type="text" placeholder="Référence, désignation, site..." class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500">
        </div>
        <select class="px-4 py-2.5 border border-gray-300 rounded-lg text-gray-700 focus:ring-2 focus:ring-teal-500">
            <option>Catégorie</option>
            <option>Immobilier</option>
            <option>Véhicules</option>
            <option>Équipements</option>
            <option>Mobilier</option>
            <option>Informatique</option>
        </select>
        <select class="px-4 py-2.5 border border-gray-300 rounded-lg text-gray-700 focus:ring-2 focus:ring-teal-500">
            <option>État</option>
            <option>Conforme</option>
            <option>Dégradé</option>
            <option>À vérifier</option>
        </select>
        <select class="px-4 py-2.5 border border-gray-300 rounded-lg text-gray-700 focus:ring-2 focus:ring-teal-500">
            <option>Localisation</option>
            <option>Golfe • Lomé</option>
            <option>Kozah • Kara</option>
            <option>Plateaux • Atakpamé</option>
        </select>
    </div>
    <div class="flex items-center justify-between text-sm text-gray-500">
        <span>Affichage de 1–6 sur 12 846 biens</span>
        <a href="#" class="text-teal-600 font-medium flex items-center gap-1 hover:underline">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
            </svg>
            Exporter le registre
        </a>
    </div>
</div>

{{-- Tableau --}}
<div class="bg-white rounded-xl border border-gray-200 overflow-hidden mb-6">
    <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
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
        <tbody class="divide-y divide-gray-100">
            @forelse($biens as $bien)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 font-mono text-xs text-gray-600">{{ $bien->reference }}</td>
                <td class="px-6 py-4 font-medium text-gray-900">{{ $bien->designation }}</td>
                <td class="px-6 py-4 text-gray-600">{{ $bien->categorie->nom ?? '-' }}</td>
                <td class="px-6 py-4 text-gray-600">{{ $bien->localisation->ville ?? '-' }}</td>
                <td class="px-6 py-4 font-medium">{{ number_format($bien->valeur, 0, ',', ' ') }} FCFA</td>
                <td class="px-6 py-4">
                    @if($bien->statut == 'conforme')
                        <span class="bg-teal-100 text-teal-700 px-2.5 py-1 rounded-full text-xs font-medium">Conforme</span>
                    @elseif($bien->statut == 'degrade')
                        <span class="bg-red-100 text-red-700 px-2.5 py-1 rounded-full text-xs font-medium">Dégradé</span>
                    @else
                        <span class="bg-gray-100 text-gray-700 px-2.5 py-1 rounded-full text-xs font-medium">À vérifier</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-right"><a href="#" class="text-teal-600 font-medium hover:underline">Ouvrir</a></td>
            </tr>
            @empty
            <tr><td colspan="7" class="px-6 py-8 text-center text-gray-500">Aucun bien enregistré.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Pagination --}}
<div class="flex items-center justify-between text-sm text-gray-500">
    <span>Mise à jour des données : 10 nov. 2026 à 08:30</span>
    <div class="flex items-center gap-1">
        <button class="w-9 h-9 flex items-center justify-center border border-gray-300 rounded-lg hover:bg-gray-50">&lsaquo;</button>
        <button class="w-9 h-9 flex items-center justify-center bg-teal-500 text-white rounded-lg font-medium">1</button>
        <button class="w-9 h-9 flex items-center justify-center border border-gray-300 rounded-lg hover:bg-gray-50">2</button>
        <button class="w-9 h-9 flex items-center justify-center border border-gray-300 rounded-lg hover:bg-gray-50">3</button>
        <button class="w-9 h-9 flex items-center justify-center border border-gray-300 rounded-lg hover:bg-gray-50">&rsaquo;</button>
    </div>
</div>

@endsection
