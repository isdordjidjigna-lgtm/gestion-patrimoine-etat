@extends('layouts.app')

@section('title', 'Mon profil - Patrimoine État')

@section('content')

<header class="flex items-center justify-between gap-6 mb-8">
    <div>
        <p class="text-sm text-muted-foreground">Espace personnel</p>
        <h1 class="text-2xl font-bold">Mon profil</h1>
    </div>
</header>

<div class="bg-card border border-border rounded-xl p-6 shadow-theme max-w-2xl">
    <div class="flex items-center gap-4 mb-6">
        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-teal-400 to-cyan-500 flex items-center justify-center text-white font-bold text-xl">
            KM
        </div>
        <div>
            <h2 class="text-xl font-bold">{{ auth()->user()->name ?? 'Koffi Mensah' }}</h2>
            <p class="text-sm text-muted-foreground">{{ auth()->user()->email ?? 'admin@gouv.tg' }}</p>
        </div>
    </div>

    <div class="space-y-4">
        <div class="flex justify-between border-b border-border pb-2">
            <span class="text-muted-foreground">Nom complet</span>
            <span class="font-medium">{{ auth()->user()->name ?? 'Koffi Mensah' }}</span>
        </div>
        <div class="flex justify-between border-b border-border pb-2">
            <span class="text-muted-foreground">Email</span>
            <span class="font-medium">{{ auth()->user()->email ?? 'admin@gouv.tg' }}</span>
        </div>
        <div class="flex justify-between border-b border-border pb-2">
            <span class="text-muted-foreground">Rôle</span>
            <span class="font-medium">Administrateur</span>
        </div>
        <div class="flex justify-between border-b border-border pb-2">
            <span class="text-muted-foreground">Statut</span>
            <span class="font-medium text-tertiary">Actif</span>
        </div>
    </div>

    <div class="mt-6 flex justify-end">
        <a href="/dashboard" class="px-5 py-3 rounded-lg border border-border font-medium hover:bg-muted transition">Retour au tableau de bord</a>
    </div>
</div>

@endsection
