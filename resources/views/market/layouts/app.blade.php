<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- SEO --}}
    <title>@yield('title', 'CoiffLik.ma — Ton coiffeur, chez toi')</title>
    <meta name="description" content="@yield('meta_description', 'Réservez un coiffeur professionnel à domicile au Maroc. Casablanca, Rabat, Marrakech.')">
    <meta name="keywords" content="@yield('meta_keywords', 'coiffeur domicile maroc, coiffeuse casablanca, réservation coiffeur')">

    {{-- Open Graph --}}
    <meta property="og:title" content="@yield('title', 'CoiffLik.ma')">
    <meta property="og:description" content="@yield('meta_description')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-default.jpg'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="font-sans bg-mist text-ink antialiased">

    {{-- NAVBAR --}}
    @include('market.components.navbar')

    {{-- FLASH MESSAGES --}}
    @if(session('success'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
        class="fixed top-20 right-4 z-50 bg-green-50 border border-green-200 text-green-800 px-6 py-3 rounded-2xl shadow-lg text-sm font-medium">
        ✅ {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
        class="fixed top-20 right-4 z-50 bg-red-50 border border-red-200 text-red-800 px-6 py-3 rounded-2xl shadow-lg text-sm font-medium">
        ❌ {{ session('error') }}
    </div>
    @endif

    {{-- MAIN --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('market.components.footer')

    @stack('scripts')
</body>

</html>