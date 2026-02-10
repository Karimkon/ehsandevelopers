<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Admin' }} - Ehsan Developers</title>
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="modulepreload" href="/js/module.esm.js">
    <script type="module" src="/js/admin.js"></script>
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
{{-- Tailwind safelist: translate-x-0 -translate-x-full lg:translate-x-0 lg:!w-16 lg:!ml-16 --}}
<body class="min-h-screen bg-surface-900 text-gray-200">
    <div x-data="adminLayout" class="min-h-screen">
        <!-- Mobile Backdrop -->
        <div x-show="mobileOpen" x-cloak
             x-transition:enter="transition-opacity ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="mobileOpen = false"
             class="fixed inset-0 z-40 bg-black/60 lg:hidden"></div>

        <!-- Sidebar -->
        <aside class="fixed inset-y-0 left-0 z-50 w-64 bg-surface-800 border-r border-surface-600 transition-all duration-300 overflow-hidden -translate-x-full lg:translate-x-0"
               :class="[
                   mobileOpen ? '!translate-x-0' : '',
                   collapsed ? 'lg:!w-16' : ''
               ]">
            <!-- Logo -->
            <div class="flex items-center justify-between h-16 px-4 border-b border-surface-600">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 overflow-hidden">
                    <div class="w-8 h-8 bg-primary-600 rounded-lg flex items-center justify-center flex-shrink-0">
                        <span class="text-white font-bold text-sm">ED</span>
                    </div>
                    <span class="text-white font-display font-bold text-lg whitespace-nowrap" x-show="!collapsed || mobileOpen" x-transition>Ehsan Dev</span>
                </a>
                <button @click="mobileOpen = false" class="lg:hidden text-gray-400 hover:text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <!-- Nav -->
            <nav class="p-3 space-y-1 overflow-y-auto" style="height: calc(100vh - 4rem)">
                @php
                $navItems = [
                    ['route' => 'admin.dashboard', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>', 'label' => 'Dashboard'],
                    ['route' => 'admin.service-requests.index', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>', 'label' => 'Service Requests'],
                    ['route' => 'admin.contact-messages.index', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>', 'label' => 'Messages'],
                    ['route' => 'admin.blog.index', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>', 'label' => 'Blog Posts'],
                    ['route' => 'admin.portfolio.index', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>', 'label' => 'Portfolio'],
                    ['route' => 'admin.categories.index', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>', 'label' => 'Categories'],
                    ['route' => 'admin.services.index', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>', 'label' => 'Services'],
                    ['route' => 'admin.page-content.index', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>', 'label' => 'Page Content'],
                    ['route' => 'admin.settings.index', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>', 'label' => 'Settings'],
                    ['route' => 'admin.activity-logs.index', 'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>', 'label' => 'Activity Logs'],
                ];
                @endphp

                @foreach($navItems as $item)
                <a href="{{ route($item['route']) }}" @click="mobileOpen = false"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors {{ request()->routeIs($item['route'].'*') ? 'bg-primary-600/20 text-primary-400' : 'text-gray-400 hover:bg-surface-600 hover:text-white' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $item['icon'] !!}</svg>
                    <span x-show="!collapsed || mobileOpen" x-transition class="whitespace-nowrap text-sm">{{ $item['label'] }}</span>
                </a>
                @endforeach
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="min-h-screen transition-all duration-300 lg:ml-64" :class="collapsed ? 'lg:!ml-16' : ''">
            <!-- Top bar -->
            <header class="sticky top-0 z-20 h-16 bg-surface-800/95 backdrop-blur border-b border-surface-600 flex items-center justify-between px-4 sm:px-6">
                <div class="flex items-center gap-3">
                    <button @click="mobileOpen = true" class="lg:hidden text-gray-400 hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                    <button @click="toggle()" class="hidden lg:block text-gray-400 hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                    <h1 class="text-lg font-display font-semibold text-white truncate">{{ $header ?? '' }}</h1>
                </div>
                <div class="flex items-center gap-2 sm:gap-4">
                    <a href="{{ url('/') }}" target="_blank" class="text-gray-400 hover:text-white text-sm transition-colors hidden sm:inline">View Site</a>
                    <span class="text-gray-500 hidden sm:inline">|</span>
                    <span class="text-gray-400 text-sm hidden sm:inline">{{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-400 hover:text-red-400 text-sm transition-colors">Logout</button>
                    </form>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-4 sm:p-6">
                @if(session('success'))
                <div x-data="alert" x-show="show" x-transition class="mb-6 bg-primary-600/20 border border-primary-600/30 text-primary-400 px-4 py-3 rounded-lg flex items-center justify-between">
                    <span>{{ session('success') }}</span>
                    <button @click="show = false" class="text-primary-400 hover:text-primary-300">&times;</button>
                </div>
                @endif

                @if(session('error'))
                <div x-data="alert" x-show="show" x-transition class="mb-6 bg-red-600/20 border border-red-600/30 text-red-400 px-4 py-3 rounded-lg flex items-center justify-between">
                    <span>{{ session('error') }}</span>
                    <button @click="show = false" class="text-red-400 hover:text-red-300">&times;</button>
                </div>
                @endif

                @if(session('info'))
                <div x-data="alert" x-show="show" x-transition class="mb-6 bg-blue-600/20 border border-blue-600/30 text-blue-400 px-4 py-3 rounded-lg flex items-center justify-between">
                    <span>{{ session('info') }}</span>
                    <button @click="show = false" class="text-blue-400 hover:text-blue-300">&times;</button>
                </div>
                @endif

                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>
