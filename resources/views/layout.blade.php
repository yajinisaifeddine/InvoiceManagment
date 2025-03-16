<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Inv</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>



<body class="flex min-h-screen flex-col bg-gray-100">
    <!-- Navbar -->
    <x-navbar></x-navbar>
    <div class="flex">

        <x-sidebar :company="request()->route('id')??1"></x-sidebar>



        <main class="min-h-[calc(100vh-128px)] flex-1">
            <x-alert></x-alert>
            @yield('content') <!-- This is where the page content will be injected -->
        </main>
    </div>

    <!-- Footer (Sticks to bottom when content is short) -->
    <x-footer></x-footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>



</html>
