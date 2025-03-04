@if (auth('CustomAuth')->check())
    <header class="w-full bg-white shadow-sm">
        <nav class="mx-auto flex h-16 max-w-7xl items-center justify-between px-4 py-3 sm:px-6 lg:px-8 print:hidden">
            <!-- Brand Logo -->
            <a href="/" class="text-xl font-bold text-gray-900 hover:text-gray-700 focus:outline-none">
                Inv
            </a>

            <!-- Centered Search Bar -->
            <div class="flex flex-grow justify-center">
                <!-- Search Bar (Hidden on Small Screens by Default) -->


                <form id="search-form" action="{{ route('company.index') }}" method="GET"
                    class="hidden w-full max-w-md items-center md:flex">

                    <input type="text" name="search" placeholder="Search..." autocomplete="off"
                        class="w-full border-0 border-b-2 border-gray-300 bg-transparent px-4 py-2 focus:border-blue-600 focus:outline-none focus:ring-0" />
                    <button type="submit" class="px-4 py-2 text-gray-500 hover:text-blue-600 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </form>
            </div>

            <!-- Right Section (Search Icon and Logout Button) -->
            <div class="flex items-center space-x-4">
                <!-- Search Icon (Visible on Small Screens) -->
                <button id="search-icon" class="text-gray-500 hover:text-blue-600 focus:outline-none md:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>

                <!-- Logout Button (Visible only when authenticated and search bar is not expanded) -->
                <div id="logout-button" class="flex items-center">

                    @if (auth('CustomAuth')->check())
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit"
                                class="text-sm font-medium text-red-600 hover:text-red-500 focus:outline-none">
                                Logout
                            </button>
                        </form>
                    @endif

                </div>

                <!-- Exit Button (Hidden by Default) -->
                <button id="exit-button" class="hidden text-gray-500 hover:text-blue-600 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </nav>

        <!-- JavaScript to Handle Toggle -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchIcon = document.getElementById('search-icon');
                const searchForm = document.getElementById('search-form');
                const exitButton = document.getElementById('exit-button');

                // Toggle search bar and exit button on small screens
                searchIcon.addEventListener('click', function() {
                    searchIcon.classList.add('hidden'); // Hide search icon
                    searchForm.classList.remove('hidden'); // Show search bar
                    searchForm.classList.add('flex', 'w-full'); // Expand search bar to full width
                    exitButton.classList.remove('hidden'); // Show exit button
                    // Hide logout button
                });

                // Hide search bar and show search icon when exit button is clicked
                exitButton.addEventListener('click', function() {
                    searchForm.classList.add('hidden'); // Hide search bar
                    searchForm.classList.remove('flex', 'w-full'); // Reset search bar width
                    exitButton.classList.add('hidden'); // Hide exit button
                    searchIcon.classList.remove('hidden'); // Show search icon
                    // Show logout button
                });
            });
        </script>
    </header>

@endif
