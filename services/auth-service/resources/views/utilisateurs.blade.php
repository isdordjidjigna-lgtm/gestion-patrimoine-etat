@extends('layouts.app')

@section('title', 'Utilisateurs - Patrimoine État')

@section('content')

@if(session('success'))
<div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6">
    {{ session('success') }}
</div>
@endif

<header class="flex items-center justify-between gap-6 mb-8">
    <div>
        <p class="text-sm text-muted-foreground">Gestion des comptes</p>
        <h1 class="text-2xl font-bold">Utilisateurs</h1>
    </div>
    <a href="/utilisateurs/creer" class="bg-gradient-to-r from-primary to-tertiary text-foreground px-5 py-3 rounded-lg font-semibold flex items-center gap-2 hover:shadow-lg transition" style="background: linear-gradient(135deg, #10A8D4 0%, #16B6AE 100%);">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        Nouvel utilisateur
    </a>
</header>

<div class="bg-card border border-border rounded-xl overflow-hidden mb-6">
    <table class="w-full text-sm">
        <thead class="bg-muted text-muted-foreground text-xs uppercase">
            <tr>
                <th class="px-6 py-3 text-left font-medium">Nom</th>
                <th class="px-6 py-3 text-left font-medium">Email</th>
                <th class="px-6 py-3 text-left font-medium">Rôle</th>
                <th class="px-6 py-3 text-left font-medium">Statut</th>
                <th class="px-6 py-3"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-border">
            @forelse($utilisateurs as $user)
            <tr class="hover:bg-muted/50">
                <td class="px-6 py-4 font-medium">{{ $user['nom'] }}</td>
                <td class="px-6 py-4">{{ $user['email'] }}</td>
                <td class="px-6 py-4">
                    <span class="bg-secondary text-secondary-foreground px-2.5 py-1 rounded-full text-xs font-medium">{{ $user['role'] }}</span>
                </td>
                <td class="px-6 py-4">
                    @if($user['actif'])
                        <span class="bg-tertiary text-tertiary-foreground px-2.5 py-1 rounded-full text-xs font-medium">Actif</span>
                    @else
                        <span class="bg-destructive text-destructive-foreground px-2.5 py-1 rounded-full text-xs font-medium">Inactif</span>
                    @endif
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="text-primary font-medium hover:underline">Modifier</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-8 text-center text-muted-foreground">Aucun utilisateur enregistré.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
