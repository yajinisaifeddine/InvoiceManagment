<a class="company mx-auto block max-w-4xl" href="{{ route('company.show', $id) }}">
    <div class="p-3">
        <div class="flex cursor-pointer flex-row items-center justify-between gap-6 rounded-md bg-white p-3">
            <!-- Company Logo and Info -->
            <div class="flex w-full items-center space-x-4 md:w-1/2">
                <div class="flex-shrink-0">
                    <img src="{{ asset('storage/' . $logo) }}" alt="Company Logo"
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

            <!-- Amounts and Percentage Section -->
            <div class="flex w-full items-center justify-end gap-4 md:w-1/2">
                <!-- Paid, Rest, and Total -->
                <div class="flex flex-col items-end space-y-2">
                    <!-- Paid Amount -->
                    <div class="flex items-center space-x-2">
                        <span class="font-semibold text-black">
                            payments: {{ number_format($payments, 2) }} DT
                        </span>
                    </div>
                    <!-- Total Invoices -->
                    <div class="flex items-center space-x-2">
                        <span class="font-semibold text-black">
                            Invoices: {{ number_format($invoices, 2) }} DT
                        </span>
                    </div>
                    <!-- Difference (Dynamic Color) -->
                    @php
                        $difference = $invoices - $payments;
                        $differenceColor =
                            $difference > 0 ? 'text-red-600' : ($difference == 0 ? 'text-gray-600' : 'text-green-600');
                    @endphp
                    <div class="flex items-center space-x-2">
                        <span class="{{ $differenceColor }} font-semibold">
                            Difference: {{ number_format(abs($difference), 2) }} DT
                        </span>
                    </div>
                </div>

                <!-- Percentage -->
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
