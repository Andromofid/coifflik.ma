@extends('market.layouts.app')

@section('title', 'CoiffLik.ma — Ton coiffeur, chez toi')
@section('meta_description', 'Réservez un coiffeur professionnel à domicile au Maroc en 2 minutes. Coiffeuses vérifiées à Casablanca, Rabat, Marrakech.')

@section('content')

{{-- HERO --}}
<section class="relative min-h-screen overflow-hidden bg-cream">
    {{-- BG blobs --}}
    <div class="absolute -top-32 -right-32 w-[420px] h-[420px] rounded-full bg-gold/20 blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-32 -left-32 w-[360px] h-[360px] rounded-full bg-burgundy/10 blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/2 left-1/2 w-[520px] h-[520px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-white/40 blur-3xl pointer-events-none"></div>

    <div class="relative z-10 max-w-7xl mx-auto min-h-screen px-6 lg:px-10 py-20 grid grid-cols-1 lg:grid-cols-[1.35fr_0.65fr] items-center gap-12">

        {{-- LEFT --}}
        <div class="text-center lg:text-left">

            <div class="inline-flex items-center gap-2 bg-white/70 backdrop-blur border border-gold/30 text-burgundy px-5 py-2.5 rounded-full text-[11px] sm:text-xs font-semibold uppercase tracking-wider mb-8 shadow-sm">
                ✦ Disponible à Casa, Rabat & Marrakech
            </div>

            <h1 class="font-display text-4xl sm:text-6xl lg:text-7xl xl:text-8xl font-semibold leading-[0.95] text-burgundy mb-6">
                Ton coiffeur,
                <span class="block text-gold">chez toi.</span>
            </h1>

            <p class="text-base sm:text-lg lg:text-xl text-ink/60 font-light max-w-2xl mx-auto lg:mx-0 mb-10 leading-relaxed">
                Des coiffeurs professionnels vérifiés.
                Réservez en 2 minutes, payez en cash.
            </p>

            {{-- SEARCH BOX --}}
            <form action="{{ route('coiffeuses.index') }}" method="GET" class="max-w-3xl mx-auto lg:mx-0">
                <div class="bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl shadow-burgundy/10 p-3 flex flex-col md:flex-row gap-3 border border-gold/20">

                    <div class="flex-1 flex flex-col text-left px-4 py-3 rounded-2xl bg-cream/70">
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

                    <div class="flex-1 flex flex-col text-left px-4 py-3 rounded-2xl bg-cream/70">
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
                        class="bg-burgundy text-cream rounded-2xl px-7 py-4 text-sm font-semibold flex items-center justify-center gap-2 hover:bg-burgundy-dark transition shadow-lg shadow-burgundy/20">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8" />
                            <path d="m21 21-4.35-4.35" />
                        </svg>
                        Chercher
                    </button>

                </div>
            </form>

            {{-- STATS --}}
            <div class="mt-10 grid grid-cols-3 gap-3 sm:gap-4 max-w-2xl mx-auto lg:mx-0">
                <div class="rounded-2xl bg-white/65 backdrop-blur border border-gold/20 px-3 sm:px-5 py-5 shadow-sm">
                    <div class="font-display text-2xl sm:text-4xl font-semibold text-burgundy">
                        {{ $stats['coiffeures'] }}+
                    </div>
                    <div class="text-[10px] sm:text-xs text-ink/45 mt-1">
                        Coiffeurs vérifiés
                    </div>
                </div>

                <div class="rounded-2xl bg-white/65 backdrop-blur border border-gold/20 px-3 sm:px-5 py-5 shadow-sm">
                    <div class="font-display text-2xl sm:text-4xl font-semibold text-burgundy">
                        {{ $stats['bookings'] }}+
                    </div>
                    <div class="text-[10px] sm:text-xs text-ink/45 mt-1">
                        Réservations
                    </div>
                </div>

                <div class="rounded-2xl bg-white/65 backdrop-blur border border-gold/20 px-3 sm:px-5 py-5 shadow-sm">
                    <div class="font-display text-2xl sm:text-4xl font-semibold text-burgundy">
                        {{ $stats['cities'] }}
                    </div>
                    <div class="text-[10px] sm:text-xs text-ink/45 mt-1">
                        Villes
                    </div>
                </div>
            </div>
        </div>

        {{-- RIGHT --}}
        <div class="hidden lg:flex justify-center lg:justify-end">
            <div class="relative w-[280px] xl:w-[330px]">

                <div class="absolute -top-8 -left-8 w-28 h-28 rounded-full bg-gold/25 blur-2xl"></div>
                <div class="absolute -bottom-8 -right-8 w-32 h-32 rounded-full bg-burgundy/15 blur-2xl"></div>

                <div class="relative rounded-[3rem] bg-white/55 backdrop-blur-xl border border-gold/25 shadow-2xl shadow-burgundy/10 p-5">
                    <div class="aspect-[3/4] rounded-[2.5rem] bg-gradient-to-br from-gold/25 via-cream to-white border border-gold/20 flex items-center justify-center text-8xl">
                        <img src="{{asset('./hero-section.png')}}" alt="hero" class="rounded-[2.5rem]" srcset="">
                    </div>

                    {{-- Services card --}}
                    <div class="absolute -bottom-6 -left-6 bg-white rounded-2xl border border-gold/20 shadow-xl shadow-burgundy/10 px-5 py-4 min-w-[180px]">
                        <div class="text-xs text-ink/50 mb-2">
                            Services populaires
                        </div>

                        <div class="flex flex-wrap gap-2">
                            <span class="text-[11px] px-2 py-1 rounded-full bg-gold/10 text-burgundy">
                                Coupe
                            </span>

                            <span class="text-[11px] px-2 py-1 rounded-full bg-gold/10 text-burgundy">
                                Coloration
                            </span>

                            <span class="text-[11px] px-2 py-1 rounded-full bg-gold/10 text-burgundy">
                                Lissage
                            </span>
                        </div>
                    </div>

                    {{-- Prices card --}}
                    <div class="absolute -top-6 -right-6 bg-white rounded-2xl border border-gold/20 shadow-xl shadow-burgundy/10 px-5 py-4">

                        <div class="font-display text-2xl font-semibold text-burgundy">
                            Prix transparents
                        </div>


                    </div>
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

            <div class="bg-cream rounded-3xl p-10 relative overflow-hidden border border-gold/20 hover:-translate-y-2 transition-transform duration-300 shadow-sm hover:shadow-xl hover:shadow-burgundy/10">
                <div class="absolute top-4 right-6 font-display text-8xl font-semibold text-gold/20 leading-none">1</div>

                <div class="w-14 h-14 rounded-2xl bg-gold/15 text-burgundy flex items-center justify-center text-2xl mb-6 relative z-10 border border-gold/20">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11 2.75C6.44365 2.75 2.75 6.44365 2.75 11C2.75 15.5563 6.44365 19.25 11 19.25C15.5563 19.25 19.25 15.5563 19.25 11C19.25 6.44365 15.5563 2.75 11 2.75ZM1.25 11C1.25 5.61522 5.61522 1.25 11 1.25C16.3848 1.25 20.75 5.61522 20.75 11C20.75 16.3848 16.3848 20.75 11 20.75C5.61522 20.75 1.25 16.3848 1.25 11ZM20.1579 19.7511C19.9264 19.7335 19.7335 19.9264 19.7511 20.1579C19.7514 20.1592 19.7553 20.1848 19.7746 20.2573C19.7974 20.3424 19.8312 20.4554 19.8828 20.6277C19.9301 20.7857 19.9609 20.8881 19.9862 20.9641C20.0121 21.0419 20.021 21.0568 20.0171 21.0496C20.1225 21.2465 20.3745 21.31 20.5607 21.1867C20.5538 21.1912 20.5688 21.1824 20.6284 21.1261C20.6868 21.0712 20.7624 20.9957 20.8791 20.8791C20.9957 20.7624 21.0712 20.6868 21.1261 20.6284C21.1727 20.579 21.1868 20.5602 21.1877 20.5592C21.3093 20.3736 21.2463 20.1236 21.0511 20.018C21.0499 20.0175 21.0287 20.0077 20.9641 19.9862C20.8881 19.9609 20.7857 19.9301 20.6277 19.8828C20.4554 19.8312 20.3424 19.7974 20.2573 19.7746C20.1848 19.7553 20.1591 19.7514 20.1579 19.7511ZM18.2564 20.2833C18.1612 19.1267 19.1267 18.1612 20.2833 18.2564C20.4833 18.2728 20.7251 18.3457 20.9862 18.4242C21.0101 18.4314 21.0341 18.4387 21.0583 18.4459C21.0801 18.4524 21.1018 18.4589 21.1234 18.4654C21.3632 18.5369 21.5881 18.604 21.7576 18.6948C22.7335 19.2173 23.0485 20.4659 22.4373 21.3889C22.3312 21.5492 22.165 21.715 21.9878 21.8917C21.9719 21.9076 21.9558 21.9236 21.9397 21.9397C21.9236 21.9558 21.9076 21.9719 21.8917 21.9878C21.7149 22.165 21.5492 22.3312 21.3889 22.4373C20.4659 23.0485 19.2173 22.7335 18.6948 21.7576C18.604 21.5881 18.5369 21.3632 18.4654 21.1234C18.4589 21.1018 18.4524 21.0801 18.4459 21.0583C18.4387 21.0341 18.4314 21.0101 18.4242 20.9862C18.3457 20.7252 18.2728 20.4833 18.2564 20.2833Z" fill="#7A003C" />
                    </svg>


                </div>

                <h3 class="text-xl font-semibold mb-3 relative z-10 text-burgundy">Recherchez</h3>
                <p class="text-sm text-ink/60 leading-relaxed relative z-10"> Entrez votre ville et le service souhaité. Filtrez par note, prix et disponibilité.</p>
            </div>
            <div class="bg-cream rounded-3xl p-10 relative overflow-hidden border border-gold/20 hover:-translate-y-2 transition-transform duration-300 shadow-sm hover:shadow-xl hover:shadow-burgundy/10">
                <div class="absolute top-4 right-6 font-display text-8xl font-semibold text-gold/20 leading-none">2</div>

                <div class="w-14 h-14 rounded-2xl bg-gold/15 text-burgundy flex items-center justify-center text-2xl mb-6 relative z-10 border border-gold/20">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 14C17.5523 14 18 13.5523 18 13C18 12.4477 17.5523 12 17 12C16.4477 12 16 12.4477 16 13C16 13.5523 16.4477 14 17 14Z" fill="#7A003C" />
                        <path d="M17 18C17.5523 18 18 17.5523 18 17C18 16.4477 17.5523 16 17 16C16.4477 16 16 16.4477 16 17C16 17.5523 16.4477 18 17 18Z" fill="#7A003C" />
                        <path d="M13 13C13 13.5523 12.5523 14 12 14C11.4477 14 11 13.5523 11 13C11 12.4477 11.4477 12 12 12C12.5523 12 13 12.4477 13 13Z" fill="#7A003C" />
                        <path d="M13 17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17C11 16.4477 11.4477 16 12 16C12.5523 16 13 16.4477 13 17Z" fill="#7A003C" />
                        <path d="M7 14C7.55229 14 8 13.5523 8 13C8 12.4477 7.55229 12 7 12C6.44772 12 6 12.4477 6 13C6 13.5523 6.44772 14 7 14Z" fill="#7A003C" />
                        <path d="M7 18C7.55229 18 8 17.5523 8 17C8 16.4477 7.55229 16 7 16C6.44772 16 6 16.4477 6 17C6 17.5523 6.44772 18 7 18Z" fill="#7A003C" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7 1.75C7.41421 1.75 7.75 2.08579 7.75 2.5V3.26272C8.412 3.24999 9.14133 3.24999 9.94346 3.25H14.0564C14.8586 3.24999 15.588 3.24999 16.25 3.26272V2.5C16.25 2.08579 16.5858 1.75 17 1.75C17.4142 1.75 17.75 2.08579 17.75 2.5V3.32709C18.0099 3.34691 18.2561 3.37182 18.489 3.40313C19.6614 3.56076 20.6104 3.89288 21.3588 4.64124C22.1071 5.38961 22.4392 6.33855 22.5969 7.51098C22.75 8.65018 22.75 10.1058 22.75 11.9435V14.0564C22.75 15.8941 22.75 17.3498 22.5969 18.489C22.4392 19.6614 22.1071 20.6104 21.3588 21.3588C20.6104 22.1071 19.6614 22.4392 18.489 22.5969C17.3498 22.75 15.8942 22.75 14.0565 22.75H9.94359C8.10585 22.75 6.65018 22.75 5.51098 22.5969C4.33856 22.4392 3.38961 22.1071 2.64124 21.3588C1.89288 20.6104 1.56076 19.6614 1.40314 18.489C1.24997 17.3498 1.24998 15.8942 1.25 14.0564V11.9436C1.24998 10.1058 1.24997 8.65019 1.40314 7.51098C1.56076 6.33855 1.89288 5.38961 2.64124 4.64124C3.38961 3.89288 4.33856 3.56076 5.51098 3.40313C5.7439 3.37182 5.99006 3.34691 6.25 3.32709V2.5C6.25 2.08579 6.58579 1.75 7 1.75ZM5.71085 4.88976C4.70476 5.02502 4.12511 5.27869 3.7019 5.7019C3.27869 6.12511 3.02502 6.70476 2.88976 7.71085C2.86685 7.88123 2.8477 8.06061 2.83168 8.25H21.1683C21.1523 8.06061 21.1331 7.88124 21.1102 7.71085C20.975 6.70476 20.7213 6.12511 20.2981 5.7019C19.8749 5.27869 19.2952 5.02502 18.2892 4.88976C17.2615 4.75159 15.9068 4.75 14 4.75H10C8.09318 4.75 6.73851 4.75159 5.71085 4.88976ZM2.75 12C2.75 11.146 2.75032 10.4027 2.76309 9.75H21.2369C21.2497 10.4027 21.25 11.146 21.25 12V14C21.25 15.9068 21.2484 17.2615 21.1102 18.2892C20.975 19.2952 20.7213 19.8749 20.2981 20.2981C19.8749 20.7213 19.2952 20.975 18.2892 21.1102C17.2615 21.2484 15.9068 21.25 14 21.25H10C8.09318 21.25 6.73851 21.2484 5.71085 21.1102C4.70476 20.975 4.12511 20.7213 3.7019 20.2981C3.27869 19.8749 3.02502 19.2952 2.88976 18.2892C2.75159 17.2615 2.75 15.9068 2.75 14V12Z" fill="#7A003C" />
                    </svg>

                </div>

                <h3 class="text-xl font-semibold mb-3 relative z-10 text-burgundy">Réservez</h3>
                <p class="text-sm text-ink/60 leading-relaxed relative z-10">Choisissez votre coiffeur, sélectionnez un créneau et confirmez en 2 clics.</p>
            </div>
            <div class="bg-cream rounded-3xl p-10 relative overflow-hidden border border-gold/20 hover:-translate-y-2 transition-transform duration-300 shadow-sm hover:shadow-xl hover:shadow-burgundy/10">
                <div class="absolute top-4 right-6 font-display text-8xl font-semibold text-gold/20 leading-none">3</div>

                <div class="w-14 h-14 rounded-2xl bg-gold/15 text-burgundy flex items-center justify-center text-2xl mb-6 relative z-10 border border-gold/20">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5.48039 1.90311C5.48039 1.90314 5.48038 1.90308 5.48039 1.90311C5.43387 1.66838 5.2275 1.49919 4.98818 1.5C4.7488 1.50081 4.54359 1.67116 4.49873 1.90628L4.49839 1.908L4.49648 1.91758C4.49467 1.92655 4.49179 1.94056 4.48782 1.95905C4.47987 1.99608 4.46761 2.05092 4.45092 2.11918C4.41742 2.25622 4.3667 2.44478 4.29809 2.65065C4.1534 3.08484 3.95627 3.51076 3.73001 3.73856C3.50374 3.96635 3.07917 4.16636 2.64596 4.31398C2.44056 4.38398 2.25235 4.43597 2.11554 4.4704C2.04739 4.48755 1.99264 4.50018 1.95566 4.50838C1.93719 4.51247 1.9232 4.51545 1.91425 4.51732L1.90468 4.51929L1.90311 4.51961C1.6683 4.56606 1.49919 4.77245 1.5 5.01182C1.50081 5.2512 1.67116 5.45641 1.90628 5.50127L1.908 5.50161L1.91758 5.50352C1.92655 5.50533 1.94056 5.50821 1.95905 5.51218C1.99608 5.52013 2.05092 5.53239 2.11918 5.54908C2.25622 5.58258 2.44478 5.6333 2.65065 5.70191C3.08484 5.8466 3.51076 6.04373 3.73856 6.27C3.96635 6.49626 4.16636 6.92083 4.31398 7.35404C4.38398 7.55944 4.43597 7.74765 4.4704 7.88446C4.48755 7.95261 4.50018 8.00736 4.50838 8.04434C4.51247 8.06281 4.51545 8.0768 4.51732 8.08575L4.51929 8.09532L4.51961 8.09689C4.56606 8.3317 4.77245 8.50081 5.01182 8.5C5.2512 8.49919 5.45641 8.32884 5.50127 8.09372L5.50161 8.092L5.50352 8.08242C5.50533 8.07345 5.50821 8.05944 5.51218 8.04095C5.52013 8.00392 5.53239 7.94908 5.54908 7.88082C5.58258 7.74378 5.6333 7.55522 5.70191 7.34935C5.8466 6.91516 6.04373 6.48924 6.27 6.26144C6.49626 6.03365 6.92083 5.83364 7.35404 5.68602C7.55944 5.61602 7.74765 5.56403 7.88446 5.5296C7.95261 5.51245 8.00736 5.49982 8.04434 5.49162C8.06281 5.48753 8.0768 5.48455 8.08575 5.48268L8.09532 5.48071L8.09689 5.48039C8.09684 5.4804 8.09694 5.48038 8.09689 5.48039C8.33159 5.43385 8.50081 5.22748 8.5 4.98818C8.49919 4.7488 8.32884 4.54359 8.09372 4.49873L8.092 4.49839L8.08242 4.49648C8.07345 4.49467 8.05944 4.49179 8.04095 4.48782C8.00392 4.47987 7.94908 4.46761 7.88082 4.45092C7.74378 4.41742 7.55522 4.3667 7.34935 4.29809C6.91516 4.1534 6.48924 3.95627 6.26144 3.73001C6.03365 3.50374 5.83364 3.07917 5.68602 2.64596C5.61602 2.44056 5.56403 2.25235 5.5296 2.11554C5.51245 2.04739 5.49982 1.99264 5.49162 1.95566C5.48753 1.93719 5.48455 1.9232 5.48268 1.91425L5.48071 1.90468L5.48039 1.90311ZM6.39614 4.99528C6.09334 4.85303 5.78918 4.67039 5.55673 4.4395C5.32428 4.20861 5.13958 3.90569 4.99528 3.60386C4.85303 3.90666 4.67039 4.21082 4.4395 4.44327C4.20861 4.67572 3.90569 4.86042 3.60386 5.00472C3.90666 5.14697 4.21082 5.32961 4.44327 5.5605C4.67572 5.79139 4.86042 6.09431 5.00472 6.39614C5.14697 6.09334 5.32961 5.78918 5.5605 5.55673C5.79139 5.32428 6.09431 5.13958 6.39614 4.99528Z" fill="#7A003C" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19 3.25C19.4142 3.25 19.75 3.58579 19.75 4V4.25H20C20.4142 4.25 20.75 4.58579 20.75 5C20.75 5.41421 20.4142 5.75 20 5.75H19.75V6C19.75 6.41421 19.4142 6.75 19 6.75C18.5858 6.75 18.25 6.41421 18.25 6V5.75H18C17.5858 5.75 17.25 5.41421 17.25 5C17.25 4.58579 17.5858 4.25 18 4.25H18.25V4C18.25 3.58579 18.5858 3.25 19 3.25ZM11.9875 6.18028C11.659 6.60921 11.2858 7.27467 10.7353 8.2623L10.4567 8.76198C10.4388 8.79421 10.421 8.82627 10.4033 8.8581C10.1521 9.31057 9.92501 9.71966 9.55768 9.99851C9.18594 10.2807 8.73368 10.3821 8.24389 10.492C8.20945 10.4997 8.17482 10.5075 8.14001 10.5154L7.59912 10.6377C6.52827 10.88 5.81264 11.0441 5.32543 11.2361C4.85236 11.4226 4.78896 11.5612 4.76498 11.6383C4.73845 11.7236 4.71654 11.8899 5.00039 12.3408C5.28934 12.7998 5.77932 13.3758 6.50808 14.228L6.87683 14.6592C6.89985 14.6861 6.92275 14.7128 6.94548 14.7393C7.28266 15.1323 7.58345 15.4829 7.72165 15.9274C7.85893 16.3688 7.81339 16.8314 7.76172 17.3562C7.75824 17.3916 7.75473 17.4273 7.75124 17.4633L7.69549 18.0386C7.58541 19.1745 7.51263 19.9446 7.53721 20.4964C7.56173 21.0469 7.67706 21.1584 7.73036 21.1988C7.77142 21.23 7.8816 21.3108 8.37411 21.1697C8.87625 21.0258 9.54795 20.7189 10.5507 20.2572L11.0571 20.0241C11.0903 20.0087 11.1234 19.9934 11.1563 19.9782C11.6116 19.7675 12.0358 19.5711 12.5 19.5711C12.9642 19.5711 13.3884 19.7675 13.8437 19.9782C13.8766 19.9934 13.9097 20.0087 13.9429 20.0241L14.4494 20.2572C15.452 20.7189 16.1238 21.0258 16.6259 21.1697C17.1184 21.3108 17.2286 21.23 17.2696 21.1988C17.3229 21.1584 17.4383 21.0469 17.4628 20.4964C17.4874 19.9446 17.4146 19.1745 17.3045 18.0386L17.2488 17.4633C17.2453 17.4273 17.2418 17.3916 17.2383 17.3562C17.1866 16.8314 17.1411 16.3688 17.2783 15.9274C17.4166 15.4829 17.7173 15.1323 18.0545 14.7393C18.0773 14.7128 18.1001 14.6861 18.1232 14.6592L18.4919 14.228C19.2207 13.3758 19.7107 12.7998 19.9996 12.3408C20.2835 11.8899 20.2615 11.7236 20.235 11.6383C20.211 11.5612 20.1476 11.4226 19.6746 11.2361C19.1874 11.0441 18.4717 10.88 17.4009 10.6377L16.86 10.5153C16.8252 10.5075 16.7905 10.4997 16.7561 10.492C16.2663 10.3821 15.8141 10.2807 15.4423 9.99851C15.075 9.71966 14.8479 9.31056 14.5967 8.8581C14.579 8.82627 14.5612 8.79421 14.5433 8.76197L14.2647 8.26229C13.7142 7.27467 13.341 6.60921 13.0125 6.18028C12.6844 5.75183 12.5427 5.75 12.5 5.75C12.4573 5.75 12.3156 5.75183 11.9875 6.18028ZM10.7966 5.26828C11.208 4.73103 11.7379 4.25 12.5 4.25C13.2621 4.25 13.792 4.73103 14.2034 5.26828C14.6066 5.79476 15.0321 6.5582 15.5447 7.47781L15.8534 8.03162C16.192 8.63894 16.2654 8.7401 16.3493 8.80376C16.4284 8.86385 16.5324 8.90332 17.191 9.05233L17.794 9.18876C18.7864 9.41326 19.6168 9.60111 20.2245 9.8406C20.859 10.0906 21.4426 10.4702 21.6674 11.1929C21.8895 11.9073 21.6357 12.5575 21.269 13.14C20.9144 13.7033 20.3505 14.3627 19.6716 15.1565L19.2632 15.6341C18.8176 16.1551 18.7454 16.2612 18.7107 16.3728C18.675 16.4875 18.6745 16.6241 18.7418 17.3186L18.8033 17.9537C18.9062 19.0147 18.9912 19.892 18.9613 20.5631C18.9308 21.2481 18.7744 21.9397 18.1766 22.3936C17.5665 22.8567 16.8618 22.7977 16.2127 22.6117C15.5864 22.4322 14.8093 22.0744 13.8803 21.6466L13.3156 21.3866C12.6964 21.1015 12.5919 21.0711 12.5 21.0711C12.4081 21.0711 12.3036 21.1015 11.6844 21.3866L11.1197 21.6466C10.1907 22.0744 9.41362 22.4322 8.78727 22.6117C8.13822 22.7977 7.43346 22.8567 6.82339 22.3936C6.22557 21.9397 6.06921 21.2481 6.03869 20.5631C6.0088 19.892 6.09384 19.0147 6.19668 17.9538L6.25823 17.3186C6.32553 16.6241 6.325 16.4875 6.28931 16.3728C6.25462 16.2612 6.18236 16.1551 5.73683 15.6341L5.32838 15.1565C4.64953 14.3627 4.08562 13.7033 3.73098 13.14C3.36434 12.5575 3.11045 11.9073 3.33264 11.1929C3.55736 10.4702 4.141 10.0906 4.77547 9.8406C5.38317 9.60112 6.21361 9.41326 7.20603 9.18876L7.80899 9.05233C8.46758 8.90332 8.57157 8.86385 8.65072 8.80376C8.73458 8.7401 8.80801 8.63894 9.14655 8.03162L9.45527 7.47781C9.96786 6.5582 10.3934 5.79476 10.7966 5.26828Z" fill="#7A003C" />
                    </svg>


                </div>

                <h3 class="text-xl font-semibold mb-3 relative z-10 text-burgundy">Profitez</h3>
                <p class="text-sm text-ink/60 leading-relaxed relative z-10">Présentez-vous au salon à la date réservée. Profitez de votre prestation en toute sérénité.</p>
            </div>

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