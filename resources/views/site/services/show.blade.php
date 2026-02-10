<x-layouts.app>
<x-slot:title>{{ $service->name }} - Ehsan Developers</x-slot:title>
<x-slot:metaDescription>{{ $service->short_description ?? Str::limit(strip_tags($service->description), 160) }}</x-slot:metaDescription>

{{-- Service JSON-LD for SEO --}}
<script type="application/ld+json">
@php
echo json_encode([
    '@@context' => 'https://schema.org',
    '@@type' => 'Service',
    'name' => $service->name,
    'description' => $service->short_description ?? Str::limit(strip_tags($service->description), 160),
    'provider' => [
        '@@type' => 'Organization',
        'name' => 'Ehsan Developers',
        'url' => url('/'),
    ],
    'url' => route('services.show', $service),
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
@endphp
</script>

<article class="pt-32 pb-16 bg-gradient-to-b from-slate-50 to-white dark:from-surface-900 dark:to-surface-800">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        <!-- Breadcrumb -->
        <nav class="mb-8 text-sm text-slate-500 dark:text-gray-500" data-reveal>
            <a href="{{ url('/') }}" class="hover:text-primary-500 transition-colors">Home</a>
            <span class="mx-2">/</span>
            <a href="{{ url('/#services') }}" class="hover:text-primary-500 transition-colors">Services</a>
            <span class="mx-2">/</span>
            <span class="text-slate-700 dark:text-gray-300">{{ $service->name }}</span>
        </nav>

        <!-- Hero Header -->
        <header class="mb-12" data-reveal>
            <div class="flex items-center gap-4 mb-6">
                @if($service->icon)
                <div class="w-16 h-16 bg-primary-100 dark:bg-primary-900/40 rounded-2xl flex items-center justify-center">
                    <svg class="w-8 h-8 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $service->icon }}"/>
                    </svg>
                </div>
                @endif
                @if($service->category)
                <span class="px-3 py-1 rounded-full bg-primary-500/10 text-primary-600 dark:text-primary-400 text-sm font-medium">
                    {{ $service->category->name }}
                </span>
                @endif
            </div>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-display font-bold text-slate-900 dark:text-white leading-tight mb-4">
                {{ $service->name }}
            </h1>
            @if($service->short_description)
            <p class="text-xl text-slate-600 dark:text-gray-400 leading-relaxed">
                {{ $service->short_description }}
            </p>
            @endif
        </header>

        <!-- Description -->
        @if($service->description)
        <div class="prose prose-lg dark:prose-invert max-w-none mb-12
                    prose-headings:font-display prose-headings:text-slate-900 dark:prose-headings:text-white
                    prose-a:text-primary-600 dark:prose-a:text-primary-400
                    prose-img:rounded-xl" data-reveal>
            {!! $service->description !!}
        </div>
        @endif

        <!-- Features -->
        @if($service->features && count($service->features))
        <section class="mb-12" data-reveal>
            <h2 class="text-2xl font-display font-bold text-slate-900 dark:text-white mb-6">What's Included</h2>
            <div class="grid sm:grid-cols-2 gap-4">
                @foreach($service->features as $feature)
                <div class="flex items-start gap-3 p-4 rounded-xl bg-slate-50 dark:bg-surface-700/50">
                    <svg class="w-5 h-5 text-primary-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span class="text-slate-700 dark:text-gray-300">{{ $feature }}</span>
                </div>
                @endforeach
            </div>
        </section>
        @endif

        <!-- CTA -->
        <div class="flex flex-col sm:flex-row items-center gap-4 pt-8 border-t border-slate-200 dark:border-surface-600" data-reveal>
            <a href="{{ url('/request-service') }}" class="btn-primary text-base px-10 py-4 gap-2 group">
                Request This Service
                <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
            <a href="{{ url('/#services') }}" class="text-sm text-slate-500 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
                </svg>
                Back to all services
            </a>
        </div>
    </div>
</article>
</x-layouts.app>
