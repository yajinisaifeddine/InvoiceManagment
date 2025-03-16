@extends('layout')

@section('title', 'Accueil')

@section('content')

    <div class="flex min-h-screen items-center justify-center">
        <!-- Carte de connexion -->
        <div class="w-full max-w-md rounded-lg bg-white p-8 shadow-2xl" id="login">
            <!-- Logo ou Titre -->
            <div class="mb-6 text-center">
                <h1 class="text-3xl font-bold text-gray-800">Bienvenue</h1>
                <p class="text-gray-600">Connectez-vous à votre compte</p>
            </div>
            <!-- Formulaire de connexion -->
            <form class="space-y-6" action="{{ route('login.post') }}" method="POST">
                <!-- Champ Email -->
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Adresse e-mail</label>
                    <input type="email" id="email" name="email" placeholder="Entrez votre adresse e-mail"
                        class="mt-1 block w-full rounded-md border border-gray-300 px-4 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500"
                        required autocomplete="off" />
                </div>

                <!-- Champ Mot de passe -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe"
                        class="my-1 block w-full rounded-md border border-gray-300 px-4 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500"
                        required autocomplete="off" />
                </div>

                <!-- Se souvenir de moi & Mot de passe oublié -->


                <!-- Bouton de soumission -->
                <div>
                    <button type="submit"
                        class="w-full rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Se connecter
                    </button>
                </div>
            </form>

            <!-- Lien d'inscription -->
            <div class="mt-6 text-center">
                <p class="text-gray-600">
                    Vous n'avez pas de compte ?
                    <a href="{{ route('account.create') }}"
                        class="font-medium text-blue-600 hover:text-blue-800 hover:underline">
                        Créer un compte
                    </a>
                </p>
            </div>

        </div>
    </div>

@endsection
