@extends('layout')

@section('content')
    <div class="container mx-auto px-4 py-12">

        <div class="mx-auto max-w-2xl rounded-xl bg-white p-8 shadow-xl ring-1 ring-gray-200">
            <h1 class="mb-8 text-center text-3xl font-bold text-gray-800">Ajouter une Nouvelle Entreprise</h1>

            <!-- Formulaire -->
            <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data" class="space-y-7">
                @csrf <!-- Jeton CSRF -->

                <!-- Nom de l'Entreprise -->
                <div>
                    <label for="name" class="mb-1 block text-sm font-medium text-gray-700">Nom de l'Entreprise</label>
                    <input type="text" name="name" id="name" required
                        class="mt-1 block w-full border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2 transition-colors duration-200 focus:border-indigo-500 focus:outline-none focus:ring-0 sm:text-sm"
                        placeholder="Entrez le nom de l'entreprise" autocomplete="off">
                </div>

                <!-- Nom du Directeur -->
                <div>
                    <label for="director" class="mb-1 block text-sm font-medium text-gray-700">Nom du Directeur</label>
                    <input type="text" name="director" id="director" required
                        class="mt-1 block w-full border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2 transition-colors duration-200 focus:border-indigo-500 focus:outline-none focus:ring-0 sm:text-sm"
                        placeholder="Entrez le nom du directeur" autocomplete="off">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="mb-1 block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required
                        class="mt-1 block w-full border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2 transition-colors duration-200 focus:border-indigo-500 focus:outline-none focus:ring-0 sm:text-sm"
                        placeholder="Entrez l'email de l'entreprise" autocomplete="off">
                </div>

                <!-- Téléphone -->
                <div>
                    <label for="phone" class="mb-1 block text-sm font-medium text-gray-700">Téléphone</label>
                    <input type="text" name="phone" id="phone" required
                        class="mt-1 block w-full border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2 transition-colors duration-200 focus:border-indigo-500 focus:outline-none focus:ring-0 sm:text-sm"
                        placeholder="Entrez le numéro de téléphone de l'entreprise" autocomplete="off">
                </div>

                <!-- Téléchargement du Logo -->
                <div class="pt-2">
                    <label for="logo" class="mb-2 block text-sm font-medium text-gray-700">Logo de l'Entreprise</label>
                    <input type="file" name="logo" id="logo" accept="image/*"
                        class="mt-1 block w-full text-sm text-gray-500 transition duration-150 ease-in-out file:mr-4 file:rounded-md file:border-0 file:bg-indigo-100 file:px-4 file:py-2 file:text-sm file:font-medium file:text-indigo-700 hover:file:bg-indigo-200">
                </div>

                <!-- Bouton Soumettre -->
                <div class="mt-12 text-center">
                    <button type="submit"
                        class="inline-flex items-center justify-center rounded-lg border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white shadow-md transition duration-150 ease-in-out hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Ajouter l'Entreprise
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
