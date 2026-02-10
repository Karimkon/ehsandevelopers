<x-layouts.admin>
    <x-slot:title>Blog Posts</x-slot:title>
    <x-slot:header>Blog Posts</x-slot:header>

    <!-- Header -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-xl font-display font-bold text-white">Blog Posts</h2>
            <p class="text-gray-400 text-sm mt-1">Manage your blog content for SEO</p>
        </div>
        <a href="{{ route('admin.blog.create') }}" class="admin-btn gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            New Post
        </a>
    </div>

    <!-- Table -->
    <div class="admin-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="admin-table w-full">
                <thead>
                    <tr>
                        <th class="text-left px-4 py-3 text-gray-400 text-xs font-medium uppercase tracking-wider">Title</th>
                        <th class="text-left px-4 py-3 text-gray-400 text-xs font-medium uppercase tracking-wider hidden sm:table-cell">Category</th>
                        <th class="text-center px-4 py-3 text-gray-400 text-xs font-medium uppercase tracking-wider">Status</th>
                        <th class="text-center px-4 py-3 text-gray-400 text-xs font-medium uppercase tracking-wider hidden md:table-cell">Views</th>
                        <th class="text-left px-4 py-3 text-gray-400 text-xs font-medium uppercase tracking-wider hidden lg:table-cell">Date</th>
                        <th class="text-right px-4 py-3 text-gray-400 text-xs font-medium uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-600">
                    @forelse($posts as $post)
                    <tr class="hover:bg-surface-700/50 transition-colors">
                        <td class="px-4 py-3">
                            <div>
                                <span class="text-white font-medium block">{{ Str::limit($post->title, 50) }}</span>
                                <span class="text-gray-500 text-xs font-mono">{{ $post->slug }}</span>
                            </div>
                        </td>
                        <td class="px-4 py-3 hidden sm:table-cell">
                            <span class="text-gray-400 text-sm">{{ $post->category ?? '—' }}</span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            @if($post->status === 'published')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500/20 text-green-400">Published</span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-500/20 text-yellow-400">Draft</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center hidden md:table-cell">
                            <span class="text-gray-400 text-sm">{{ number_format($post->views) }}</span>
                        </td>
                        <td class="px-4 py-3 hidden lg:table-cell">
                            <span class="text-gray-400 text-sm">{{ $post->published_at?->format('M d, Y') ?? $post->created_at->format('M d, Y') }}</span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-end gap-2">
                                @if($post->status === 'published')
                                <a href="{{ route('blog.show', $post) }}" target="_blank" class="text-gray-400 hover:text-white text-xs transition-colors" title="View">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </a>
                                @endif
                                <a href="{{ route('admin.blog.edit', $post) }}" class="admin-btn-secondary text-xs px-3 py-1.5">Edit</a>
                                <form action="{{ route('admin.blog.destroy', $post) }}" method="POST" onsubmit="return confirm('Delete this post?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-btn-danger text-xs px-3 py-1.5">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-12 text-center text-gray-500">
                            <svg class="w-12 h-12 mx-auto mb-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                            <p class="text-lg font-medium text-gray-400 mb-1">No blog posts yet</p>
                            <p class="text-sm">Start writing to boost your SEO.</p>
                            <a href="{{ route('admin.blog.create') }}" class="admin-btn mt-4 inline-flex gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                Write Your First Post
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($posts->hasPages())
    <div class="mt-6">
        {{ $posts->links() }}
    </div>
    @endif
</x-layouts.admin>
