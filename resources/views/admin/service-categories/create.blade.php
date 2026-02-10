<x-layouts.admin>
    <x-slot:title>Create Category</x-slot:title>
    <x-slot:header>Create Category</x-slot:header>

    <!-- Header -->
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('admin.categories.index') }}" class="text-gray-400 hover:text-white transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        </a>
        <div>
            <h2 class="text-xl font-display font-bold text-white">Create Category</h2>
            <p class="text-gray-400 text-sm mt-1">Add a new service category</p>
        </div>
    </div>

    <!-- Form -->
    <div class="admin-card max-w-2xl">
        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-300 mb-1.5">Name <span class="text-red-400">*</span></label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                       class="admin-input w-full" placeholder="e.g. Web Development">
                @error('name')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Slug -->
            <div>
                <label for="slug" class="block text-sm font-medium text-gray-300 mb-1.5">Slug</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                       class="admin-input w-full" placeholder="auto-generated-from-name">
                <p class="mt-1 text-xs text-gray-500">Leave blank to auto-generate from the name.</p>
                @error('slug')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Icon -->
            <div>
                <label for="icon" class="block text-sm font-medium text-gray-300 mb-1.5">Icon</label>
                <input type="text" name="icon" id="icon" value="{{ old('icon') }}"
                       class="admin-input w-full" placeholder="e.g. fas fa-code or icon class name">
                <p class="mt-1 text-xs text-gray-500">Enter an icon class or name.</p>
                @error('icon')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Color -->
            <div>
                <label for="color" class="block text-sm font-medium text-gray-300 mb-1.5">Color</label>
                <div class="flex items-center gap-3">
                    <input type="color" name="color" id="color" value="{{ old('color', '#10b981') }}"
                           class="h-10 w-14 rounded border border-surface-600 bg-surface-800 cursor-pointer">
                    <input type="text" id="color_text" value="{{ old('color', '#10b981') }}"
                           class="admin-input flex-1" placeholder="#10b981"
                           oninput="document.getElementById('color').value = this.value"
                           onchange="document.getElementById('color').value = this.value">
                </div>
                <p class="mt-1 text-xs text-gray-500">Choose a color for this category.</p>
                @error('color')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-300 mb-1.5">Description</label>
                <textarea name="description" id="description" rows="3"
                          class="admin-input w-full" placeholder="Brief description of this category...">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Sort Order -->
            <div>
                <label for="sort_order" class="block text-sm font-medium text-gray-300 mb-1.5">Sort Order</label>
                <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}"
                       class="admin-input w-32" min="0">
                <p class="mt-1 text-xs text-gray-500">Lower numbers appear first.</p>
                @error('sort_order')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Is Active -->
            <div>
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', '1') == '1' ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-surface-600 bg-surface-700 text-primary-600 focus:ring-primary-500 focus:ring-offset-0">
                    <span class="text-sm font-medium text-gray-300">Active</span>
                </label>
                <p class="mt-1 text-xs text-gray-500 ml-7">Inactive categories won't be visible on the site.</p>
                @error('is_active')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-3 pt-4 border-t border-surface-600">
                <button type="submit" class="admin-btn">
                    Create Category
                </button>
                <a href="{{ route('admin.categories.index') }}" class="admin-btn-secondary">
                    Cancel
                </a>
            </div>
        </form>
    </div>

    @push('scripts')
    <script>
        // Sync color picker with text input
        document.getElementById('color').addEventListener('input', function() {
            document.getElementById('color_text').value = this.value;
        });
    </script>
    @endpush
</x-layouts.admin>
