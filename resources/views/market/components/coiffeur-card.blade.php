<div class="bg-white rounded-2xl overflow-hidden border border-black/5 cursor-pointer hover:-translate-y-2 hover:shadow-xl hover:shadow-rose-primary/10 transition-all duration-300"
    onclick="location.href='{{ route('coiffeuses.show', [$coiffeuse->city, $coiffeuse->slug]) }}'">

    {{-- PHOTO --}}
    <div class="aspect-[4/3] bg-gradient-to-br from-rose-light to-rose-soft relative flex items-center justify-center text-6xl">
        @if($coiffeuse->user->avatar)
        <img src="{{ $coiffeuse->user->avatar }}" alt="{{ $coiffeuse->user->name }}" class="w-full h-full object-cover">
        @else
        💇
        @endif
        @if($coiffeuse->is_verified)
        <div class="absolute top-3 right-3 bg-white text-green-700 text-[10px] font-bold px-2.5 py-1 rounded-full flex items-center gap-1 shadow-sm">
            ✓ Vérifié
        </div>
        @endif
    </div>

    {{-- INFO --}}
    <div class="p-5">
        <div class="font-semibold text-base mb-1">{{ $coiffeuse->user->name }}</div>
        <div class="text-xs text-gray-400 mb-3">📍 {{ $coiffeuse->city }}</div>

        {{-- SERVICE TAGS --}}
        <div class="flex flex-wrap gap-1.5 mb-4">
            @foreach($coiffeuse->services->take(3) as $service)
            <span class="text-[11px] px-2.5 py-1 rounded-full bg-rose-light text-rose-primary font-medium">
                {{ $service->name }}
            </span>
            @endforeach
        </div>

        {{-- FOOTER --}}
        <div class="flex items-center justify-between pt-3 border-t border-gray-50">
            <div class="flex items-center gap-1.5 text-sm">
                <span class="text-gold">★</span>
                <span class="font-bold">{{ number_format($coiffeuse->rating_avg, 1) }}</span>
                <span class="text-gray-300 text-xs">({{ $coiffeuse->total_reviews }})</span>
            </div>
            <div class="text-right">
                <span class="text-xs text-gray-400">Depuis </span>
                <span class="text-rose-primary font-bold text-base">
                    {{ number_format($coiffeuse->services->min('price'), 0) }} DH
                </span>
            </div>
        </div>
    </div>
</div>