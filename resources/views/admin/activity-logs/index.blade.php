<x-layouts.admin>
    <x-slot:title>Activity Logs</x-slot:title>
    <x-slot:header>Activity Logs</x-slot:header>

    {{-- Filter Bar --}}
    <div class="admin-card mb-6">
        <form action="{{ route('admin.activity-logs.index') }}" method="GET">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                {{-- Search --}}
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-400 mb-1.5">Search</label>
                    <input
                        type="text"
                        id="search"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search description..."
                        class="admin-input"
                    >
                </div>

                {{-- Action Filter --}}
                <div>
                    <label for="action" class="block text-sm font-medium text-gray-400 mb-1.5">Action</label>
                    <select id="action" name="action" class="admin-select">
                        <option value="">All Actions</option>
                        @foreach($actionTypes as $actionType)
                            <option value="{{ $actionType }}" {{ request('action') === $actionType ? 'selected' : '' }}>
                                {{ ucfirst($actionType) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Model Type Filter --}}
                <div>
                    <label for="model_type" class="block text-sm font-medium text-gray-400 mb-1.5">Model Type</label>
                    <select id="model_type" name="model_type" class="admin-select">
                        <option value="">All Models</option>
                        @foreach($modelTypes as $modelType)
                            <option value="{{ $modelType }}" {{ request('model_type') === $modelType ? 'selected' : '' }}>
                                {{ $modelType }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Date From --}}
                <div>
                    <label for="date_from" class="block text-sm font-medium text-gray-400 mb-1.5">From</label>
                    <input
                        type="date"
                        id="date_from"
                        name="date_from"
                        value="{{ request('date_from') }}"
                        class="admin-input"
                    >
                </div>

                {{-- Date To --}}
                <div>
                    <label for="date_to" class="block text-sm font-medium text-gray-400 mb-1.5">To</label>
                    <input
                        type="date"
                        id="date_to"
                        name="date_to"
                        value="{{ request('date_to') }}"
                        class="admin-input"
                    >
                </div>
            </div>

            <div class="flex items-center gap-3 mt-4">
                <button type="submit" class="admin-btn gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    Filter
                </button>
                @if(request()->hasAny(['search', 'action', 'model_type', 'date_from', 'date_to']))
                    <a href="{{ route('admin.activity-logs.index') }}" class="admin-btn-secondary gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        Clear Filters
                    </a>
                @endif
            </div>
        </form>
    </div>

    {{-- Logs Table --}}
    <div class="admin-card overflow-hidden p-0">
        @if($logs->isEmpty())
            <div class="p-8 text-center">
                <p class="text-gray-500 text-sm">No activity logs found.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Date/Time</th>
                            <th>User</th>
                            <th>Action</th>
                            <th>Description</th>
                            <th>IP Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logs as $log)
                            <tr>
                                <td class="whitespace-nowrap text-gray-400 text-xs">
                                    {{ $log->created_at->format('M d, Y') }}
                                    <br>
                                    <span class="text-gray-500">{{ $log->created_at->format('h:i A') }}</span>
                                </td>
                                <td class="whitespace-nowrap">
                                    {{ $log->user ? $log->user->name : 'System' }}
                                </td>
                                <td class="whitespace-nowrap">
                                    @php
                                        $actionColors = [
                                            'created' => 'bg-green-500/20 text-green-400',
                                            'updated' => 'bg-blue-500/20 text-blue-400',
                                            'deleted' => 'bg-red-500/20 text-red-400',
                                            'responded' => 'bg-purple-500/20 text-purple-400',
                                        ];
                                        $badgeClass = $actionColors[$log->action] ?? 'bg-gray-500/20 text-gray-400';
                                    @endphp
                                    <span class="text-xs font-medium px-2.5 py-1 rounded-full {{ $badgeClass }}">
                                        {{ ucfirst($log->action) }}
                                    </span>
                                </td>
                                <td>
                                    <span class="text-sm">{{ $log->description }}</span>
                                    @if($log->model_type)
                                        <br>
                                        <span class="text-xs text-gray-500">{{ class_basename($log->model_type) }} #{{ $log->model_id }}</span>
                                    @endif

                                    {{-- Expandable Properties --}}
                                    @if($log->properties && count($log->properties) > 0)
                                        <div x-data="{ open: false }" class="mt-1">
                                            <button
                                                type="button"
                                                @click="open = !open"
                                                class="text-xs text-primary-400 hover:text-primary-300 transition-colors flex items-center gap-1"
                                            >
                                                <svg class="w-3 h-3 transition-transform" :class="open ? 'rotate-90' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                                Details
                                            </button>
                                            <div
                                                x-show="open"
                                                x-transition
                                                class="mt-2 p-3 bg-surface-800 rounded-lg border border-surface-600 text-xs"
                                            >
                                                <pre class="text-gray-400 whitespace-pre-wrap break-words font-mono">{{ json_encode($log->properties, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                                <td class="whitespace-nowrap text-xs text-gray-500">
                                    {{ $log->ip_address ?? '-' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    {{-- Pagination --}}
    @if($logs->hasPages())
        <div class="mt-6">
            {{ $logs->withQueryString()->links() }}
        </div>
    @endif
</x-layouts.admin>
