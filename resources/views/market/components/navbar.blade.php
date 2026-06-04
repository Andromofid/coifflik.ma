<nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-xl border-b border-rose-primary/10"
    x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        {{-- LOGO --}}
        <a href="{{ route('home') }}" class="flex items-center gap-2">
            <span class="font-display text-2xl font-semibold text-rose-dark">
               <img src="./logo.jpg" alt="" srcset="" class="w-40" >
            </span>
        </a>

        {{-- DESKTOP LINKS --}}
        <div class="hidden md:flex items-center gap-8">
            <a href="{{ route('coiffeuses.index') }}"
                class="text-sm font-medium text-ink/70 hover:text-ink transition">
                Trouver un coiffeur
            </a>
            <a href="#how-it-works"
                class="text-sm font-medium text-ink/70 hover:text-ink transition">
                Comment ça marche
            </a>
            <a href="#"
                class="text-sm font-medium text-ink/70 hover:text-ink transition">
                Devenir Pro
            </a>
        </div>


        {{-- MOBILE TOGGLE --}}
        <button @click="open = !open" class="md:hidden text-ink">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    {{-- MOBILE MENU --}}
    <div x-show="open" x-transition class="md:hidden border-t border-gray-100 px-6 py-4 space-y-3 bg-white">
        <a href="{{ route('coiffeuses.index') }}" class="block text-sm font-medium py-2">Trouver un coiffeur</a>
        <a href="#" class="block text-sm font-medium py-2">Comment ça marche</a>
        <a href="#" class="block text-sm font-medium py-2">Devenir Pro</a>
    </div>
</nav>