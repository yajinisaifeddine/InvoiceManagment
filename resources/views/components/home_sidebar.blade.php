<!-- Sidebar Component: resources/views/components/sidebar.blade.php -->
<aside
    class="relative left-0 top-0 z-40 hidden h-[calc(100vh-128px)] w-64 flex-col bg-gradient-to-b from-gray-100 to-gray-300 transition-transform md:flex">
    <!-- Sidebar Header -->
    <div class="flex h-20 items-center justify-center border-b border-gray-700">
        <h1 class="text-2xl font-bold text-black">Finance Portal</h1>
    </div>

    <!-- Sidebar Content -->
    <div class="flex-1 overflow-y-auto px-3 py-6">



        <div class="mb-6">
            <div class="mb-2 px-4 text-xs font-semibold uppercase tracking-wider text-gray-900">
                Main
            </div>
            <ul>
                <li class="mb-1">
                    <a href="{{ route('company.create') }}"
                        class="flex items-center rounded-md px-4 py-3 text-gray-900 transition-colors hover:bg-gray-200">
                        <i class="fa fa-plus mr-3 text-emerald-900"></i>
                        Add a Company
                    </a>
                </li>

                <li class="relative mb-1">
                    <div class="flex cursor-pointer items-center rounded-md px-4 py-3 text-gray-900 transition-colors hover:bg-gray-200"
                        onclick="document.getElementById('sort-options').classList.toggle('hidden')">
                        <i class="fa fa-sort mr-3 text-emerald-900"></i>
                        <span>Sort</span>
                        <div class="ml-auto">
                            <i class="fa fa-chevron-down text-gray-500"></i>
                        </div>
                    </div>
                    <div id="sort-options" class="absolute left-0 hidden w-full rounded-md border bg-white shadow-md">
                        <a href="{{ route('company.index', ['sort' => 'name_asc']) }}"
                            class="block px-4 py-2 text-gray-900 hover:bg-gray-100">Name (A-Z)</a>
                        <a href="{{ route('company.index', ['sort' => 'name_desc']) }}"
                            class="block px-4 py-2 text-gray-900 hover:bg-gray-100">Name (Z-A)</a>
                        <a href="{{ route('company.index', ['sort' => 'inv_asc']) }}"
                            class="block px-4 py-2 text-gray-900 hover:bg-gray-100">Invoice Amount (Low to High)</a>
                        <a href="{{ route('company.index', ['sort' => 'inv_desc']) }}"
                            class="block px-4 py-2 text-gray-900 hover:bg-gray-100">Invoice Amount (High to Low)</a>
                        <a href="{{ route('company.index', ['sort' => 'pay_asc']) }}"
                            class="block px-4 py-2 text-gray-900 hover:bg-gray-100">Payment Amount (Low to High)</a>
                        <a href="{{ route('company.index', ['sort' => 'pay_desc']) }}"
                            class="block px-4 py-2 text-gray-900 hover:bg-gray-100">Payment Amount (High to Low)</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- Sidebar Footer -->
    <div class="bg-gray-300 p-4">
        <div class="flex items-center">
            <div class="mr-3 h-10 w-10 overflow-hidden rounded-full bg-gray-300">
                <img src="{{ asset('favicon.ico') }}" alt="User avatar" class="h-full w-full object-cover">
            </div>
            <div>
                <a href="{{ route('account.index') }}" class="text-xs text-emerald-400 hover:text-emerald-300">
                    <p class="text-sm font-medium text-gray-900">Account Manager</p>

                </a>
            </div>
        </div>
    </div>
</aside>
