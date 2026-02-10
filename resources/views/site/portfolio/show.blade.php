<x-layouts.app>
<x-slot:title>{{ $item->title }} - Ehsan Developers Portfolio</x-slot:title>
<x-slot:metaDescription>{{ Str::limit(strip_tags($item->description), 160) }}</x-slot:metaDescription>

<article class="pt-32 pb-16 bg-gradient-to-b from-slate-50 to-white dark:from-surface-900 dark:to-surface-800">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        <!-- Breadcrumb -->
        <nav class="mb-8 text-sm text-slate-500 dark:text-gray-500" data-reveal>
            <a href="{{ url('/') }}" class="hover:text-primary-500 transition-colors">Home</a>
            <span class="mx-2">/</span>
            <a href="{{ url('/#portfolio') }}" class="hover:text-primary-500 transition-colors">Portfolio</a>
            <span class="mx-2">/</span>
            <span class="text-slate-700 dark:text-gray-300">{{ Str::limit($item->title, 40) }}</span>
        </nav>

        <!-- Header -->
        <header class="mb-10" data-reveal>
            <div class="flex flex-wrap items-center gap-3 text-sm text-slate-500 dark:text-gray-500 mb-4">
                @if($item->category)
                <span class="px-3 py-1 rounded-full bg-primary-500/10 text-primary-600 dark:text-primary-400 font-medium">{{ $item->category->name }}</span>
                @endif
                @if($item->client_name)
                <span>Client: {{ $item->client_name }}</span>
                @endif
            </div>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-display font-bold text-slate-900 dark:text-white leading-tight mb-4">
                {{ $item->title }}
            </h1>
        </header>

        <!-- Featured Image -->
        @if($item->featured_image)
        <div class="mb-10 rounded-2xl overflow-hidden" data-reveal>
            <img src="{{ asset('storage/' . $item->featured_image) }}" alt="{{ $item->title }}"
                 class="w-full aspect-video object-cover">
        </div>
        @endif

        <!-- Description -->
        @if($item->description)
        <div class="prose prose-lg dark:prose-invert max-w-none mb-12
                    prose-headings:font-display prose-headings:text-slate-900 dark:prose-headings:text-white
                    prose-a:text-primary-600 dark:prose-a:text-primary-400" data-reveal>
            {!! nl2br(e($item->description)) !!}
        </div>
        @endif

        <!-- Project Details -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-12" data-reveal>
            @if($item->client_name)
            <div class="glass-card rounded-xl p-5">
                <h3 class="text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-gray-500 mb-2">Client</h3>
                <p class="text-slate-900 dark:text-white font-medium">{{ $item->client_name }}</p>
            </div>
            @endif

            @if($item->category)
            <div class="glass-card rounded-xl p-5">
                <h3 class="text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-gray-500 mb-2">Category</h3>
                <p class="text-slate-900 dark:text-white font-medium">{{ $item->category->name }}</p>
            </div>
            @endif

            @if($item->technologies && count($item->technologies))
            <div class="glass-card rounded-xl p-5 sm:col-span-2">
                <h3 class="text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-gray-500 mb-3">Technologies Used</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach($item->technologies as $tech)
                    <span class="px-3 py-1 text-sm rounded-full bg-primary-500/10 text-primary-600 dark:text-primary-400 font-medium">{{ $tech }}</span>
                    @endforeach
                </div>
            </div>
            @endif

            @if($item->project_url)
            <div class="glass-card rounded-xl p-5 sm:col-span-2">
                <h3 class="text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-gray-500 mb-2">Project Link</h3>
                <a href="{{ $item->project_url }}" target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 text-primary-600 dark:text-primary-400 font-medium hover:underline">
                    {{ $item->project_url }}
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
            </div>
            @endif
        </div>

        <!-- Back link -->
        <div class="border-t border-slate-200 dark:border-surface-600 pt-8" data-reveal>
            <a href="{{ url('/#portfolio') }}" class="inline-flex items-center gap-2 text-primary-600 dark:text-primary-400 font-medium hover:gap-3 transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Back to Portfolio
            </a>
        </div>
    </div>
</article>
</x-layouts.app>
