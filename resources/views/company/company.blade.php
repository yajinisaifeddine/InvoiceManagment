@extends('layout')

@section('content')
    <div class="flex w-full">

        <!-- Sidebar -->
        <x-company_sidebar :id="$company->id"></x-company_sidebar>
        <!-- Main Content -->
        <div class="w-full flex-1 p-6">
            <!-- Profile Section -->
            <div
                class="flex flex-col items-center justify-between gap-6 rounded-lg bg-white p-6 shadow-md md:flex-row md:items-start">
                <div class="flex gap-3">
                    <!-- Logo -->
                    <div>

                        <img src="{{ asset('storage/' . ($company->logo ?? 'default.png')) }}" alt="Company Logo"
                            class="h-40 w-40 object-cover shadow-md" />

                    </div>
                    <!-- Company Info -->
                    <div class="text-center md:text-left">
                        <h1 class="text-3xl font-bold"> {{ $company->name }} </h1>
                        <h2 class="text-xl font-semibold text-gray-600">{{ $company->director }}</h2>
                        <p class="text-gray-500"> <i class="fa-solid fa-envelope"></i> {{ $company->email }} </p>
                        <p class="font-semibold text-gray-700"> <i class="fa-solid fa-phone"></i> {{ $company->phone }} </p>
                    </div>
                </div>
                <!-- Amount Section -->
                <div class="w-full max-w-sm rounded-lg bg-white p-6 shadow-md">
                    <h2 class="mb-4 text-lg font-semibold text-gray-700">Financial Summary</h2>
                    <div class="mb-2 flex items-center justify-between border-b pb-2">
                        <span class="font-medium text-gray-600">Total Invoices</span>
                        <span class="text-lg font-bold text-blue-600">{{ number_format($totalInvoiceAmount, 2) }}</span>
                    </div>
                    <div class="mb-2 flex items-center justify-between border-b pb-2">
                        <span class="font-medium text-gray-600">Total Payments</span>
                        <span class="text-lg font-bold text-green-600">{{ number_format($totalPaymentAmount, 2) }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="font-medium text-gray-600">Difference</span>
                        <span class="{{ $differenceColor }} text-lg font-bold">{{ number_format($difference, 2) }}</span>
                    </div>
                </div>
            </div>
            <!-- Lists -->
            <div class="mt-8 flex w-full flex-wrap gap-6">
                <!-- Invoice List -->
                <div class="min-w-[48%] flex-1">
                    <x-invoice.invoice-table :invoices="$invoices" :company="$company->id"
                        :total="$totalInvoiceAmount"></x-invoice.invoice-table>
                </div>

                <!-- Payment List -->
                <div class="min-w-[48%] flex-1">
                    <x-payment.payment-table :payments="$payments" :company="$company->id"
                        :total="$totalPaymentAmount"></x-payment.payment-table>
                </div>
            </div>
        </div>
    </div>
@endsection
