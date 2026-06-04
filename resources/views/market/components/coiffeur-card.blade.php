<div class="bg-white rounded-2xl overflow-hidden border border-gold/15 cursor-pointer
    hover:-translate-y-2 hover:shadow-xl hover:shadow-burgundy/10
    transition-all duration-300"
    onclick="location.href='{{ route('coiffeuses.show', [$coiffeuse->city, $coiffeuse->slug]) }}'">

    {{-- PHOTO --}}
    <div class="aspect-[4/3] bg-gradient-to-br from-cream via-gold/10 to-gold/20 relative flex items-center justify-center text-6xl">
        @if($coiffeuse->user->avatar)
        <img src="{{ $coiffeuse->user->avatar }}"
            alt="{{ $coiffeuse->user->name }}"
            class="w-full h-full object-cover">
        @else
        💇
        @endif

        @if($coiffeuse->is_verified)
        <div class="absolute top-3 right-3 bg-white text-burgundy text-[10px] font-bold px-2.5 py-1 rounded-full flex items-center gap-1 shadow-sm border border-gold/20">
            ✓ Vérifié
        </div>
        @endif
    </div>

    {{-- INFO --}}
    <div class="p-5">
        <div class="font-semibold text-base mb-1 text-burgundy">
            {{ $coiffeuse->user->name }}
        </div>

        <div class="text-xs text-ink/50 mb-3">
            📍 {{ $coiffeuse->city }}
        </div>

        {{-- SERVICE TAGS --}}
        <div class="flex flex-wrap gap-1.5 mb-4">
            @foreach($coiffeuse->services->take(3) as $service)
            <span class="text-[11px] px-2.5 py-1 rounded-full bg-gold/10 text-burgundy font-medium border border-gold/20">
                {{ $service->name }}
            </span>
            @endforeach
        </div>

        {{-- FOOTER --}}
        <div class="flex items-center justify-between pt-3 border-t border-gold/10">

            <div class="flex items-center gap-1.5 text-sm">
                <span class="text-gold">★</span>
                <span class="font-bold text-burgundy">
                    {{ number_format($coiffeuse->rating_avg, 1) }}
                </span>
                <span class="text-ink/40 text-xs">
                    ({{ $coiffeuse->total_reviews }})
                </span>
            </div>

            <div class="text-right">
                <span class="text-xs text-ink/40">
                    Depuis
                </span>

                <span class="text-burgundy font-bold text-base">
                    {{ number_format($coiffeuse->services->min('price'), 0) }} DH
                </span>
            </div>

        </div>
    </div>
</div>