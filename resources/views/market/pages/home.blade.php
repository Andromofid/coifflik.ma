@extends('market.layouts.app')

@section('title', 'CoiffLik.ma — Ton coiffeur, chez toi')
@section('meta_description', 'Réservez un coiffeur professionnel à domicile au Maroc en 2 minutes. Coiffeuses vérifiées à Casablanca, Rabat, Marrakech.')

@section('content')

{{-- HERO --}}
<section class="relative min-h-screen overflow-hidden bg-cream flex items-center justify-center px-6 py-6">

    {{-- BG blobs --}}
    <div class="absolute -top-32 -right-32 w-[420px] h-[420px] rounded-full bg-gold/20 blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-32 -left-32 w-[380px] h-[380px] rounded-full bg-burgundy/10 blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/2 left-1/2 w-[520px] h-[520px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-white/50 blur-3xl pointer-events-none"></div>

    <div class="relative z-10 max-w-5xl mx-auto text-center">

        {{-- Badge --}}
        <div class="inline-flex items-center gap-2 bg-white/70 backdrop-blur border border-gold/30 text-burgundy px-5 py-2.5 rounded-full text-xs font-semibold uppercase tracking-wider mb-8 shadow-sm">
            ✦ Disponible à Marrakech & Casa
        </div>

        {{-- Title --}}
        <h1 class="font-display text-3xl sm:text-6xl lg:text-7xl font-semibold leading-[0.95] text-burgundy mb-6">
            Ton coiffeur,
            <span class="block text-gold">chez toi.</span>
        </h1>

        {{-- Text --}}
        <p class="text-base sm:text-lg lg:text-xl text-ink/60 font-light max-w-2xl mx-auto mb-10 leading-relaxed">
            Des coiffeurs professionnels vérifiés.
            Réservez en 2 minutes, payez en cash.
        </p>

        {{-- SEARCH BOX --}}
        <form action="{{ route('coiffeuses.index') }}" method="GET" class="max-w-3xl mx-auto">
            <div class="bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl shadow-burgundy/10 p-3 flex flex-col md:flex-row gap-3 border border-gold/20">

                <div class="flex-1 flex flex-col text-left px-4 py-2 rounded-2xl bg-cream/60">
                    <label class="text-[10px] font-semibold text-gold uppercase tracking-widest mb-1">
                        Service
                    </label>

                    <select name="service" class="border-none outline-none text-sm font-medium bg-transparent text-ink focus:ring-0 p-0">
                        <option value="">Tous services</option>
                        <option value="coupe">Coupe</option>
                        <option value="coloration">Coloration</option>
                        <option value="lissage">Lissage</option>
                        <option value="coiffage">Coiffage mariage</option>
                        <option value="soin">Soin</option>
                    </select>
                </div>

                <div class="flex-1 flex flex-col text-left px-4 py-2 rounded-2xl bg-cream/60">
                    <label class="text-[10px] font-semibold text-gold uppercase tracking-widest mb-1">
                        Ville
                    </label>

                    <select name="city" class="border-none outline-none text-sm font-medium bg-transparent text-ink focus:ring-0 p-0">
                        <option value="">Toutes villes</option>
                        @foreach($cities as $city)
                        <option value="{{ $city }}">{{ $city }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit"
                    class="bg-burgundy text-cream rounded-2xl px-7 py-2 text-sm font-semibold flex items-center justify-center gap-2 hover:bg-burgundy-dark transition shadow-lg shadow-burgundy/20">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.35-4.35" />
                    </svg>
                    Chercher
                </button>
            </div>
        </form>

        {{-- STATS --}}
        <div class="mt-12 grid grid-cols-3 gap-4 max-w-2xl mx-auto">
            <div class="rounded-2xl bg-white/60 border border-gold/20 px-4 py-5 shadow-sm">
                <div class="font-display text-3xl sm:text-4xl font-semibold text-burgundy">
                    {{ $stats['coiffeures'] }}+
                </div>
                <div class="text-[11px] sm:text-xs text-ink/45 mt-1">
                    Coiffeurs vérifiés
                </div>
            </div>

            <div class="rounded-2xl bg-white/60 border border-gold/20 px-4 py-5 shadow-sm">
                <div class="font-display text-3xl sm:text-4xl font-semibold text-burgundy">
                    {{ $stats['bookings'] }}+
                </div>
                <div class="text-[11px] sm:text-xs text-ink/45 mt-1">
                    Réservations
                </div>
            </div>

            <div class="rounded-2xl bg-white/60 border border-gold/20 px-4 py-5 shadow-sm">
                <div class="font-display text-3xl sm:text-4xl font-semibold text-burgundy">
                    {{ $stats['cities'] }}
                </div>
                <div class="text-[11px] sm:text-xs text-ink/45 mt-1">
                    Villes
                </div>
            </div>
        </div>

    </div>
</section>

{{-- HOW IT WORKS --}}
<section id="how-it-works" class="py-20 px-8 lg:px-20 bg-white">
    <div class="max-w-6xl mx-auto">
        <div class="flex items-center gap-4 mb-4">
            <span class="text-xs font-semibold tracking-widest uppercase text-gold">Comment ça marche</span>
            <div class="flex-1 h-px bg-gold/30"></div>
        </div>

        <h2 class="font-display text-4xl lg:text-5xl font-semibold mb-16 max-w-sm text-burgundy">
            Simple comme <em class="text-gold not-italic">bonjour</em>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach([
            ['icon' => '🔍', 'num' => '01', 'title' => 'Recherchez', 'text' => 'Entrez votre ville et le service souhaité. Filtrez par note, prix et disponibilité.'],
            ['icon' => '📅', 'num' => '02', 'title' => 'Réservez', 'text' => 'Choisissez votre coiffeur, sélectionnez un créneau et confirmez en 2 clics.'],
            ['icon' => '✨', 'num' => '03', 'title' => 'Profitez', 'text' => 'Le coiffeur vient chez vous. Payez en cash sur place. Laissez un avis.'],
            ] as $step)
            <div class="bg-cream rounded-3xl p-10 relative overflow-hidden border border-gold/20 hover:-translate-y-2 transition-transform duration-300 shadow-sm hover:shadow-xl hover:shadow-burgundy/10">
                <div class="absolute top-4 right-6 font-display text-8xl font-semibold text-gold/20 leading-none">{{ $step['num'] }}</div>

                <div class="w-14 h-14 rounded-2xl bg-gold/15 text-burgundy flex items-center justify-center text-2xl mb-6 relative z-10 border border-gold/20">
                    {{ $step['icon'] }}
                </div>

                <h3 class="text-xl font-semibold mb-3 relative z-10 text-burgundy">{{ $step['title'] }}</h3>
                <p class="text-sm text-ink/60 leading-relaxed relative z-10">{{ $step['text'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FEATURED COIFFEURES --}}
<section class="py-20 px-8 lg:px-20 bg-cream">
    <div class="max-w-6xl mx-auto">
        <div class="flex items-end justify-between mb-12">
            <div>
                <div class="flex items-center gap-4 mb-4">
                    <span class="text-xs font-semibold tracking-widest uppercase text-gold">Nos talents</span>
                    <div class="flex-1 h-px bg-gold/30"></div>
                </div>

                <h2 class="font-display text-4xl lg:text-5xl font-semibold text-burgundy">
                    Coiffeurs <em class="text-gold not-italic">populaires</em>
                </h2>
            </div>

            <a href="{{ route('coiffeuses.index') }}"
                class="text-sm font-semibold text-burgundy border-b border-gold/50 hover:text-gold hover:border-gold transition hidden md:block">
                Voir tous →
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($featured as $coiffeuse)
            @include('market.components.coiffeur-card', ['coiffeuse' => $coiffeuse])
            @endforeach
        </div>
    </div>
</section>

@endsection