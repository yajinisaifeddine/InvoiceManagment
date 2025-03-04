@extends('layout')

@section('title', 'Home')

@section('content')


    <div class="flex min-h-screen items-center justify-center">
        <!-- Login Card -->
        <div class="w-full max-w-md rounded-lg bg-white p-8 shadow-2xl" id="login">
            <!-- Logo or Title -->
            <div class="mb-6 text-center">
                <h1 class="text-3xl font-bold text-gray-800">Welcome Back</h1>
                <p class="text-gray-600">Sign in to your account</p>
            </div>
            <!-- Login Form -->
            <form class="space-y-6" action="{{ route('login.post') }}" method="POST">
                <!-- Email Input -->
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email"
                        class="mt-1 block w-full rounded-md border border-gray-300 px-4 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500"
                        required autocomplete="off" />
                </div>

                <!-- Password Input -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password"
                        class="my-1 block w-full rounded-md border border-gray-300 px-4 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500"
                        required autocomplete="off" />
                </div>

                <!-- Remember Me & Forgot Password -->


                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Sign In
                    </button>
                </div>
            </form>

            <!-- Sign Up Link -->
            <div class="mt-6 text-center">
                <p class="text-gray-600">
                    Don't have an account?
                    <a href="{{ route('account.create') }}"
                        class="font-medium text-blue-600 hover:text-blue-800 hover:underline">
                        Create an account
                    </a>
                </p>
            </div>

        </div>
    </div>

@endsection
