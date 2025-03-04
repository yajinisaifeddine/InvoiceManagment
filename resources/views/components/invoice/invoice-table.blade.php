<div class="rounded-lg bg-white p-4 shadow-md">
    <h2 class="mb-4 inline text-xl font-semibold">Invoice List</h2>
    <a href="{{ route('invoice.create', $company) }}"
        class="mb-4 cursor-pointer px-4 py-2 text-black hover:text-slate-600">Add
        invoice</a>
    <table class="w-full border-collapse text-left">
        <thead>
            <tr class="border-b">
                <th class="p-2">number</th>
                <th class="p-2">Date</th>
                <th class="p-2">Amount</th>
                <th class="p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Payment components  -->
            @foreach ($invoices as $invoice)
                <tr class="border-b">
                    <td class="p-2"> {{ $invoice->number }} </td>
                    <td class="p-2"> {{ $invoice->date }} </td>
                    <td class="p-2">{{ $invoice->amount }}</td>
                    <td class="flex space-x-2 p-2">
                        <a href="{{ route('invoice.edit', $invoice->id) }}" class="text-indigo-600"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                        <a href="{{ route('invoice.destroy', [$company, $invoice->id]) }}" class="text-rose-600"><i
                                class="fa-solid fa-trash-alt"></i></a>
                        <a href="{{ route('invoice.show', $invoice->id) }}" class="text-emerald-600"><i
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
