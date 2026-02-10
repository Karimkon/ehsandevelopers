<header x-data="{ mobileOpen: false, isDark: document.documentElement.classList.contains('dark') }" class="fixed top-0 inset-x-0 z-50 bg-white/90 dark:bg-surface-900/90 backdrop-blur-xl border-b border-gray-200/50 dark:border-surface-700 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 lg:h-20">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center gap-3">
                <img src="{{ asset('images/ehsandeveloperslogo.jpeg') }}" alt="Ehsan Developers" class="w-10 h-10 rounded-xl object-cover shadow-glow-primary">
                <div>
                    <span class="text-xl font-display font-bold text-slate-800 dark:text-white">Ehsan</span>
                    <span class="text-xl font-display font-bold text-primary-600"> Developers</span>
                </div>
            </a>

            <!-- Desktop Nav -->
            <nav class="hidden lg:flex items-center gap-8">
                <a href="{{ url('/#about') }}" class="text-sm font-medium text-slate-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">About</a>
                <a href="{{ url('/#services') }}" class="text-sm font-medium text-slate-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Services</a>
                <a href="{{ url('/#process') }}" class="text-sm font-medium text-slate-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">How We Work</a>
                <a href="{{ url('/blog') }}" class="text-sm font-medium text-slate-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Blog</a>
                <a href="{{ url('/#contact') }}" class="text-sm font-medium text-slate-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Contact</a>
            </nav>

            <!-- Right side -->
            <div class="flex items-center gap-4">
                <!-- Theme toggle -->
                <button @click="
                    isDark = !isDark;
                    document.documentElement.classList.toggle('dark', isDark);
                    localStorage.setItem('theme', isDark ? 'dark' : 'light');
                    let htmlData = Alpine.$data(document.documentElement);
                    if (htmlData) htmlData.dark = isDark;
                " class="p-2 rounded-lg text-slate-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-surface-700 transition-colors" aria-label="Toggle dark mode">
                    <!-- Moon icon (shown in light mode) -->
                    <svg x-show="!isDark" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                    <!-- Sun icon (shown in dark mode) -->
                    <svg x-show="isDark" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </button>

                @auth
                    <a href="{{ url('/admin') }}" class="hidden lg:inline-flex text-sm font-medium text-slate-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="hidden lg:inline-flex text-sm font-medium text-slate-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors">Login</a>
                @endauth
                <a href="{{ url('/request-service') }}" class="hidden lg:inline-flex btn-primary text-sm px-5 py-2.5">
                    Get a Quote
                </a>

                <!-- Mobile menu button -->
                <button @click="mobileOpen = !mobileOpen" class="lg:hidden p-2 rounded-lg text-slate-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-surface-700">
                    <svg x-show="!mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="mobileOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div x-show="mobileOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 -translate-y-2" class="lg:hidden pb-4 border-t border-gray-200 dark:border-surface-700 mt-2 pt-4" x-cloak>
            <div class="space-y-2">
                <a @click="mobileOpen = false" href="{{ url('/#about') }}" class="block px-4 py-2 text-slate-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-surface-700 rounded-lg">About</a>
                <a @click="mobileOpen = false" href="{{ url('/#services') }}" class="block px-4 py-2 text-slate-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-surface-700 rounded-lg">Services</a>
                <a @click="mobileOpen = false" href="{{ url('/#process') }}" class="block px-4 py-2 text-slate-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-surface-700 rounded-lg">How We Work</a>
                <a @click="mobileOpen = false" href="{{ url('/blog') }}" class="block px-4 py-2 text-slate-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-surface-700 rounded-lg">Blog</a>
                <a @click="mobileOpen = false" href="{{ url('/#contact') }}" class="block px-4 py-2 text-slate-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-surface-700 rounded-lg">Contact</a>
                @auth
                    <a @click="mobileOpen = false" href="{{ url('/admin') }}" class="block px-4 py-2 text-slate-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-surface-700 rounded-lg">Dashboard</a>
                @else
                    <a @click="mobileOpen = false" href="{{ route('login') }}" class="block px-4 py-2 text-slate-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-surface-700 rounded-lg">Login</a>
                @endauth
                <a href="{{ url('/request-service') }}" class="block btn-primary text-center text-sm mt-3">Get a Quote</a>
            </div>
        </div>
    </div>
</header>
