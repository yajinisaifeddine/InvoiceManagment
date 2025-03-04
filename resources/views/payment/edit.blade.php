@extends('layout')

@section('content')
    <div class="container mx-auto px-4 py-12">


        <div class="mx-auto max-w-2xl rounded-xl bg-white p-8 shadow-xl ring-1 ring-gray-200">
            <h1 class="mb-8 text-center text-3xl font-bold text-gray-800">Modify Payment</h1>

            <!-- Form -->
            <form action="{{ route('payment.update', $payment->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-7">
                @csrf <!-- CSRF Token -->
                @method('PUT')
                <!-- Invoice Type -->
                <div>
                    <label for="type" class="mb-1 block text-sm font-medium text-gray-700">Payment Type</label>
                    <input type="text" name="type" id="type" required value="{{ $payment->type }}"
                        class="mt-1 block w-full border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2 transition-colors duration-200 focus:border-indigo-500 focus:outline-none focus:ring-0 sm:text-sm"
                        placeholder="Enter payment type" autocomplete="off">
                </div>

                <!-- Date -->
                <div>
                    <label for="date" class="mb-1 block text-sm font-medium text-gray-700">Date</label>
                    <input type="date" name="date" id="date" value="{{ $payment->date }}"
                        class="mt-1 block w-full border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2 transition-colors duration-200 focus:border-indigo-500 focus:outline-none focus:ring-0 sm:text-sm">
                </div>

                <!-- Amount -->
                <div>
                    <label for="amount" class="mb-1 block text-sm font-medium text-gray-700">Amount</label>
                    <input type="number" name="amount" id="amount" step="0.001" required
                        value="{{ $payment->amount }}"
                        class="mt-1 block w-full border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2 transition-colors duration-200 focus:border-indigo-500 focus:outline-none focus:ring-0 sm:text-sm"
                        placeholder="Enter amount" autocomplete="off">
                </div>

                <!-- Copy Upload -->
                <div class="pt-2">
                    <label for="copy" class="mb-2 block text-sm font-medium text-gray-700">Upload Copy (Image)</label>
                    <input type="file" name="copy" id="copy" accept="image/*"
                        class="mt-1 block w-full text-sm text-gray-500 transition duration-150 ease-in-out file:mr-4 file:rounded-md file:border-0 file:bg-indigo-100 file:px-4 file:py-2 file:text-sm file:font-medium file:text-indigo-700 hover:file:bg-indigo-200">
                </div>

                <!-- Submit Button -->
                <div class="mt-12 text-center">
                    <button type="submit"
                        class="inline-flex items-center justify-center rounded-lg border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white shadow-md transition duration-150 ease-in-out hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Modify Payment
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
