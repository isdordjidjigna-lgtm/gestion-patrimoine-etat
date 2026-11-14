@extends('layouts.app')

@section('title', 'Nouvelle affectation - Patrimoine État')

@section('content')

<header class="flex items-center justify-between gap-6 mb-8">
    <div>
        <a href="/affectations" class="text-sm text-primary font-medium flex items-center gap-1 hover:underline mb-2">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
            Retour aux affectations
        </a>
        <h1 class="text-2xl font-bold">Nouvelle affectation</h1>
        <p class="text-sm text-muted-foreground mt-1">Enregistrez un nouveau mouvement de bien.</p>
    </div>
</header>

<div class="bg-card border border-border rounded-xl p-6 shadow-theme max-w-3xl">
    <form>
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium mb-1">Bien concerné</label>
                <select class="w-full px-4 py-2.5 border border-input rounded-lg focus:ring-2 focus:ring-primary">
                    <option>Sélectionner un bien</option>
                    <option>PAT-IMM-0042 - Immeuble administratif Lomé II</option>
                    <option>PAT-VEH-0268 - Toyota Land Cruiser 300</option>
                    <option>PAT-INF-1184 - Groupe électrogène 80 kVA</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Type de mouvement</label>
                <select class="w-full px-4 py-2.5 border border-input rounded-lg focus:ring-2 focus:ring-primary">
                    <option>Affectation</option>
                    <option>Transfert</option>
                    <option>Retour de maintenance</option>
                    <option>Mise hors service</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Entité destinataire</label>
                <input type="text" placeholder="Ministère, direction ou service" class="w-full px-4 py-2.5 border border-input rounded-lg focus:ring-2 focus:ring-primary">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Date du mouvement</label>
                <input type="date" class="w-full px-4 py-2.5 border border-input rounded-lg focus:ring-2 focus:ring-primary">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Notes (optionnel)</label>
                <textarea rows="3" placeholder="Commentaire ou précision..." class="w-full px-4 py-2.5 border border-input rounded-lg focus:ring-2 focus:ring-primary"></textarea>
            </div>
        </div>
        <div class="flex justify-end gap-3 mt-6">
            <a href="/affectations" class="px-5 py-3 rounded-lg border border-border font-medium hover:bg-muted transition">Annuler</a>
            <button type="submit" class="px-5 py-3 rounded-lg text-white font-semibold shadow-md transition" style="background: linear-gradient(135deg, #10A8D4 0%, #16B6AE 100%);">Enregistrer</button>
        </div>
    </form>
</div>

@endsection
