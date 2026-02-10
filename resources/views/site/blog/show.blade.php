<x-layouts.app>
<x-slot:title>{{ $blog->meta_title ?? $blog->title }} - Ehsan Developers Blog</x-slot:title>
<x-slot:metaDescription>{{ $blog->meta_description ?? $blog->excerpt ?? Str::limit(strip_tags($blog->content), 160) }}</x-slot:metaDescription>

{{-- Article JSON-LD for SEO --}}
<script type="application/ld+json">
@php
echo json_encode([
    '@@context' => 'https://schema.org',
    '@@type' => 'Article',
    'headline' => $blog->title,
    'description' => $blog->excerpt ?? Str::limit(strip_tags($blog->content), 160),
    'image' => $blog->featured_image ? asset('storage/' . $blog->featured_image) : null,
    'datePublished' => $blog->published_at?->toISOString(),
    'dateModified' => $blog->updated_at->toISOString(),
    'author' => [
        '@@type' => 'Person',
        'name' => $blog->author->name ?? 'Ehsan Developers',
    ],
    'publisher' => [
        '@@type' => 'Organization',
        'name' => 'Ehsan Developers',
        'url' => url('/'),
        'logo' => [
            '@@type' => 'ImageObject',
            'url' => asset('images/ehsandeveloperslogo.jpeg'),
        ],
    ],
    'mainEntityOfPage' => [
        '@@type' => 'WebPage',
        '@@id' => route('blog.show', $blog),
    ],
    'wordCount' => str_word_count(strip_tags($blog->content)),
    'articleSection' => $blog->category,
    'keywords' => $blog->tags,
], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
@endphp
</script>

<article class="pt-32 pb-16 bg-gradient-to-b from-slate-50 to-white dark:from-surface-900 dark:to-surface-800">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        <!-- Breadcrumb -->
        <nav class="mb-8 text-sm text-slate-500 dark:text-gray-500" data-reveal>
            <a href="{{ url('/') }}" class="hover:text-primary-500 transition-colors">Home</a>
            <span class="mx-2">/</span>
            <a href="{{ route('blog.index') }}" class="hover:text-primary-500 transition-colors">Blog</a>
            <span class="mx-2">/</span>
            <span class="text-slate-700 dark:text-gray-300">{{ Str::limit($blog->title, 40) }}</span>
        </nav>

        <!-- Header -->
        <header class="mb-10" data-reveal>
            <div class="flex flex-wrap items-center gap-3 text-sm text-slate-500 dark:text-gray-500 mb-4">
                @if($blog->category)
                <span class="px-3 py-1 rounded-full bg-primary-500/10 text-primary-600 dark:text-primary-400 font-medium">{{ $blog->category }}</span>
                @endif
                <time datetime="{{ $blog->published_at->toISOString() }}">{{ $blog->published_at->format('F d, Y') }}</time>
                <span>{{ $blog->read_time }} min read</span>
                <span>{{ number_format($blog->views) }} views</span>
            </div>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-display font-bold text-slate-900 dark:text-white leading-tight mb-4">
                {{ $blog->title }}
            </h1>
            @if($blog->excerpt)
            <p class="text-xl text-slate-600 dark:text-gray-400 leading-relaxed">{{ $blog->excerpt }}</p>
            @endif
            <div class="flex items-center gap-3 mt-6">
                <div class="w-10 h-10 bg-primary-600 rounded-full flex items-center justify-center">
                    <span class="text-white font-bold text-sm">{{ strtoupper(substr($blog->author->name ?? 'ED', 0, 2)) }}</span>
                </div>
                <div>
                    <p class="text-sm font-medium text-slate-900 dark:text-white">{{ $blog->author->name ?? 'Ehsan Developers' }}</p>
                    <p class="text-xs text-slate-500 dark:text-gray-500">Author</p>
                </div>
            </div>
        </header>

        <!-- Featured Image -->
        @if($blog->featured_image)
        <div class="mb-10 rounded-2xl overflow-hidden" data-reveal>
            <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}"
                 class="w-full aspect-video object-cover">
        </div>
        @endif

        <!-- Content -->
        <div class="prose prose-lg dark:prose-invert max-w-none mb-12
                    prose-headings:font-display prose-headings:text-slate-900 dark:prose-headings:text-white
                    prose-a:text-primary-600 dark:prose-a:text-primary-400
                    prose-img:rounded-xl" data-reveal>
            {!! $blog->content !!}
        </div>

        <!-- Tags -->
        @if($blog->tags)
        <div class="flex flex-wrap items-center gap-2 mb-12 pb-12 border-b border-slate-200 dark:border-surface-600">
            <span class="text-sm text-slate-500 dark:text-gray-500 mr-2">Tags:</span>
            @foreach($blog->tags_array as $tag)
            <span class="px-3 py-1 text-xs rounded-full bg-slate-100 dark:bg-surface-700 text-slate-600 dark:text-gray-400">{{ $tag }}</span>
            @endforeach
        </div>
        @endif

        <!-- Related Posts -->
        @if($relatedPosts->count())
        <section class="mt-12" data-reveal>
            <h2 class="text-2xl font-display font-bold text-slate-900 dark:text-white mb-8">Related Articles</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($relatedPosts as $related)
                <a href="{{ route('blog.show', $related) }}" class="glass-card rounded-xl overflow-hidden group hover:shadow-lg transition-all">
                    @if($related->featured_image)
                    <div class="aspect-video overflow-hidden">
                        <img src="{{ asset('storage/' . $related->featured_image) }}" alt="{{ $related->title }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                    </div>
                    @endif
                    <div class="p-4">
                        <p class="text-xs text-slate-500 dark:text-gray-500 mb-2">{{ $related->published_at->format('M d, Y') }}</p>
                        <h3 class="font-display font-bold text-slate-900 dark:text-white group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">
                            {{ $related->title }}
                        </h3>
                    </div>
                </a>
                @endforeach
            </div>
        </section>
        @endif
    </div>
</article>
</x-layouts.app>
