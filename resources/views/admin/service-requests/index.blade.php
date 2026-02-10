<x-layouts.admin>
    <x-slot:title>Service Requests</x-slot:title>
    <x-slot:header>Service Requests</x-slot:header>

    <!-- Filter Bar -->
    <div class="admin-card mb-6">
        <form method="GET" action="{{ route('admin.service-requests.index') }}">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4">
                <!-- Search -->
                <div>
                    <label for="search" class="block text-xs text-gray-400 mb-1.5">Search</label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Name, email, reference..." class="admin-input text-sm">
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-xs text-gray-400 mb-1.5">Status</label>
                    <select name="status" id="status" class="admin-select text-sm">
                        <option value="">All Statuses</option>
                        @foreach(['new', 'reviewing', 'quoted', 'in_progress', 'completed', 'cancelled'] as $status)
                            <option value="{{ $status }}" {{ request('status') === $status ? 'selected' : '' }}>{{ ucfirst(str_replace('_', ' ', $status)) }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Priority -->
                <div>
                    <label for="priority" class="block text-xs text-gray-400 mb-1.5">Priority</label>
                    <select name="priority" id="priority" class="admin-select text-sm">
                        <option value="">All Priorities</option>
                        @foreach(['low', 'medium', 'high', 'urgent'] as $priority)
                            <option value="{{ $priority }}" {{ request('priority') === $priority ? 'selected' : '' }}>{{ ucfirst($priority) }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Date From -->
                <div>
                    <label for="date_from" class="block text-xs text-gray-400 mb-1.5">From Date</label>
                    <input type="date" name="date_from" id="date_from" value="{{ request('date_from') }}" class="admin-input text-sm">
                </div>

                <!-- Date To -->
                <div>
                    <label for="date_to" class="block text-xs text-gray-400 mb-1.5">To Date</label>
                    <input type="date" name="date_to" id="date_to" value="{{ request('date_to') }}" class="admin-input text-sm">
                </div>

                <!-- Filter Button -->
                <div class="flex items-end">
                    <button type="submit" class="admin-btn w-full gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                        Filter
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Results Count -->
    <div class="flex items-center justify-between mb-4">
        <p class="text-sm text-gray-400">
            Showing <span class="text-white font-medium">{{ $requests->count() }}</span> of <span class="text-white font-medium">{{ $requests->total() }}</span> results
        </p>
        @if(request()->hasAny(['search', 'status', 'priority', 'date_from', 'date_to']))
            <a href="{{ route('admin.service-requests.index') }}" class="text-sm text-primary-400 hover:text-primary-300 transition-colors">Clear Filters</a>
        @endif
    </div>

    <!-- Table -->
    <div class="admin-card p-0 overflow-hidden">
        @if($requests->isEmpty())
            <div class="p-12 text-center">
                <svg class="w-12 h-12 text-gray-600 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                <p class="text-gray-500">No service requests found.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Reference #</th>
                            <th>Client</th>
                            <th>Service</th>
                            <th>Status</th>
                            <th>Priority</th>
                            <th>Budget</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($requests as $request)
                            @php
                                $statusColors = [
                                    'new' => 'bg-blue-500/20 text-blue-400',
                                    'reviewing' => 'bg-yellow-500/20 text-yellow-400',
                                    'quoted' => 'bg-purple-500/20 text-purple-400',
                                    'in_progress' => 'bg-green-500/20 text-green-400',
                                    'completed' => 'bg-emerald-500/20 text-emerald-400',
                                    'cancelled' => 'bg-red-500/20 text-red-400',
                                ];
                                $priorityColors = [
                                    'low' => 'bg-gray-500/20 text-gray-400',
                                    'medium' => 'bg-yellow-500/20 text-yellow-400',
                                    'high' => 'bg-orange-500/20 text-orange-400',
                                    'urgent' => 'bg-red-500/20 text-red-400',
                                ];
                            @endphp
                            <tr>
                                <td>
                                    <span class="text-white font-mono text-xs">{{ $request->reference_number }}</span>
                                </td>
                                <td>
                                    <div>
                                        <p class="text-white text-sm font-medium">{{ $request->name }}</p>
                                        <p class="text-gray-500 text-xs">{{ $request->email }}</p>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-gray-300 text-sm">{{ $request->service->name ?? '-' }}</span>
                                </td>
                                <td>
                                    <span class="text-xs px-2.5 py-1 rounded-full font-medium {{ $statusColors[$request->status] ?? 'bg-gray-500/20 text-gray-400' }}">
                                        {{ ucfirst(str_replace('_', ' ', $request->status)) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="text-xs px-2.5 py-1 rounded-full font-medium {{ $priorityColors[$request->priority] ?? 'bg-gray-500/20 text-gray-400' }}">
                                        {{ ucfirst($request->priority) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="text-gray-300 text-sm">{{ $request->budget_range ?? '-' }}</span>
                                </td>
                                <td>
                                    <span class="text-gray-400 text-sm">{{ $request->created_at->format('M d, Y') }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.service-requests.show', $request) }}" class="text-primary-400 hover:text-primary-300 transition-colors text-sm font-medium inline-flex items-center gap-1">
                                        View
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <!-- Pagination -->
    @if($requests->hasPages())
        <div class="mt-6">
            {{ $requests->withQueryString()->links() }}
        </div>
    @endif
</x-layouts.admin>
