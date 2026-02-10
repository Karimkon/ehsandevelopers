<x-layouts.admin>
    <x-slot:title>Edit: {{ $item->title }}</x-slot:title>
    <x-slot:header>Edit Portfolio Project</x-slot:header>

    <div class="max-w-4xl">
        <form action="{{ route('admin.portfolio.update', $item) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="admin-card p-6 space-y-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-300 mb-1">Title <span class="text-red-400">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title', $item->title) }}" required
                           class="admin-input w-full" placeholder="Enter project title">
                    @error('title') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <!-- Slug -->
                <div>
                    <label for="slug" class="block text-sm font-medium text-gray-300 mb-1">Slug</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug', $item->slug) }}"
                           class="admin-input w-full font-mono text-sm" placeholder="project-url-slug">
                    @error('slug') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-300 mb-1">Description</label>
                    <textarea name="description" id="description" rows="5"
                              class="admin-input w-full" placeholder="Describe the project...">{{ old('description', $item->description) }}</textarea>
                    @error('description') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <!-- Two columns -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Client Name -->
                    <div>
                        <label for="client_name" class="block text-sm font-medium text-gray-300 mb-1">Client Name</label>
                        <input type="text" name="client_name" id="client_name" value="{{ old('client_name', $item->client_name) }}"
                               class="admin-input w-full" placeholder="e.g. Acme Corp">
                    </div>

                    <!-- Project URL -->
                    <div>
                        <label for="project_url" class="block text-sm font-medium text-gray-300 mb-1">Project URL</label>
                        <input type="url" name="project_url" id="project_url" value="{{ old('project_url', $item->project_url) }}"
                               class="admin-input w-full" placeholder="https://example.com">
                        @error('project_url') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- Two columns -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Technologies -->
                    <div>
                        <label for="technologies" class="block text-sm font-medium text-gray-300 mb-1">Technologies</label>
                        <input type="text" name="technologies" id="technologies" value="{{ old('technologies', is_array($item->technologies) ? implode(', ', $item->technologies) : $item->technologies) }}"
                               class="admin-input w-full" placeholder="Laravel, Vue.js, MySQL">
                        <p class="mt-1 text-xs text-gray-500">Comma-separated</p>
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="service_category_id" class="block text-sm font-medium text-gray-300 mb-1">Category</label>
                        <select name="service_category_id" id="service_category_id" class="admin-input w-full">
                            <option value="">— None —</option>
                            @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ old('service_category_id', $item->service_category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Featured Image -->
                <div>
                    <label for="featured_image" class="block text-sm font-medium text-gray-300 mb-1">Featured Image</label>
                    @if($item->featured_image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $item->featured_image) }}" alt="" class="w-48 h-32 object-cover rounded-lg">
                    </div>
                    @endif
                    <input type="file" name="featured_image" id="featured_image" accept="image/*"
                           class="admin-input w-full text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:bg-primary-600 file:text-white hover:file:bg-primary-700">
                    @error('featured_image') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <!-- Bottom row -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 border-t border-surface-600 pt-6">
                    <!-- Sort Order -->
                    <div>
                        <label for="sort_order" class="block text-sm font-medium text-gray-300 mb-1">Sort Order</label>
                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $item->sort_order) }}" min="0"
                               class="admin-input w-full" placeholder="0">
                    </div>

                    <!-- Featured -->
                    <div class="flex items-center pt-6">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="hidden" name="is_featured" value="0">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $item->is_featured) ? 'checked' : '' }}
                                   class="text-primary-600 bg-surface-700 border-surface-500 focus:ring-primary-500 rounded">
                            <span class="text-gray-300 text-sm">Featured Project</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-3 mt-6">
                <button type="submit" class="admin-btn">Update Project</button>
                <a href="{{ route('admin.portfolio.index') }}" class="admin-btn-secondary">Cancel</a>
                <a href="{{ url('/portfolio/' . $item->slug) }}" target="_blank" class="admin-btn-secondary ml-auto">View on Site</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
