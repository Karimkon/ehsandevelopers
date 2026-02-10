<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Login - Ehsan Developers</title>

        <link rel="stylesheet" href="/css/app.css">
        <link rel="modulepreload" href="/js/module.esm.js">
        <script type="module" src="/js/app.js"></script>
    </head>
    <body class="min-h-screen bg-surface-900 flex flex-col items-center justify-center px-4">
        <div class="w-full max-w-md">
            <!-- Logo -->
            <div class="text-center mb-8">
                <a href="/" class="inline-flex items-center gap-3">
                    <div class="w-12 h-12 bg-primary-600 rounded-xl flex items-center justify-center">
                        <span class="text-white font-bold text-xl">ED</span>
                    </div>
                    <span class="text-2xl font-display font-bold text-white">Ehsan Developers</span>
                </a>
            </div>

            <!-- Card -->
            <div class="glass-card p-8 rounded-2xl">
                {{ $slot }}
            </div>

            <!-- Back link -->
            <p class="text-center mt-6 text-sm text-gray-500">
                <a href="/" class="hover:text-primary-400 transition-colors">&larr; Back to website</a>
            </p>
        </div>
    </body>
</html>
