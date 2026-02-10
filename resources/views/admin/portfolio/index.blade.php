<x-layouts.admin>
    <x-slot:title>Portfolio Projects</x-slot:title>
    <x-slot:header>Portfolio Projects</x-slot:header>

    <!-- Header -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-xl font-display font-bold text-white">Portfolio Projects</h2>
            <p class="text-gray-400 text-sm mt-1">Manage your portfolio showcase</p>
        </div>
        <a href="{{ route('admin.portfolio.create') }}" class="admin-btn gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add Project
        </a>
    </div>

    <!-- Table -->
    <div class="admin-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="admin-table w-full">
                <thead>
                    <tr>
                        <th class="text-left px-4 py-3 text-gray-400 text-xs font-medium uppercase tracking-wider">Project</th>
                        <th class="text-left px-4 py-3 text-gray-400 text-xs font-medium uppercase tracking-wider hidden sm:table-cell">Category</th>
                        <th class="text-center px-4 py-3 text-gray-400 text-xs font-medium uppercase tracking-wider">Featured</th>
                        <th class="text-center px-4 py-3 text-gray-400 text-xs font-medium uppercase tracking-wider hidden md:table-cell">Order</th>
                        <th class="text-right px-4 py-3 text-gray-400 text-xs font-medium uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-600">
                    @forelse($items as $item)
                    <tr class="hover:bg-surface-700/50 transition-colors">
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                @if($item->featured_image)
                                <img src="{{ asset('storage/' . $item->featured_image) }}" alt="" class="w-12 h-8 object-cover rounded">
                                @else
                                <div class="w-12 h-8 rounded bg-surface-600 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                                @endif
                                <div>
                                    <span class="text-white font-medium block">{{ Str::limit($item->title, 40) }}</span>
                                    <span class="text-gray-500 text-xs font-mono">{{ $item->slug }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 hidden sm:table-cell">
                            <span class="text-gray-400 text-sm">{{ $item->category->name ?? '—' }}</span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            @if($item->is_featured)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500/20 text-green-400">Yes</span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-500/20 text-gray-400">No</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center hidden md:table-cell">
                            <span class="text-gray-400 text-sm">{{ $item->sort_order }}</span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ url('/portfolio/' . $item->slug) }}" target="_blank" class="text-gray-400 hover:text-white text-xs transition-colors" title="View">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </a>
                                <a href="{{ route('admin.portfolio.edit', $item) }}" class="admin-btn-secondary text-xs px-3 py-1.5">Edit</a>
                                <form action="{{ route('admin.portfolio.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this project?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-btn-danger text-xs px-3 py-1.5">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-4 py-12 text-center text-gray-500">
                            <svg class="w-12 h-12 mx-auto mb-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <p class="text-lg font-medium text-gray-400 mb-1">No portfolio projects yet</p>
                            <p class="text-sm">Add your first project to showcase your work.</p>
                            <a href="{{ route('admin.portfolio.create') }}" class="admin-btn mt-4 inline-flex gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                Add Your First Project
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($items->hasPages())
    <div class="mt-6">
        {{ $items->links() }}
    </div>
    @endif
</x-layouts.admin>
