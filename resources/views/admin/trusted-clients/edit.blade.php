<x-layouts.admin>
    <x-slot:title>Edit: {{ $client->name }}</x-slot:title>
    <x-slot:header>Edit Trusted Client</x-slot:header>

    <div class="max-w-2xl">
        <form action="{{ route('admin.trusted-clients.update', $client) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="admin-card p-6 space-y-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Client Name <span class="text-red-400">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name', $client->name) }}" required
                           class="admin-input w-full" placeholder="e.g. Bebamart Global">
                    @error('name') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <!-- Industry -->
                <div>
                    <label for="industry" class="block text-sm font-medium text-gray-300 mb-1">Industry</label>
                    <input type="text" name="industry" id="industry" value="{{ old('industry', $client->industry) }}"
                           class="admin-input w-full" placeholder="e.g. E-Commerce, Construction, Restaurant">
                    @error('industry') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <!-- Logo -->
                <div>
                    <label for="logo" class="block text-sm font-medium text-gray-300 mb-1">Client Logo</label>
                    @if($client->logo)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" class="w-20 h-20 object-contain rounded-lg bg-white p-2">
                    </div>
                    @endif
                    <input type="file" name="logo" id="logo" accept="image/*"
                           class="admin-input w-full text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:bg-primary-600 file:text-white hover:file:bg-primary-700">
                    <p class="mt-1 text-xs text-gray-500">Recommended: Square PNG with transparent background, max 1MB. Leave empty to keep current logo.</p>
                    @error('logo') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
                </div>

                <!-- Bottom row -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 border-t border-surface-600 pt-6">
                    <!-- Sort Order -->
                    <div>
                        <label for="sort_order" class="block text-sm font-medium text-gray-300 mb-1">Sort Order</label>
                        <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $client->sort_order) }}" min="0"
                               class="admin-input w-full" placeholder="0">
                    </div>

                    <!-- Active -->
                    <div class="flex items-center pt-6">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $client->is_active) ? 'checked' : '' }}
                                   class="text-primary-600 bg-surface-700 border-surface-500 focus:ring-primary-500 rounded">
                            <span class="text-gray-300 text-sm">Show on Homepage</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-3 mt-6">
                <button type="submit" class="admin-btn">Update Client</button>
                <a href="{{ route('admin.trusted-clients.index') }}" class="admin-btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
