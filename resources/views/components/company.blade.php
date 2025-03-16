<a class="company mx-auto block max-w-4xl" href="{{ route('company.show', $id) }}">
    @php
        $difference = $invoices - $payments;
        $differenceColor = $difference > 0 ? 'text-red-600' : 'text-green-600';
        $backgroundColor = $difference > 0 ? 'bg-red-50' : ($difference == 0 ? 'bg-white' : 'bg-green-50');
    @endphp
    <div class="p-3">
        <div
            class="{{ $backgroundColor }} flex cursor-pointer flex-row items-center justify-between gap-6 rounded-md p-2">
            <!-- Logo et Informations de l'Entreprise -->
            <div class="flex w-full items-center space-x-4 md:w-1/2">
                <div class="flex-shrink-0">
                    <img src="{{ asset('storage/' . $logo) }}" alt="Logo de l'Entreprise"
                        class="h-16 w-16 rounded-lg object-cover shadow-sm">
                </div>
                <div class="flex flex-col text-center md:text-left">
                    <h5 class="mb-1 text-lg font-semibold text-gray-800">
                        {{ $name }}
                    </h5>
                    <span class="text-sm text-gray-500">
                        {{ $director }}
                    </span>
                </div>
            </div>

            <!-- Section Montants et Pourcentage -->
            <div class="flex w-full items-center justify-end gap-4 md:w-1/2">
                <!-- Payé, Restant et Total -->
                <div class="flex flex-col items-end space-y-2">
                    <!-- Montant Payé -->
                    <div class="flex items-center space-x-2">
                        <span class="font-semibold text-black">
                            Paiements : {{ number_format($payments, 2) }} DT
                        </span>
                    </div>
                    <!-- Factures Totales -->
                    <div class="flex items-center space-x-2">
                        <span class="font-semibold text-black">
                            Factures : {{ number_format($invoices, 2) }} DT
                        </span>
                    </div>
                    <!-- Différence (Couleur Dynamique) -->

                    <div class="flex items-center space-x-2">
                        <span class="{{ $differenceColor }} font-semibold">
                            Différence : {{ number_format(abs($difference), 2) }} DT
                        </span>
                    </div>
                </div>

                <!-- Pourcentage -->
                <div class="flex items-center">
                    <span class="font-sans text-3xl font-bold">
                        @if ($invoices > 0)
                            {{ number_format(($payments / $invoices) * 100, 0) }}%
                        @else
                            100%
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>
</a>
