@extends('layout')
@section('content')
    <div class="flex min-h-[calc(100vh-128px)] items-center justify-center">
        <div class="mx-auto flex overflow-hidden rounded-lg bg-white shadow-2xl">
            {{-- Colonne gauche - Détails du paiement et actions --}}
            <div class="bg-gradient-to-br p-8 print:hidden">
                {{-- Section d'en-tête --}}
                <div class="mb-6">
                    <h1 class="mb-2 text-3xl font-bold">Détails du paiement</h1>
                    <div class="h-1 w-20 rounded bg-black"></div>
                </div>

                {{-- Section d'informations sur la facture --}}
                <div>
                    <div class="mb-6">
                        <h3 class="mb-4 text-xl font-semibold text-black">Informations de paiement</h3>
                        <div class="space-y-3">
                            <p class="text-gray-700">
                                <span class="font-medium text-black">Type de paiement :</span>
                                {{ $payment->type }}
                            </p>
                            <p class="text-gray-700">
                                <span class="font-medium text-black">Date :</span>
                                {{ $payment->date }}
                            </p>
                            <p class="text-gray-700">
                                <span class="font-medium text-black">Montant :</span>
                                DT {{ number_format($payment->amount, 2) }}
                            </p>
                        </div>
                    </div>

                    {{-- Boutons d'action --}}
                    <div class="mt-8 flex flex-col items-start">
                        <a href="{{ route('payment.download', $payment->id) }}"
                           class="flex-1 transform rounded-lg px-4 py-3 text-center font-semibold hover:text-gray-700">
                            Télécharger une copie
                        </a>
                    </div>
                </div>
            </div>

            {{-- Colonne droite - Copie de la facture --}}
            <div class="flex items-center justify-center bg-gray-100 p-8">
                <div class="rounded-xl bg-white p-4 shadow-xl print:bg-gray-100 print:shadow-none">
                    <div class="flex items-center justify-center">

                        @if ($payment->copy)
                            @if (Str::endsWith($payment->copy, '.pdf'))
                                <iframe src="{{ asset('storage/' . $payment->copy) }}"
                                        class="aspect-auto min-h-[600px] max-w-full rounded-lg object-contain shadow-lg print:absolute print:w-screen print:rounded-none print:shadow-none"
                                        title="Copie de la facture"></iframe>
                            @else
                                <img src="{{ asset('storage/' . $payment->copy) }}"
                                     class="max-h-[600px] max-w-full rounded-lg object-contain shadow-lg print:absolute print:w-screen print:rounded-none print:shadow-none"
                                     alt="Copie de la facture">
                            @endif
                        @else
                            <div class="flex h-[628px] w-96 items-center justify-center">
                                <div class="flex gap-3 text-gray-700">
                                    <i class="far fa-frown translate-y-1"></i>
                                    <h3>Rien à afficher</h3>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
