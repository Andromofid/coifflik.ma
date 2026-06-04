@extends('market.layouts.app')

@section('title', 'Coiffeurs à domicile — CoiffLik.ma')
@section('meta_description', 'Trouvez et réservez un coiffeur professionnel à domicile au Maroc.')

@section('content')
<div class="min-h-screen flex">

    {{-- SIDEBAR FILTERS --}}
    <aside class="hidden lg:block w-72 shrink-0 bg-white border-r border-gray-100 sticky top-[65px] h-[calc(100vh-65px)] overflow-y-auto p-6"
        x-data="filters()">

        <div class="flex items-center justify-between mb-8">
            <h3 class="font-semibold text-lg">Filtres</h3>
            <a href="{{ route('coiffeuses.index') }}" class="text-xs text-rose-primary font-medium">Effacer</a>
        </div>

        <form method="GET" action="{{ route('coiffeuses.index') }}" id="filter-form">

            {{-- CITY --}}
            <div class="mb-8">
                <h4 class="text-[11px] font-semibold uppercase tracking-widest text-gray-400 mb-4">Ville</h4>
                <div class="flex flex-wrap gap-2">
                    @foreach($cities as $city)
                    <label class="cursor-pointer">
                        <input type="radio" name="city" value="{{ $city }}" class="hidden peer"
                            {{ request('city') === $city ? 'checked' : '' }}
                            onchange="document.getElementById('filter-form').submit()">
                        <span class="inline-block px-4 py-2 rounded-full text-sm font-medium border border-gray-200
                                         peer-checked:border-rose-primary peer-checked:bg-rose-light peer-checked:text-rose-primary
                                         hover:border-rose-soft transition cursor-pointer">
                            {{ $city }}
                        </span>
                    </label>
                    @endforeach
                </div>
            </div>

            {{-- SERVICE --}}
            <div class="mb-8">
                <h4 class="text-[11px] font-semibold uppercase tracking-widest text-gray-400 mb-4">Service</h4>
                <div class="space-y-3">
                    @foreach($categories as $cat)
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="service[]" value="{{ $cat }}"
                            class="accent-rose-primary w-4 h-4"
                            {{ in_array($cat, (array) request('service')) ? 'checked' : '' }}
                            onchange="document.getElementById('filter-form').submit()">
                        <span class="text-sm capitalize">{{ $cat }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            {{-- RATING --}}
            <div class="mb-8">
                <h4 class="text-[11px] font-semibold uppercase tracking-widest text-gray-400 mb-4">Note minimale</h4>
                <div class="space-y-2">
                    @foreach([5, 4, 3] as $rating)
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="radio" name="rating_min" value="{{ $rating }}"
                            class="accent-rose-primary"
                            {{ request('rating_min') == $rating ? 'checked' : '' }}
                            onchange="document.getElementById('filter-form').submit()">
                        <span class="text-sm text-gold">{{ str_repeat('★', $rating) }}<span class="text-gray-300">{{ str_repeat('★', 5 - $rating) }}</span></span>
                    </label>
                    @endforeach
                </div>
            </div>

            {{-- VERIFIED --}}
            <div class="mb-8">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="verified" value="1"
                        class="accent-rose-primary w-4 h-4"
                        {{ request('verified') ? 'checked' : '' }}
                        onchange="document.getElementById('filter-form').submit()">
                    <span class="text-sm font-medium">Vérifiés uniquement</span>
                </label>
            </div>

        </form>
    </aside>

    {{-- MAIN CONTENT --}}
    <main class="flex-1 p-6 lg:p-10">

        {{-- HEADER --}}
        <div class="flex items-center justify-between mb-6">
            <p class="text-sm text-gray-500">
                <strong class="text-ink text-base">{{ $coiffeures->total() }} coiffeurs</strong>
                {{ request('city') ? 'à ' . request('city') : 'disponibles' }}
            </p>
            <select name="sort" onchange="this.form.submit()"
                form="filter-form"
                class="border border-gray-200 rounded-xl px-4 py-2.5 text-sm font-medium outline-none bg-white">
                <option value="recommended" {{ request('sort') === 'recommended' ? 'selected' : '' }}>Recommandés</option>
                <option value="rating" {{ request('sort') === 'rating' ? 'selected' : '' }}>Meilleure note</option>
                <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>Prix croissant</option>
            </select>
        </div>

        {{-- ACTIVE FILTERS --}}
        @if(request()->hasAny(['city', 'service', 'rating_min', 'verified']))
        <div class="flex flex-wrap gap-2 mb-6">
            @if(request('city'))
            <a href="{{ request()->fullUrlWithoutQuery('city') }}"
                class="flex items-center gap-1.5 bg-rose-light text-rose-primary px-3 py-1.5 rounded-full text-xs font-medium hover:bg-rose-primary hover:text-white transition">
                {{ request('city') }} ✕
            </a>
            @endif
            @if(request('rating_min'))
            <a href="{{ request()->fullUrlWithoutQuery('rating_min') }}"
                class="flex items-center gap-1.5 bg-rose-light text-rose-primary px-3 py-1.5 rounded-full text-xs font-medium hover:bg-rose-primary hover:text-white transition">
                ★ {{ request('rating_min') }}+ ✕
            </a>
            @endif
        </div>
        @endif

        {{-- GRID --}}
        @if($coiffeures->isEmpty())
        <div class="text-center py-32">
            <div class="text-6xl mb-4">😔</div>
            <h3 class="font-semibold text-xl mb-2">Aucun résultat</h3>
            <p class="text-gray-400 text-sm">Essayez de modifier vos filtres</p>
            <a href="{{ route('coiffeuses.index') }}" class="mt-6 inline-block bg-rose-primary text-white px-6 py-3 rounded-full text-sm font-semibold">
                Voir tous les coiffeurs
            </a>
        </div>
        @else
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5">
            @foreach($coiffeures as $coiffeuse)
            @include('market.components.coiffeur-card', ['coiffeuse' => $coiffeuse])
            @endforeach
        </div>

        {{-- PAGINATION --}}
        <div class="mt-12">
            {{ $coiffeures->links() }}
        </div>
        @endif
    </main>
</div>
@endsection