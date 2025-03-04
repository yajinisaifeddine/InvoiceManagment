@extends('layout')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <div class="mx-auto max-w-2xl rounded-xl bg-white p-8 shadow-xl ring-1 ring-gray-200">
            <h1 class="mb-8 text-center text-3xl font-bold text-gray-800">Edit Account</h1>
            <!-- Form -->
            <form action="{{ route('account.update', auth('CustomAuth')->user()->id) }}" method="POST"
                enctype="multipart/form-data" class="space-y-7">
                @csrf <!-- CSRF Token -->
                @method('PUT') <!-- Use PUT method for updates -->

                <!-- Full Name -->
                <div>
                    <label for="name" class="mb-1 block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" name="name" id="name" required
                        class="mt-1 block w-full border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2 transition-colors duration-200 focus:border-indigo-500 focus:outline-none focus:ring-0 sm:text-sm"
                        placeholder="Enter your full name" value="{{ old('name', auth('CustomAuth')->user()->name) }}"
                        autocomplete="off">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="mb-1 block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" name="email" id="email" required
                        class="mt-1 block w-full border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2 transition-colors duration-200 focus:border-indigo-500 focus:outline-none focus:ring-0 sm:text-sm"
                        placeholder="Enter your email" value="{{ old('email', auth('CustomAuth')->user()->email) }}"
                        autocomplete="off">
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="mb-1 block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="text" name="phone" id="phone"
                        class="mt-1 block w-full border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2 transition-colors duration-200 focus:border-indigo-500 focus:outline-none focus:ring-0 sm:text-sm"
                        placeholder="Enter your phone number" value="{{ old('phone', auth('CustomAuth')->user()->phone) }}"
                        autocomplete="off">
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="mb-1 block text-sm font-medium text-gray-700">New Password</label>
                    <input type="password" name="password" id="password"
                        class="mt-1 block w-full border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2 transition-colors duration-200 focus:border-indigo-500 focus:outline-none focus:ring-0 sm:text-sm"
                        placeholder="Enter new password (leave blank to keep current)" autocomplete="off">
                </div>

                <!-- Confirm New Password -->
                <div>
                    <label for="password_confirmation" class="mb-1 block text-sm font-medium text-gray-700">Confirm New
                        Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="mt-1 block w-full border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2 transition-colors duration-200 focus:border-indigo-500 focus:outline-none focus:ring-0 sm:text-sm"
                        placeholder="Confirm new password" autocomplete="off">
                </div>

                <!-- Profile Picture Upload -->
                <div class="pt-2">
                    <label for="logo" class="mb-2 block text-sm font-medium text-gray-700">Profile Picture</label>
                    <!-- Display current profile picture -->
                    @if (auth('CustomAuth')->user()->logo)
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . auth('CustomAuth')->user()->logo) }}" alt="Profile Picture"
                                class="h-20 w-20 rounded-full object-cover">
                        </div>
                    @endif
                    <input type="file" name="logo" id="logo" accept="image/*"
                        class="mt-1 block w-full text-sm text-gray-500 transition duration-150 ease-in-out file:mr-4 file:rounded-md file:border-0 file:bg-indigo-100 file:px-4 file:py-2 file:text-sm file:font-medium file:text-indigo-700 hover:file:bg-indigo-200">
                    <p class="mt-1 text-xs text-gray-500">Upload a new profile picture (optional)</p>
                </div>

                <!-- Submit Button -->
                <div class="mt-12 text-center">
                    <button type="submit"
                        class="inline-flex items-center justify-center rounded-lg border border-transparent bg-indigo-600 px-8 py-3 text-base font-medium text-white shadow-md transition duration-150 ease-in-out hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Update Account
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
