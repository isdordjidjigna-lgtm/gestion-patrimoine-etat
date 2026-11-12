<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Patrimoine de l'État</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen w-screen overflow-hidden font-sans">

<div class="flex h-full w-full">

    {{-- Panneau gauche (bleu/vert) --}}
    <div class="hidden lg:flex lg:w-1/2 flex-col justify-between p-12 text-white"
         style="background: linear-gradient(135deg, #0ea5b7 0%, #14b8a6 100%);">

        {{-- Logo en haut --}}
        <div class="flex items-center gap-3">
            <div class="bg-white p-2 rounded-lg">
                <svg class="w-6 h-6 text-teal-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                </svg>
            </div>
            <div>
                <h1 class="font-bold text-lg">Patrimoine de l'État</h1>
                <p class="text-xs opacity-80">République Togolaise</p>
            </div>
        </div>

        {{-- Titre central --}}
        <div class="max-w-md">
            <div class="bg-white/20 w-12 h-12 rounded-lg flex items-center justify-center mb-6">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            </div>
            <h2 class="text-4xl font-bold mb-4 leading-tight">
                Pilotez le patrimoine public avec précision.
            </h2>
            <p class="text-white/90 text-lg">
                Centralisez vos biens, suivez les affectations et produisez vos rapports réglementaires dans un espace sécurisé.
            </p>
        </div>

        {{-- Footer --}}
        <div class="flex items-center gap-2 text-sm opacity-80">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
            </svg>
            Accès réservé aux agents habilités
        </div>
    </div>

    {{-- Panneau droit (formulaire) --}}
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 bg-gray-50">
        <div class="w-full max-w-md">

            <div class="bg-white rounded-2xl shadow-xl p-8">

                <p class="text-sm font-semibold text-teal-600 uppercase tracking-wide mb-2">
                    Espace sécurisé
                </p>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">
                    Connexion à votre espace
                </h2>
                <p class="text-sm text-gray-500 mb-8">
                    Saisissez vos identifiants administratifs pour accéder à la gestion du patrimoine.
                </p>

                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-4 text-sm">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="/api/auth/login">
                    @csrf

                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Identifiant professionnel
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <input type="email" name="email" required
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                                   placeholder="prenom.nom@gouv.tg"
                                   value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="mb-5">
                        <div class="flex items-center justify-between mb-2">
                            <label class="block text-sm font-medium text-gray-700">
                                Mot de passe
                            </label>
                            <a href="#" class="text-sm text-teal-600 hover:text-teal-700 font-medium">
                                Mot de passe oublié ?
                            </a>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <input type="password" name="password" required
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                                   placeholder="Votre mot de passe">
                        </div>
                    </div>

                    <div class="flex items-center mb-6">
                        <input type="checkbox" id="remember" name="remember"
                               class="w-4 h-4 text-teal-600 border-gray-300 rounded focus:ring-teal-500">
                        <label for="remember" class="ml-2 text-sm text-gray-600">
                            Se souvenir de moi
                        </label>
                    </div>

                    <button type="submit"
                            class="w-full py-3 px-4 rounded-lg font-semibold text-white transition-all hover:shadow-lg flex items-center justify-center gap-2"
                            style="background: linear-gradient(135deg, #0ea5b7 0%, #14b8a6 100%);">
                        Se connecter
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </button>
                </form>
            </div>

            <p class="text-center text-sm text-gray-500 mt-6">
                Besoin d'assistance ? Contactez la Direction des systèmes d'information.
            </p>
        </div>
    </div>

</div>

</body>
</html>
