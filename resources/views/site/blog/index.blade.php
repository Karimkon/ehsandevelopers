<x-layouts.app>
<x-slot:title>Blog - Ehsan Developers | Tech Insights & Industry Updates</x-slot:title>
<x-slot:metaDescription>Stay updated with the latest in web development, mobile apps, cloud computing, and digital transformation. Expert insights from Ehsan Developers.</x-slot:metaDescription>

{{-- Blog JSON-LD --}}
<script type="application/ld+json">
@php
echo json_encode([
    '@@context' => 'https://schema.org',
    '@@type' => 'Blog',
    'name' => 'Ehsan Developers Blog',
    'description' => 'Tech insights, tutorials, and industry updates from Ehsan Developers.',
    'url' => route('blog.index'),
    'publisher' => [
        '@@type' => 'Organization',
        'name' => 'Ehsan Developers',
        'url' => url('/'),
    ],
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
@endphp
</script>

<section class="section-padding pt-32 bg-gradient-to-b from-slate-50 to-white dark:from-surface-900 dark:to-surface-800">
    <div class="max-w-7xl mx-auto">
        <div class="text-center max-w-3xl mx-auto mb-16" data-reveal>
            <div class="inline-flex items-center gap-2 text-primary-600 dark:text-primary-400 text-sm font-semibold uppercase tracking-wider mb-4">
                <span class="w-8 h-[2px] bg-primary-500"></span> Blog <span class="w-8 h-[2px] bg-primary-500"></span>
            </div>
            <h1 class="text-4xl sm:text-5xl font-display font-bold text-slate-900 dark:text-white mb-4">
                Insights & <span class="gradient-text">Updates</span>
            </h1>
            <p class="text-lg text-slate-600 dark:text-gray-400">
                Expert articles on web development, mobile apps, and digital strategy to help your business grow.
            </p>
        </div>

        @if($posts->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 stagger" data-reveal>
            @foreach($posts as $post)
            <article class="glass-card rounded-2xl overflow-hidden group hover:shadow-xl transition-all duration-300">
                @if($post->featured_image)
                <a href="{{ route('blog.show', $post) }}" class="block aspect-video overflow-hidden">
                    <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                </a>
                @else
                <a href="{{ route('blog.show', $post) }}" class="block aspect-video bg-gradient-to-br from-primary-600/20 to-teal-600/20 flex items-center justify-center">
                    <svg class="w-12 h-12 text-primary-500/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                </a>
                @endif
                <div class="p-6">
                    <div class="flex flex-wrap items-center gap-3 text-xs text-slate-500 dark:text-gray-500 mb-3">
                        @if($post->category)
                        <span class="px-2 py-1 rounded-full bg-primary-500/10 text-primary-600 dark:text-primary-400 font-medium">{{ $post->category }}</span>
                        @endif
                        <time datetime="{{ $post->published_at->toISOString() }}">{{ $post->published_at->format('M d, Y') }}</time>
                        <span>{{ $post->read_time }} min read</span>
                    </div>
                    <h2 class="text-lg font-display font-bold text-slate-900 dark:text-white mb-2 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">
                        <a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
                    </h2>
                    <p class="text-sm text-slate-600 dark:text-gray-400 line-clamp-3">
                        {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 150) }}
                    </p>
                    <a href="{{ route('blog.show', $post) }}" class="inline-flex items-center gap-1 text-primary-600 dark:text-primary-400 text-sm font-medium mt-4 hover:gap-2 transition-all">
                        Read More
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </article>
            @endforeach
        </div>

        @if($posts->hasPages())
        <div class="mt-12 flex justify-center">
            {{ $posts->links() }}
        </div>
        @endif
        @else
        <div class="text-center py-20" data-reveal>
            <svg class="w-16 h-16 mx-auto mb-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
            <h2 class="text-2xl font-display font-bold text-slate-900 dark:text-white mb-3">Coming Soon</h2>
            <p class="text-slate-600 dark:text-gray-400 max-w-md mx-auto">We're working on insightful articles about web development, mobile apps, and digital strategy. Check back soon!</p>
        </div>
        @endif
    </div>
</section>
</x-layouts.app>
