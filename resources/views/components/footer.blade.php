@if (auth('CustomAuth')->check())
    <footer class="relative bottom-0 h-16 w-full bg-white shadow print:hidden">
        <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6 lg:px-8">
            <p class="text-center text-gray-600">&copy; {{ date('Y') }} Tous droits réservés. Cyber Parc</p>
            <p class="text-center text-gray-600"> développé par : Yajini Saif Eddine</p>
        </div>
    </footer>
@endif
