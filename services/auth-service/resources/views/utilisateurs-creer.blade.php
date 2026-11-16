@extends('layouts.app')

@section('title', 'Nouvel utilisateur - Patrimoine État')

@section('content')

<header class="flex items-center justify-between gap-6 mb-8">
    <div>
        <a href="/utilisateurs" class="text-sm text-primary font-medium flex items-center gap-1 hover:underline mb-2">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
            Retour aux utilisateurs
        </a>
        <h1 class="text-2xl font-bold">Nouvel utilisateur</h1>
        <p class="text-sm text-muted-foreground mt-1">Créez un nouveau compte utilisateur.</p>
    </div>
</header>

<div class="bg-card border border-border rounded-xl p-6 shadow-theme max-w-2xl">
    <form method="POST" action="/utilisateurs">
        @csrf
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium mb-1">Nom complet</label>
                <input type="text" name="nom" placeholder="Ex. Koffi Mensah" class="w-full px-4 py-2.5 border border-input rounded-lg focus:ring-2 focus:ring-primary">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" placeholder="prenom.nom@gouv.tg" class="w-full px-4 py-2.5 border border-input rounded-lg focus:ring-2 focus:ring-primary">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Rôle</label>
                <select name="role" class="w-full px-4 py-2.5 border border-input rounded-lg focus:ring-2 focus:ring-primary">
                    <option value="Administrateur">Administrateur</option>
                    <option value="Gestionnaire">Gestionnaire</option>
                    <option value="Agent">Agent</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Mot de passe</label>
                <input type="password" name="password" placeholder="••••••••" class="w-full px-4 py-2.5 border border-input rounded-lg focus:ring-2 focus:ring-primary">
            </div>
        </div>
        <div class="flex justify-end gap-3 mt-6">
            <a href="/utilisateurs" class="px-5 py-3 rounded-lg border border-border font-medium hover:bg-muted transition">Annuler</a>
            <button type="submit" class="px-5 py-3 rounded-lg text-white font-semibold shadow-md transition" style="background: linear-gradient(135deg, #10A8D4 0%, #16B6AE 100%);">Créer l'utilisateur</button>
        </div>
    </form>
</div>

@endsection
