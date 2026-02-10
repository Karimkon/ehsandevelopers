<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="themeToggle" :class="{ 'dark': dark }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Ehsan Developers - Building Digital Excellence' }}</title>
    <meta name="description" content="{{ $metaDescription ?? \App\Models\Setting::get('site_description', 'Premium IT solutions company') }}">
    <meta name="keywords" content="{{ $metaKeywords ?? \App\Models\Setting::get('site_keywords', '') }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="robots" content="index, follow">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ $title ?? 'Ehsan Developers' }}">
    <meta property="og:description" content="{{ $metaDescription ?? \App\Models\Setting::get('site_description', '') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Ehsan Developers">
    <meta property="og:locale" content="en_US">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title ?? 'Ehsan Developers' }}">
    <meta name="twitter:description" content="{{ $metaDescription ?? \App\Models\Setting::get('site_description', '') }}">

    <!-- Prevent FOUC for dark mode -->
    <script>
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        }
    </script>

    <link rel="stylesheet" href="/css/app.css">
    <link rel="modulepreload" href="/js/module.esm.js">
    <script type="module" src="/js/app.js"></script>
</head>
<body class="min-h-screen flex flex-col">
    @include('site.partials.nav')

    <main class="flex-1">
        {{ $slot }}
    </main>

    @include('site.partials.footer')
</body>
</html>
