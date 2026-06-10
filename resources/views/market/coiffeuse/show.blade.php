@extends('market.layouts.app')

@section('title', $coiffeuse->user->name . ' — Coiffeur à domicile ' . $coiffeuse->city . ' | CoiffLik.ma')
@section('meta_description', 'Réservez ' . $coiffeuse->user->name . ' à domicile à ' . $coiffeuse->city . '. ' . $coiffeuse->total_reviews . ' avis. Depuis ' . $coiffeuse->services->min('price') . ' DH.')

@section('content')



{{-- BODY --}}
<div class="max-w-6xl mx-auto px-6 py-16 grid grid-cols-1 lg:grid-cols-3 gap-12">

    {{-- LEFT --}}
    <div class="lg:col-span-2 space-y-14">
        <div class="max-w-6xl mx-auto px-6 py-8 flex flex-col lg:flex-row gap-10 items-start">

            {{-- AVATAR --}}
            <div class="relative shrink-0">
                <div class="w-32 h-32 rounded-3xl text-burgundy bg-white/20 backdrop-blur border-2 border-white/30 flex items-center justify-center text-6xl">
                    {{ $coiffeuse->user->avatar ? '' : '💇' }}
                </div>
                @if($coiffeuse->is_verified)
                <div class="absolute -bottom-2 -right-2 bg-white text-green-700 text-[10px] font-bold px-2 py-1 rounded-full shadow">
                    ✓ Vérifié
                </div>
                @endif
            </div>

            {{-- INFO --}}
            <div class="text-burgundy flex-1">
                <h1 class="font-display  text-4xl lg:text-5xl font-semibold mb-3">
                    {{ $coiffeuse->user->name }}
                </h1>
                <div class="flex flex-wrap gap-4 text-sm opacity-85 mb-4">
                    <span>📍 {{ $coiffeuse->city }}</span>
                    <span>⭐ {{ number_format($coiffeuse->rating_avg, 1) }} ({{ $coiffeuse->total_reviews }} avis)</span>
                    <span>🎓 {{ $coiffeuse->years_experience }} ans d'expérience</span>
                </div>
                <div class="flex flex-wrap gap-2">
                    @foreach($coiffeuse->services->take(5) as $service)
                    <span class="bg-white/15 backdrop-blur border border-white/20 text-white text-xs font-medium px-3 py-1.5 rounded-full">
                        {{ $service->name }}
                    </span>
                    @endforeach
                </div>
            </div>

        </div>
        {{-- ABOUT --}}
        <div>
            <h2 class="text-xl font-semibold mb-4">À propos</h2>
            <p class="text-gray-500 leading-relaxed text-sm">{{ $coiffeuse->bio ?? 'Aucune biographie disponible.' }}</p>
        </div>

        {{-- SERVICES --}}
        <div>
            <h2 class="text-xl font-semibold mb-6">Services & tarifs</h2>
            <div class="space-y-3">
                @foreach($coiffeuse->services as $service)
                <div class="bg-white rounded-2xl p-5 flex items-center justify-between border border-black/5 hover:border-rose-soft transition">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 rounded-xl bg-rose-light flex items-center justify-center text-lg">✂️</div>
                        <div>
                            <div class="font-semibold text-sm">{{ $service->name }}</div>
                            <div class="text-xs text-gray-400">⏱ {{ $service->duration_label }}</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="font-display text-xl font-semibold text-rose-primary">{{ number_format($service->price, 0) }} DH</span>
                        <a href=""
                            class="bg-rose-light text-rose-primary text-xs font-semibold px-4 py-2 rounded-xl hover:bg-rose-primary hover:text-white transition">
                            Réserver
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- REVIEWS --}}
        <div>
            <h2 class="text-xl font-semibold mb-6">Avis clients</h2>

            {{-- SUMMARY --}}
            <div class="bg-white rounded-2xl p-6 flex gap-8 items-center mb-6 border border-black/5">
                <div class="font-display text-6xl font-semibold text-rose-primary leading-none">
                    {{ number_format($coiffeuse->rating_avg, 1) }}
                </div>
                <div class="flex-1">
                    <div class="text-gold text-xl tracking-wider mb-1">★★★★★</div>
                    <div class="text-sm text-gray-400">{{ $coiffeuse->total_reviews }} avis vérifiés</div>
                </div>
            </div>

            {{-- LIST --}}
            <div class="space-y-4">
                @forelse($coiffeuse->reviews as $review)
                <div class="bg-white rounded-2xl p-5 border border-black/5">
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-gradient-to-br from-rose-soft to-rose-primary flex items-center justify-center text-white font-semibold text-sm">
                                {{ strtoupper(substr($review->client->name, 0, 1)) }}
                            </div>
                            <div>
                                <div class="font-semibold text-sm">{{ $review->client->name }}</div>
                                <div class="text-xs text-gray-400">{{ $review->created_at->locale('fr')->diffForHumans() }}</div>
                            </div>
                        </div>
                        <div class="text-gold text-sm">{{ str_repeat('★', $review->rating) }}</div>
                    </div>
                    <p class="text-sm text-gray-500 leading-relaxed">{{ $review->comment }}</p>
                </div>
                @empty
                <p class="text-gray-400 text-sm text-center py-8">Aucun avis pour le moment.</p>
                @endforelse
            </div>
        </div>
    </div>

    {{-- RIGHT SIDEBAR --}}
    <aside class="space-y-6">

        {{-- ZONES --}}
        <div class="bg-white rounded-2xl p-6 border border-black/5">
            <h3 class="font-semibold text-sm mb-4">📍 Zones desservies</h3>
            <div class="flex flex-wrap gap-2">
                @foreach($coiffeuse->zones ?? [] as $zone)
                <span class="bg-rose-light text-rose-primary text-xs font-medium px-3 py-1.5 rounded-full">
                    {{ $zone }}
                </span>
                @endforeach
            </div>
        </div>

        {{-- AVAILABILITIES --}}
        <div class="bg-white rounded-2xl p-6 border border-black/5">
            <h3 class="font-semibold text-sm mb-4">⏰ Disponibilités</h3>
            <div class="space-y-2 text-sm">
                @php
                $dayNames = ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'];
                @endphp
                @foreach($coiffeuse->availabilities as $slot)
                <div class="flex items-center justify-between">
                    <span class="font-medium">{{ $dayNames[$slot->day_of_week] }}</span>
                    <span class="text-gray-400 text-xs">
                        {{ \Carbon\Carbon::parse($slot->start_time)->format('H:i') }} —
                        {{ \Carbon\Carbon::parse($slot->end_time)->format('H:i') }}
                    </span>
                </div>
                @endforeach
            </div>
        </div>

        {{-- RELATED --}}
        @if($related->count())
        <div class="bg-white rounded-2xl p-6 border border-black/5">
            <h3 class="font-semibold text-sm mb-4">👯 Similaires à {{ $coiffeuse->city }}</h3>
            <div class="space-y-3">
                @foreach($related as $r)
                <a href="{{ route('coiffeuses.show', [$r->city, $r->slug]) }}"
                    class="flex items-center gap-3 hover:bg-rose-light/50 p-2 rounded-xl transition">
                    <div class="w-10 h-10 rounded-xl bg-rose-light flex items-center justify-center text-lg shrink-0">💇</div>
                    <div class="flex-1 min-w-0">
                        <div class="font-medium text-sm truncate">{{ $r->user->name }}</div>
                        <div class="text-xs text-gray-400">⭐ {{ number_format($r->rating_avg, 1) }} · Depuis {{ number_format($r->services->min('price'), 0) }} DH</div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif

    </aside>
</div>

@endsection