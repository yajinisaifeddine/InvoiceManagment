<div class="rounded-lg bg-white p-4 shadow-md">
    <h2 class="mb-4 inline text-xl font-semibold">Liste des Paiements</h2>
    <a href="{{ route('payment.create', $company) }}"
        class="mb-4 cursor-pointer px-4 py-2 text-black hover:text-slate-600">Ajouter
        un Paiement</a>
    <table class="w-full border-collapse text-left">
        <thead>
            <tr class="border-b">
                <th class="p-2">Type</th>
                <th class="p-2">Date</th>
                <th class="p-2">Montant</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Composants de paiement -->
            @foreach ($payments as $payment)
                <tr class="border-b">
                    <td class="p-2"> {{ $payment->type }} </td>
                    <td class="p-2"> {{ $payment->date }} </td>
                    <td class="p-2">{{ $payment->amount }}</td>
                    <td class="flex space-x-2 p-2">
                        <a href="{{ route('payment.edit', $payment->id) }}" class="text-indigo-600"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <a href="{{ route('payment.destroy', [$company, $payment->id]) }}" class="text-rose-600"><i
                                class="fa-solid fa-trash-alt"></i></a>
                        <a href="{{ route('payment.show', $payment->id) }}" class="text-emerald-600"><i
                                class="fa-solid fa-magnifying-glass"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot class="bg-gray-100">
            <tr class="border-t">
                <td class="p-2 font-bold text-gray-700">Total</td>
                <td class="p-2"></td>
                <td class="p-2 font-bold text-gray-700"> {{ number_format($total, 2) }}
                </td>
                <td class="p-2"></td>
            </tr>
        </tfoot>
    </table>
</div>
