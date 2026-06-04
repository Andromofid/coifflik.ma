@extends('market.layouts.app')

@section('title', 'CoiffLik.ma — Ton coiffeur, chez toi')
@section('meta_description', 'Réservez un coiffeur professionnel à domicile au Maroc en 2 minutes. Coiffeuses vérifiées à Casablanca, Rabat, Marrakech.')

@section('content')

{{-- HERO --}}
<section class="min-h-screen grid grid-cols-1 lg:grid-cols-2 relative overflow-hidden">

    {{-- BG blobs --}}
    <div class="absolute top-0 right-0 w-96 h-96 rounded-full bg-rose-light/40 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-72 h-72 rounded-full bg-gold/10 blur-3xl pointer-events-none"></div>

    {{-- LEFT --}}
    <div class="flex flex-col justify-center px-8 lg:px-20 py-32 lg:py-0 relative z-10">

        <div class="inline-flex items-center gap-2 bg-rose-light text-rose-primary px-4 py-2 rounded-full text-xs font-semibold uppercase tracking-wider w-fit mb-8">
            ✦ Disponible à Casa, Rabat & Marrakech
        </div>

        <h1 class="font-display text-5xl lg:text-7xl font-semibold leading-tight mb-6">
            Ton coiffeur,<br>
            <em class="text-rose-primary not-italic">chez toi.</em>
        </h1>

        <p class="text-lg text-gray-500 font-light max-w-md mb-10 leading-relaxed">
            Des coiffeurs professionnels vérifiés se déplacent chez vous. Réservez en 2 minutes, payez en cash.
        </p>

        {{-- SEARCH BOX --}}
        <form action="{{ route('coiffeuses.index') }}" method="GET">
            <div class="bg-white rounded-2xl shadow-xl shadow-rose-primary/10 p-2 flex flex-wrap gap-2 max-w-xl">
                <div class="flex-1 min-w-[120px] flex flex-col px-4 py-2">
                    <label class="text-[10px] font-semibold text-rose-primary uppercase tracking-widest mb-1">Service</label>
                    <select name="service" class="border-none outline-none text-sm font-medium bg-transparent text-ink">
                        <option value="">Tous services</option>
                        <option value="coupe">Coupe</option>
                        <option value="coloration">Coloration</option>
                        <option value="lissage">Lissage</option>
                        <option value="coiffage">Coiffage mariage</option>
                        <option value="soin">Soin</option>
                    </select>
                </div>
                <div class="w-px bg-gray-100 my-2"></div>
                <div class="flex-1 min-w-[120px] flex flex-col px-4 py-2">
                    <label class="text-[10px] font-semibold text-rose-primary uppercase tracking-widest mb-1">Ville</label>
                    <select name="city" class="border-none outline-none text-sm font-medium bg-transparent text-ink">
                        <option value="">Toutes villes</option>
                        @foreach($cities as $city)
                        <option value="{{ $city }}">{{ $city }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit"
                    class="bg-rose-primary text-white rounded-xl px-6 py-3 text-sm font-semibold flex items-center gap-2 hover:bg-rose-dark transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.35-4.35" />
                    </svg>
                    Chercher
                </button>
            </div>
        </form>

        {{-- STATS --}}
        <div class="flex gap-8 mt-10">
            <div>
                <div class="font-display text-3xl font-semibold text-rose-primary">{{ $stats['coiffeures'] }}+</div>
                <div class="text-xs text-gray-400 mt-1">Coiffeurs vérifiés</div>
            </div>
            <div>
                <div class="font-display text-3xl font-semibold text-rose-primary">{{ $stats['bookings'] }}+</div>
                <div class="text-xs text-gray-400 mt-1">Réservations</div>
            </div>
            <div>
                <div class="font-display text-3xl font-semibold text-rose-primary">{{ $stats['cities'] }}</div>
                <div class="text-xs text-gray-400 mt-1">Villes</div>
            </div>
        </div>
    </div>

    {{-- RIGHT --}}
    <div class="hidden lg:flex items-center justify-center relative p-20">
        <div class="w-80 h-[500px] rounded-[120px] bg-gradient-to-br from-rose-light to-white flex items-center justify-center text-[120px] opacity-80">
            💇
        </div>
    </div>
</section>

{{-- HOW IT WORKS --}}
<section id="how-it-works" class="py-32 px-8 lg:px-20">
    <div class="max-w-6xl mx-auto">
        <div class="flex items-center gap-4 mb-4">
            <span class="text-xs font-semibold tracking-widest uppercase text-rose-primary">Comment ça marche</span>
            <div class="flex-1 h-px bg-rose-light"></div>
        </div>
        <h2 class="font-display text-4xl lg:text-5xl font-semibold mb-16 max-w-sm">
            Simple comme <em class="text-rose-primary">bonjour</em>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach([
            ['icon' => '🔍', 'num' => '01', 'title' => 'Recherchez', 'text' => 'Entrez votre ville et le service souhaité. Filtrez par note, prix et disponibilité.'],
            ['icon' => '📅', 'num' => '02', 'title' => 'Réservez', 'text' => 'Choisissez votre coiffeur, sélectionnez un créneau et confirmez en 2 clics.'],
            ['icon' => '✨', 'num' => '03', 'title' => 'Profitez', 'text' => 'Le coiffeur vient chez vous. Payez en cash sur place. Laissez un avis.'],
            ] as $step)
            <div class="bg-white rounded-3xl p-10 relative overflow-hidden border border-rose-primary/8 hover:-translate-y-2 transition-transform duration-300">
                <div class="absolute top-4 right-6 font-display text-8xl font-semibold text-rose-light/60 leading-none">{{ $step['num'] }}</div>
                <div class="w-14 h-14 rounded-2xl bg-rose-light flex items-center justify-center text-2xl mb-6 relative z-10">
                    {{ $step['icon'] }}
                </div>
                <h3 class="text-xl font-semibold mb-3 relative z-10">{{ $step['title'] }}</h3>
                <p class="text-sm text-gray-500 leading-relaxed relative z-10">{{ $step['text'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FEATURED COIFFEURES --}}
<section class="py-32 px-8 lg:px-20 bg-white">
    <div class="max-w-6xl mx-auto">
        <div class="flex items-end justify-between mb-12">
            <div>
                <div class="flex items-center gap-4 mb-4">
                    <span class="text-xs font-semibold tracking-widest uppercase text-rose-primary">Nos talents</span>
                    <div class="flex-1 h-px bg-rose-light"></div>
                </div>
                <h2 class="font-display text-4xl lg:text-5xl font-semibold">
                    Coiffeurs <em class="text-rose-primary">populaires</em>
                </h2>
            </div>
            <a href="{{ route('coiffeuses.index') }}"
                class="text-sm font-semibold text-rose-primary border-b border-rose-primary/30 hover:border-rose-primary transition hidden md:block">
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