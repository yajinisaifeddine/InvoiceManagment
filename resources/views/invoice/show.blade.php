@extends('layout')
@section('content')
    <div class="flex min-h-[calc(100vh-128px)] items-center justify-center">
        <div class="mx-auto flex overflow-hidden rounded-lg bg-white shadow-2xl">
            {{-- Left Column - Invoice Details and Actions --}}
            <div class="bg-gradient-to-br p-8 print:hidden">
                {{-- Header Section --}}
                <div class="mb-6">
                    <h1 class="mb-2 text-3xl font-bold">Invoice Details</h1>
                    <div class="h-1 w-20 rounded bg-black"></div>
                </div>

                {{-- Invoice Information Section --}}
                <div>
                    <div class="mb-6">
                        <h3 class="mb-4 text-xl font-semibold text-black">Invoice Information</h3>
                        <div class="space-y-3">
                            <p class="text-gray-700">
                                <span class="font-medium text-black">Invoice Number:</span>
                                {{ $invoice->number }}
                            </p>
                            <p class="text-gray-700">
                                <span class="font-medium text-black">Date:</span>
                                {{ $invoice->date }}
                            </p>
                            <p class="text-gray-700">
                                <span class="font-medium text-black">Amount:</span>
                                ${{ number_format($invoice->amount, 2) }}
                            </p>
                        </div>
                    </div>


                    {{-- Action Buttons --}}
                    <div class="mt-8 flex flex-col items-start">
                        <a href="{{ route('invoice.download', $invoice->id) }}"
                            class="flex-1 transform rounded-lg px-4 py-3 text-center font-semibold hover:text-gray-700">
                            Download Invoice
                        </a>
                        <a href="{{ route('invoice.print', $invoice->id) }}"
                            class="flex-1 transform rounded-lg px-4 py-3 text-center font-semibold hover:text-gray-700">
                            Print Invoice
                        </a>
                    </div>
                </div>
            </div>

            {{-- Right Column - Invoice Copy --}}
            <div class="flex items-center justify-center bg-gray-100 p-8">
                <div class="rounded-xl bg-white p-4 shadow-xl print:bg-gray-100 print:shadow-none">
                    <h3 class="mb-4 text-center text-xl font-semibold text-gray-700 print:hidden">Invoice Copy</h3>
                    <div class="flex items-center justify-center">

                        @if ($invoice->copy)
                            <img src="{{ asset('storage/' . $invoice->copy) }}"
                                class="max-h-[600px] max-w-full rounded-lg object-contain shadow-lg print:absolute print:w-screen print:rounded-none print:shadow-none"
                                alt="Invoice Copy">
                        @else
                            <div class="flex h-[628px] w-96 items-center justify-center">
                                <div class="flex gap-3 text-gray-700">
                                    <i class="far fa-frown translate-y-1"></i>
                                    <h3>nothing to show</h3>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
