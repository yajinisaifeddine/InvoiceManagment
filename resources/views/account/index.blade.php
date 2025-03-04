@extends('layout')

@section('content')
    <div class="container mx-auto px-4 py-12">

        <div class="mx-auto max-w-2xl rounded-xl bg-white p-8 shadow-xl ring-1 ring-gray-200">
            <h1 class="mb-8 text-center text-3xl font-bold text-gray-800">Your Account</h1>
            <!-- Account Details -->
            <div class="space-y-6">
                <!-- Profile Picture -->
                <div class="mb-8 flex justify-center">

                    @if (auth('CustomAuth')->user()->logo)
                        <div class="text-center">
                            <img src="{{ asset('storage/' . auth('CustomAuth')->user()->logo) }}" alt="Profile picture"
                                class="mx-auto h-32 w-32 rounded-full object-cover">
                            <p class="mt-2 text-sm text-gray-500">Profile Picture</p>
                        </div>
                    @else
                        <div class="flex h-32 w-32 items-center justify-center rounded-full bg-gray-200">
                            <span
                                class="text-3xl text-gray-400">{{ strtoupper(substr(auth('CustomAuth')->user()->name, 0, 1)) }}</span>
                        </div>
                    @endif
                </div>

                <!-- Full Name -->
                <div class="border-b border-gray-100 pb-4">
                    <h2 class="text-sm font-medium text-gray-500">Full Name</h2>
                    <p class="mt-1 text-lg text-gray-800">{{ auth('CustomAuth')->user()->name }}</p>
                </div>

                <!-- Email -->
                <div class="border-b border-gray-100 pb-4">
                    <h2 class="text-sm font-medium text-gray-500">Email Address</h2>
                    <p class="mt-1 text-lg text-gray-800">{{ auth('CustomAuth')->user()->email }}</p>
                </div>

                <!-- Phone -->
                <div class="border-b border-gray-100 pb-4">
                    <h2 class="text-sm font-medium text-gray-500">Phone Number</h2>
                    <p class="mt-1 text-lg text-gray-800">{{ auth('CustomAuth')->user()->phone ?? 'Not provided' }}</p>
                </div>

                <!-- Account Created -->
                <div class="border-b border-gray-100 pb-4">
                    <h2 class="text-sm font-medium text-gray-500">Member Since</h2>
                    <p class="mt-1 text-lg text-gray-800">{{ auth('CustomAuth')->user()->created_at->format('F d, Y') }}</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-12 flex justify-center space-x-4">
                <a href="{{ route('account.edit', auth('CustomAuth')->user()->id) }}"
                    class="inline-flex items-center justify-center rounded-lg border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white shadow-md transition duration-150 ease-in-out hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Edit Account
                </a>
                <a href="{{ route('company.index') }}"
                    class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-8 py-3 text-base font-medium text-gray-700 shadow-sm transition duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                    Back to Dashboard
                </a>
            </div>


        </div>
    </div>
@endsection
