@extends('layout')

@section('content')
    <div class="container mx-auto px-4 py-12">

        <div class="mx-auto max-w-2xl rounded-xl bg-white p-8 shadow-xl ring-1 ring-gray-200">
            <h1 class="mb-8 text-center text-3xl font-bold text-gray-800">Créer une Nouvelle Facture</h1>

            <!-- Formulaire -->
            <form action="{{ route('invoice.store', $company) }}" method="POST" enctype="multipart/form-data"
                class="space-y-7">
                @csrf <!-- Jeton CSRF -->

                <!-- Numéro de Facture -->
                <div>
                    <label for="number" class="mb-1 block text-sm font-medium text-gray-700">Numéro de Facture</label>
                    <input type="text" name="number" id="number" required
                        class="mt-1 block w-full border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2 transition-colors duration-200 focus:border-indigo-500 focus:outline-none focus:ring-0 sm:text-sm"
                        placeholder="Entrez le numéro de facture" autocomplete="off">
                </div>

                <!-- Date -->
                <div>
                    <label for="date" class="mb-1 block text-sm font-medium text-gray-700">Date</label>
                    <input type="date" name="date" id="date"
                        class="mt-1 block w-full border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2 transition-colors duration-200 focus:border-indigo-500 focus:outline-none focus:ring-0 sm:text-sm">
                </div>

                <!-- Montant -->
                <div>
                    <label for="amount" class="mb-1 block text-sm font-medium text-gray-700">Montant</label>
                    <input type="number" name="amount" id="amount" step="0.001" required
                        class="mt-1 block w-full border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2 transition-colors duration-200 focus:border-indigo-500 focus:outline-none focus:ring-0 sm:text-sm"
                        placeholder="Entrez le montant" autocomplete="off">
                </div>

                <!-- Téléchargement de Copie -->
                <div class="pt-2">
                    <label for="copy" class="mb-2 block text-sm font-medium text-gray-700">Ajouter une Copie
                        (Image/PDF)</label>
                    <input type="file" name="copy" id="copy" accept="image/*,.pdf"
                        class="mt-1 block w-full text-sm text-gray-500 transition duration-150 ease-in-out file:mr-4 file:rounded-md file:border-0 file:bg-indigo-100 file:px-4 file:py-2 file:text-sm file:font-medium file:text-indigo-700 hover:file:bg-indigo-200"
                        required>
                </div>

                <!-- Bouton de Soumission -->
                <div class="mt-12 text-center">
                    <button type="submit"
                        class="inline-flex items-center justify-center rounded-lg border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white shadow-md transition duration-150 ease-in-out hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Créer la Facture
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
