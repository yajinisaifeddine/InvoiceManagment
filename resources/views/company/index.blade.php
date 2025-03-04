@extends('layout')

@section('title', 'Home')

@section('content')
    <div class="flex min-h-[calc(100vh-128px)] justify-center">
        <x-home_sidebar></x-home_sidebar>
        <div class="mt-5 w-full">

            @foreach ($companies as $index => $companyData)
                <x-company :id="$companyData['company']->id" :logo="$companyData['company']->logo" :name="$companyData['company']->name" :director="$companyData['company']->director" :payments="$companyData['payment_amount'] ?? 0"
                    :invoices="$companyData['invoice_amount'] ?? 0">
                </x-company>
            @endforeach
        </div>
    </div>

@endsection
