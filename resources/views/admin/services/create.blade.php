<x-layouts.admin>
    <x-slot:title>Create Service</x-slot:title>
    <x-slot:header>Create Service</x-slot:header>

    <!-- Header -->
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('admin.services.index') }}" class="admin-btn-secondary !px-3 !py-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        </a>
        <h2 class="text-xl font-semibold text-white">Create Service</h2>
    </div>

    <form method="POST" action="{{ route('admin.services.store') }}" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Basic Info -->
                <div class="admin-card space-y-5">
                    <h3 class="text-white font-semibold text-lg">Basic Information</h3>

                    <!-- Category -->
                    <div>
                        <label for="service_category_id" class="block text-sm font-medium text-gray-300 mb-1.5">Category <span class="text-red-400">*</span></label>
                        <select name="service_category_id" id="service_category_id" class="admin-select" required>
                            <option value="">Select a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('service_category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('service_category_id')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-300 mb-1.5">Name <span class="text-red-400">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="admin-input" required placeholder="Service name">
                        @error('name')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Slug -->
                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-300 mb-1.5">Slug</label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="admin-input" placeholder="auto-generated-from-name">
                        <p class="mt-1 text-xs text-gray-500">Leave blank to auto-generate from name.</p>
                        @error('slug')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Short Description -->
                    <div>
                        <label for="short_description" class="block text-sm font-medium text-gray-300 mb-1.5">Short Description</label>
                        <textarea name="short_description" id="short_description" rows="2" maxlength="500" class="admin-input" placeholder="Brief summary of the service (max 500 characters)">{{ old('short_description') }}</textarea>
                        @error('short_description')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-300 mb-1.5">Description</label>
                        <textarea name="description" id="description" rows="5" class="admin-input" placeholder="Full description of the service">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Features -->
                <div class="admin-card" x-data="{ features: {{ Js::from(old('features', [''])) }} }">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-white font-semibold text-lg">Features</h3>
                        <button type="button" @click="features.push('')" class="admin-btn-secondary !px-3 !py-1.5 text-xs gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            Add Feature
                        </button>
                    </div>

                    <div class="space-y-3">
                        <template x-for="(feature, index) in features" :key="index">
                            <div class="flex items-center gap-3">
                                <input type="text" :name="'features[' + index + ']'" x-model="features[index]" class="admin-input flex-1" placeholder="Enter a feature">
                                <button type="button" @click="features.length > 1 ? features.splice(index, 1) : null" class="admin-btn-danger !px-3 !py-2.5 flex-shrink-0" :class="{ 'opacity-50 cursor-not-allowed': features.length <= 1 }" :disabled="features.length <= 1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </div>
                        </template>
                    </div>

                    @error('features')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                    @error('features.*')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Settings -->
                <div class="admin-card space-y-5">
                    <h3 class="text-white font-semibold text-lg">Settings</h3>

                    <!-- Icon -->
                    <div>
                        <label for="icon" class="block text-sm font-medium text-gray-300 mb-1.5">Icon</label>
                        <input type="text" name="icon" id="icon" value="{{ old('icon') }}" class="admin-input" placeholder="e.g. heroicon-o-code-bracket">
                        <p class="mt-1 text-xs text-gray-500">Icon class or identifier.</p>
                        @error('icon')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Sort Order -->
                    <div>
                        <label for="sort_order" class="block text-sm font-medium text-gray-300 mb-1.5">Sort Order</label>
                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', 0) }}" class="admin-input" min="0">
                        @error('sort_order')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Active Status -->
                    <div>
                        <label class="flex items-center gap-3 cursor-pointer">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', '1') == '1' ? 'checked' : '' }} class="w-4 h-4 rounded border-surface-600 bg-surface-800 text-primary-600 focus:ring-primary-600 focus:ring-offset-0">
                            <span class="text-sm font-medium text-gray-300">Active</span>
                        </label>
                        @error('is_active')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Submit -->
                <div class="admin-card">
                    <button type="submit" class="admin-btn w-full justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        Create Service
                    </button>
                </div>
            </div>
        </div>
    </form>
</x-layouts.admin>
