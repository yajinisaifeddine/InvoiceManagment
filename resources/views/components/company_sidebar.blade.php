<aside
    class="relative left-0 top-0 z-40 hidden min-h-[calc(100vh-128px)] w-64 flex-col bg-gradient-to-b from-gray-100 to-gray-300 transition-transform md:flex">
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
                <li class="mb-1">
                    <a href="{{ route('company.edit', $id) }}"
                        class="flex items-center rounded-md px-4 py-3 text-gray-900 transition-colors hover:bg-gray-200">
                        <i class="fa fa-pen mr-3 text-blue-900"></i>
                        Modify Company
                    </a>
                </li>
                <li class="mb-1">
                    <a href="{{ route('company.destroy', $id) }}"
                        class="flex items-center rounded-md px-4 py-3 text-gray-900 transition-colors hover:bg-gray-200">
                        <i class="fa fa-trash mr-3 text-red-900"></i>
                        Remove Company
                    </a>
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
