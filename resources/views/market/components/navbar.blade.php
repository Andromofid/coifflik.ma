<nav class="sticky top-0 z-50 bg-cream/95 backdrop-blur-xl border-b border-gold/20 shadow-sm"
    x-data="{ open: false }">

    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        {{-- LOGO --}}
        <a href="{{ route('home') }}" class="flex items-center">
            <img src="{{ asset('logo.png') }}"
                alt="CoiffLik.ma"
                class="h-12 w-auto">
        </a>

        {{-- DESKTOP LINKS --}}
        <div class="hidden md:flex items-center gap-10">
            <a href="{{ route('coiffeuses.index') }}"
                class="text-sm font-medium text-burgundy hover:text-gold transition-colors duration-300">
                Trouver un coiffeur
            </a>

            <a href="#how-it-works"
                class="text-sm font-medium text-burgundy hover:text-gold transition-colors duration-300">
                Comment ça marche
            </a>

            <a href="#"
                class="text-sm font-medium text-burgundy hover:text-gold transition-colors duration-300">
                Devenir Pro
            </a>
        </div>

        {{-- CTA + MOBILE --}}
        <div class="flex items-center gap-4">

            {{-- CTA --}}
            <a href="{{ route('coiffeuses.index') }}"
                class="hidden md:inline-flex items-center px-5 py-2.5 rounded-full
                bg-burgundy text-cream text-sm font-semibold
                hover:bg-burgundy-dark transition-all duration-300 shadow-md">
                Réserver maintenant
            </a>

            {{-- MOBILE TOGGLE --}}
            <button @click="open = !open"
                class="md:hidden text-burgundy hover:text-gold transition">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!open"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />

                    <path x-show="open"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

        </div>
    </div>

    {{-- MOBILE MENU --}}
    <div x-show="open"
        x-transition
        x-cloak
        class="md:hidden bg-cream border-t border-gold/20">

        <div class="px-6 py-5 space-y-4">

            <a href="{{ route('coiffeuses.index') }}"
                class="block text-burgundy font-medium hover:text-gold transition">
                Trouver un coiffeur
            </a>

            <a href="#how-it-works"
                class="block text-burgundy font-medium hover:text-gold transition">
                Comment ça marche
            </a>

            <a href="#"
                class="block text-burgundy font-medium hover:text-gold transition">
                Devenir Pro
            </a>

            <a href="{{ route('coiffeuses.index') }}"
                class="block text-center bg-burgundy text-cream py-3 rounded-full font-semibold">
                Réserver maintenant
            </a>

        </div>
    </div>
</nav>