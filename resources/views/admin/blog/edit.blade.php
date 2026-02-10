<x-layouts.admin>
    <x-slot:title>Edit: {{ $post->title }}</x-slot:title>
    <x-slot:header>Edit Blog Post</x-slot:header>

    <div class="max-w-4xl">
        <form action="{{ route('admin.blog.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="admin-card p-6 space-y-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-300 mb-1">Title <span class="text-red-400">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required
                           class="admin-input w-full" placeholder="Enter post title">
                    @error('title') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <!-- Slug -->
                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-300 mb-1">Slug</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug', $post->slug) }}"
                           class="admin-input w-full font-mono text-sm" placeholder="post-url-slug">
                    @error('slug') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <!-- Excerpt -->
                <div>
                    <label for="excerpt" class="block text-sm font-medium text-gray-300 mb-1">Excerpt</label>
                    <textarea name="excerpt" id="excerpt" rows="2"
                              class="admin-input w-full" placeholder="Short summary...">{{ old('excerpt', $post->excerpt) }}</textarea>
                    @error('excerpt') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <!-- Content -->
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-300 mb-1">Content <span class="text-red-400">*</span></label>
                    <textarea name="content" id="content" rows="15" required
                              class="admin-input w-full font-mono text-sm" placeholder="Write your blog post content here...">{{ old('content', $post->content) }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">HTML is supported.</p>
                    @error('content') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <!-- Two columns -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-300 mb-1">Category</label>
                        <input type="text" name="category" id="category" value="{{ old('category', $post->category) }}"
                               class="admin-input w-full" placeholder="e.g. Web Development">
                    </div>
                    <div>
                        <label for="tags" class="block text-sm font-medium text-gray-300 mb-1">Tags</label>
                        <input type="text" name="tags" id="tags" value="{{ old('tags', $post->tags) }}"
                               class="admin-input w-full" placeholder="laravel, php, tutorial">
                        <p class="mt-1 text-xs text-gray-500">Comma-separated</p>
                    </div>
                </div>

                <!-- Featured Image -->
                <div>
                    <label for="featured_image" class="block text-sm font-medium text-gray-300 mb-1">Featured Image</label>
                    @if($post->featured_image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $post->featured_image) }}" alt="" class="w-48 h-32 object-cover rounded-lg">
                    </div>
                    @endif
                    <input type="file" name="featured_image" id="featured_image" accept="image/*"
                           class="admin-input w-full text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:bg-primary-600 file:text-white hover:file:bg-primary-700">
                    @error('featured_image') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <!-- SEO Section -->
                <div class="border-t border-surface-600 pt-6">
                    <h3 class="text-white font-semibold mb-4">SEO Settings</h3>
                    <div class="space-y-4">
                        <div>
                            <label for="meta_title" class="block text-sm font-medium text-gray-300 mb-1">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $post->meta_title) }}"
                                   class="admin-input w-full" placeholder="SEO title">
                        </div>
                        <div>
                            <label for="meta_description" class="block text-sm font-medium text-gray-300 mb-1">Meta Description</label>
                            <textarea name="meta_description" id="meta_description" rows="2"
                                      class="admin-input w-full" placeholder="SEO description...">{{ old('meta_description', $post->meta_description) }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Status -->
                <div class="border-t border-surface-600 pt-6 flex flex-col sm:flex-row sm:items-center gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Status</label>
                        <div class="flex gap-4">
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="status" value="draft" {{ old('status', $post->status) === 'draft' ? 'checked' : '' }}
                                       class="text-primary-600 bg-surface-700 border-surface-500 focus:ring-primary-500">
                                <span class="text-gray-300 text-sm">Draft</span>
                            </label>
                            <label class="inline-flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="status" value="published" {{ old('status', $post->status) === 'published' ? 'checked' : '' }}
                                       class="text-primary-600 bg-surface-700 border-surface-500 focus:ring-primary-500">
                                <span class="text-gray-300 text-sm">Published</span>
                            </label>
                        </div>
                    </div>
                    @if($post->published_at)
                    <div class="text-sm text-gray-500">
                        Published: {{ $post->published_at->format('M d, Y \a\t g:i A') }}
                    </div>
                    @endif
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-3 mt-6">
                <button type="submit" class="admin-btn">Update Post</button>
                <a href="{{ route('admin.blog.index') }}" class="admin-btn-secondary">Cancel</a>
                @if($post->status === 'published')
                <a href="{{ route('blog.show', $post) }}" target="_blank" class="admin-btn-secondary ml-auto">View on Site</a>
                @endif
            </div>
        </form>
    </div>
</x-layouts.admin>
