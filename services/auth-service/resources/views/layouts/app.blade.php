<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Patrimoine État')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --background: #F6F8FC;
            --foreground: #172033;
            --primary: #10A8D4;
            --primary-foreground: #343333;
            --secondary: #E7EFFA;
            --secondary-foreground: #123B73;
            --tertiary: #16B6AE;
            --tertiary-foreground: #3A3A3A;
            --muted: #EEF2F7;
            --muted-foreground: #656E83;
            --accent: #E1F7F7;
            --accent-foreground: #172033;
            --card: #FFFFFF;
            --card-foreground: #172033;
            --destructive: #B42318;
            --destructive-foreground: #FFFFFF;
            --border: #D7DFEA;
            --input: #CBD5E1;
            --ring: #10A8D4;
        }
        body { font-family: 'Inter', sans-serif; background-color: var(--background); color: var(--foreground); }
        .bg-primary { background-color: var(--primary); color: var(--primary-foreground); }
        .bg-secondary { background-color: var(--secondary); color: var(--secondary-foreground); }
        .bg-tertiary { background-color: var(--tertiary); color: var(--tertiary-foreground); }
        .bg-card { background-color: var(--card); color: var(--card-foreground); }
        .bg-muted { background-color: var(--muted); color: var(--muted-foreground); }
        .bg-accent { background-color: var(--accent); color: var(--accent-foreground); }
        .bg-destructive { background-color: var(--destructive); color: var(--destructive-foreground); }
        .text-primary { color: var(--primary); }
        .text-tertiary { color: var(--tertiary); }
        .text-destructive { color: var(--destructive); }
        .text-muted-foreground { color: var(--muted-foreground); }
        .border-border { border-color: var(--border); }
        .border-input { border-color: var(--input); }
        .shadow-theme { box-shadow: 0 10px 30px -8px rgba(15, 23, 42, 0.12); }
        .brand-gradient { background-image: linear-gradient(135deg, var(--primary), var(--accent)); }
    </style>
</head>
<body class="min-h-screen flex flex-col">

<div class="flex flex-1 overflow-hidden">

    @php
        $isFicheBien = request()->is('biens/*');
        $isRegistre = request()->is('registre');
    @endphp

    {{-- SIDEBAR --}}
    <aside class="w-64 flex flex-col flex-shrink-0 p-5 
        {{ $isFicheBien ? 'bg-white border-r border-border text-foreground' : 'bg-primary text-primary-foreground' }}">
        
        {{-- LOGO --}}
        <div class="flex items-center gap-3 mb-9">
            <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0" 
                 style="{{ $isFicheBien ? 'background: linear-gradient(135deg, #10A8D4 0%, #16B6AE 100%); color: white;' : 'background: white; color: #10A8D4;' }}">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 21h18"/>
                    <path d="M5 21V7l7-4 7 4v14"/>
                    <path d="M9 21v-4a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v4"/>
                    <path d="M10 9h4"/>
                    <path d="M10 13h4"/>
                </svg>
            </div>
            <div>
                @if($isFicheBien)
                    <p class="text-[10px] tracking-widest text-muted-foreground uppercase leading-tight">République<br>Togolaise</p>
                    <p class="font-bold text-sm leading-tight mt-1">Patrimoine de l'État</p>
                @else
                    <p class="font-bold text-lg leading-tight">Patrimoine État</p>
                    <p class="text-xs opacity-80">Pilotage national</p>
                @endif
            </div>
        </div>

        {{-- NAVIGATION --}}
        <nav class="space-y-2 text-sm">
            {{-- Tableau de bord --}}
            <a href="/dashboard" class="flex items-center gap-3 rounded-lg px-3 py-3 
                {{ request()->is('dashboard') 
                    ? ($isFicheBien ? 'bg-accent font-semibold text-foreground' : 'bg-white text-[#10A8D4] font-semibold') 
                    : ($isFicheBien ? 'text-muted-foreground hover:bg-muted' : 'hover:bg-white/10') }}">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                Tableau de bord
            </a>

            {{-- Registre / Biens --}}
            <a href="/registre" class="flex items-center gap-3 rounded-lg px-3 py-3 
                {{ ($isRegistre || $isFicheBien) 
                    ? ($isFicheBien ? 'bg-accent font-semibold text-foreground' : 'bg-white text-[#10A8D4] font-semibold') 
                    : ($isFicheBien ? 'text-muted-foreground hover:bg-muted' : 'hover:bg-white/10') }}">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                {{ $isFicheBien ? 'Biens' : 'Registre du patrimoine' }}
            </a>

            {{-- Affectations --}}
            <a href="/affectations" class="flex items-center gap-3 rounded-lg px-3 py-3 
                {{ request()->is('affectations') 
                    ? ($isFicheBien ? 'bg-accent font-semibold text-foreground' : 'bg-white text-[#10A8D4] font-semibold') 
                    : ($isFicheBien ? 'text-muted-foreground hover:bg-muted' : 'hover:bg-white/10') }}">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="5 9 2 12 5 15"/><polyline points="9 5 12 2 15 5"/><line x1="2" y1="12" x2="22" y2="12"/><polyline points="15 19 12 22 9 19"/><polyline points="19 15 22 12 19 9"/></svg>
                Affectations
            </a>

            {{-- Rapports --}}
            <a href="/rapports" class="flex items-center gap-3 rounded-lg px-3 py-3 
                {{ request()->is('rapports') 
                    ? ($isFicheBien ? 'bg-accent font-semibold text-foreground' : 'bg-white text-[#10A8D4] font-semibold') 
                    : ($isFicheBien ? 'text-muted-foreground hover:bg-muted' : 'hover:bg-white/10') }}">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                Rapports
            </a>
        </nav>

        {{-- DÉCONNEXION --}}
        <form method="POST" action="/logout" class="mt-auto pt-4">
            @csrf
            <button type="submit" class="w-full rounded-xl p-4 text-sm text-left transition 
                {{ $isFicheBien ? 'bg-accent hover:bg-[#d0f0f0]' : 'bg-white/20 hover:bg-white/30' }}">
                <div class="flex items-center gap-2">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                    <span class="font-semibold">Déconnexion</span>
                </div>
                <p class="mt-1 text-xs opacity-80">Quitter votre espace sécurisé</p>
            </button>
        </form>
    </aside>

    {{-- CONTENU --}}
    <main class="flex-1 p-8 overflow-y-auto">
        @yield('content')
    </main>

</div>

</body>
</html>