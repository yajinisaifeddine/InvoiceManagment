<aside
    class="relative left-0 top-0 z-40 hidden h-[calc(100vh-128px)] w-64 flex-col bg-gradient-to-b from-gray-100 to-gray-300 transition-transform md:flex">
    <!-- En-tête de la Barre Latérale -->
    <div class="flex h-20 items-center justify-center border-b border-gray-700">
        <h1 class="text-2xl font-bold text-black">Portail Financier</h1>
    </div>

    <!-- Contenu de la Barre Latérale -->
    <div class="flex-1 overflow-y-auto px-3 py-6">
        <div class="mb-6">
            <div class="mb-2 px-4 text-xs font-semibold uppercase tracking-wider text-gray-900">
                Principal
            </div>
            <ul>
                <li class="mb-1">
                    <a href="{{ route('company.create') }}"
                       class="flex items-center rounded-md px-4 py-3 text-gray-900 transition-colors hover:bg-gray-200">
                        <i class="fa fa-plus mr-3 text-emerald-900"></i>
                        Ajouter une société
                    </a>
                </li>


                @if(Route::currentRouteName()== 'company.show')
                    <li class="mb-1">
                        <a href="{{ route('company.edit', $company) }}"
                           class="flex items-center rounded-md px-4 py-3 text-gray-900 transition-colors hover:bg-gray-200">
                            <i class="fa fa-pen mr-3 text-blue-900"></i>
                            Modifier société
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="{{ route('company.destroy', $company) }}"
                           class="flex items-center rounded-md px-4 py-3 text-gray-900 transition-colors hover:bg-gray-200">
                            <i class="fa fa-trash mr-3 text-red-900"></i>
                            Supprimer société
                        </a>
                    </li>
                @else

                <li class="relative mb-1">
                    <div class="flex cursor-pointer items-center rounded-md px-4 py-3 text-gray-900 transition-colors hover:bg-gray-200"
                         onclick="document.getElementById('sort-options').classList.toggle('hidden')">
                        <i class="fa fa-sort mr-3 text-emerald-900"></i>
                        <span>Tri</span>
                        <div class="ml-auto">
                            <i class="fa fa-chevron-down text-gray-500"></i>
                        </div>
                    </div>
                    <div id="sort-options" class="absolute left-0 hidden w-full rounded-md border bg-white shadow-md">
                        <a href="{{ route('company.index', ['sort' => 'name_asc']) }}"
                           class="block px-4 py-2 text-gray-900 hover:bg-gray-100">Nom (A-Z)</a>
                        <a href="{{ route('company.index', ['sort' => 'name_desc']) }}"
                           class="block px-4 py-2 text-gray-900 hover:bg-gray-100">Nom (Z-A)</a>
                        <a href="{{ route('company.index', ['sort' => 'inv_asc']) }}"
                           class="block px-4 py-2 text-gray-900 hover:bg-gray-100">Montant Facture (Croissant)</a>
                        <a href="{{ route('company.index', ['sort' => 'inv_desc']) }}"
                           class="block px-4 py-2 text-gray-900 hover:bg-gray-100">Montant Facture (Décroissant)</a>
                        <a href="{{ route('company.index', ['sort' => 'pay_asc']) }}"
                           class="block px-4 py-2 text-gray-900 hover:bg-gray-100">Montant Paiement (Croissant)</a>
                        <a href="{{ route('company.index', ['sort' => 'pay_desc']) }}"
                           class="block px-4 py-2 text-gray-900 hover:bg-gray-100">Montant Paiement (Décroissant)</a>
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </div>

    <!-- Pied de la Barre Latérale -->
    <div class="bg-gray-300 p-4">
        <div class="flex items-center">
            <div class="mr-3 h-10 w-10 overflow-hidden rounded-full bg-gray-300">
                <img src="{{ asset('storage/logo/rTCSYZ2KL2nE7FXAyvMTJLfB3z1HAqsdWAbTKQHsKci.png') }}" alt="Avatar Utilisateur" class="h-full w-full object-cover">
            </div>
            <div>
                <a href="{{ route('account.index') }}" class="text-xs text-emerald-400 hover:text-emerald-300">
                    <p class="text-sm font-medium text-gray-900">Gestionnaire de Compte</p>
                </a>
            </div>
        </div>
    </div>
</aside>
