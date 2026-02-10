<x-layouts.admin>
    <x-slot:title>Service Categories</x-slot:title>
    <x-slot:header>Service Categories</x-slot:header>

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-display font-bold text-white">Service Categories</h2>
            <p class="text-gray-400 text-sm mt-1">Manage your service categories</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="admin-btn gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add Category
        </a>
    </div>

    <!-- Table -->
    <div class="admin-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="admin-table w-full">
                <thead>
                    <tr>
                        <th class="text-left px-4 py-3 text-gray-400 text-xs font-medium uppercase tracking-wider">Name</th>
                        <th class="text-left px-4 py-3 text-gray-400 text-xs font-medium uppercase tracking-wider">Slug</th>
                        <th class="text-center px-4 py-3 text-gray-400 text-xs font-medium uppercase tracking-wider">Services</th>
                        <th class="text-center px-4 py-3 text-gray-400 text-xs font-medium uppercase tracking-wider">Sort Order</th>
                        <th class="text-center px-4 py-3 text-gray-400 text-xs font-medium uppercase tracking-wider">Status</th>
                        <th class="text-right px-4 py-3 text-gray-400 text-xs font-medium uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-600">
                    @forelse($categories as $category)
                    <tr class="hover:bg-surface-700/50 transition-colors">
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                @if($category->color)
                                <span class="w-3 h-3 rounded-full flex-shrink-0" style="background-color: {{ $category->color }}"></span>
                                @endif
                                @if($category->icon)
                                <span class="text-gray-400 flex-shrink-0">{{ $category->icon }}</span>
                                @endif
                                <span class="text-white font-medium">{{ $category->name }}</span>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <span class="text-gray-400 text-sm font-mono">{{ $category->slug }}</span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <span class="text-gray-300 text-sm">{{ $category->services_count }}</span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <span class="text-gray-400 text-sm">{{ $category->sort_order }}</span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            @if($category->is_active)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500/20 text-green-400">Active</span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-500/20 text-gray-400">Inactive</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="admin-btn-secondary text-xs px-3 py-1.5">
                                    Edit
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-btn-danger text-xs px-3 py-1.5">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                            No categories found. <a href="{{ route('admin.categories.create') }}" class="text-primary-400 hover:text-primary-300 transition-colors">Create one</a>.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if($categories->hasPages())
    <div class="mt-6">
        {{ $categories->links() }}
    </div>
    @endif
</x-layouts.admin>
