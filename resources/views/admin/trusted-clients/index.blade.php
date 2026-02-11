<x-layouts.admin>
    <x-slot:title>Trusted Clients</x-slot:title>
    <x-slot:header>Trusted Clients</x-slot:header>

    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-xl font-display font-bold text-white">Trusted Clients</h2>
            <p class="text-gray-400 text-sm mt-1">Manage the client logos shown on the homepage</p>
        </div>
        <a href="{{ route('admin.trusted-clients.create') }}" class="admin-btn gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add Client
        </a>
    </div>

    <div class="admin-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="admin-table w-full">
                <thead>
                    <tr>
                        <th class="text-left px-4 py-3 text-gray-400 text-xs font-medium uppercase tracking-wider">Client</th>
                        <th class="text-left px-4 py-3 text-gray-400 text-xs font-medium uppercase tracking-wider hidden sm:table-cell">Industry</th>
                        <th class="text-center px-4 py-3 text-gray-400 text-xs font-medium uppercase tracking-wider">Active</th>
                        <th class="text-center px-4 py-3 text-gray-400 text-xs font-medium uppercase tracking-wider hidden md:table-cell">Order</th>
                        <th class="text-right px-4 py-3 text-gray-400 text-xs font-medium uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-600">
                    @forelse($clients as $client)
                    <tr class="hover:bg-surface-700/50 transition-colors">
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                @if($client->logo)
                                <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" class="w-10 h-10 object-contain rounded-lg bg-white p-1">
                                @else
                                <div class="w-10 h-10 rounded-lg bg-surface-600 flex items-center justify-center">
                                    <span class="text-sm font-bold text-gray-400">{{ strtoupper(substr($client->name, 0, 2)) }}</span>
                                </div>
                                @endif
                                <span class="text-white font-medium">{{ $client->name }}</span>
                            </div>
                        </td>
                        <td class="px-4 py-3 hidden sm:table-cell">
                            <span class="text-gray-400 text-sm">{{ $client->industry ?? '—' }}</span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            @if($client->is_active)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500/20 text-green-400">Yes</span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-500/20 text-gray-400">No</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center hidden md:table-cell">
                            <span class="text-gray-400 text-sm">{{ $client->sort_order }}</span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.trusted-clients.edit', $client) }}" class="admin-btn-secondary text-xs px-3 py-1.5">Edit</a>
                                <form action="{{ route('admin.trusted-clients.destroy', $client) }}" method="POST" onsubmit="return confirm('Remove this client?')">
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
                            <svg class="w-12 h-12 mx-auto mb-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <p class="text-lg font-medium text-gray-400 mb-1">No trusted clients yet</p>
                            <p class="text-sm">Add client logos to display on the homepage.</p>
                            <a href="{{ route('admin.trusted-clients.create') }}" class="admin-btn mt-4 inline-flex gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                Add Your First Client
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($clients->hasPages())
    <div class="mt-6">
        {{ $clients->links() }}
    </div>
    @endif
</x-layouts.admin>
